<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\Campaign;
use App\Models\Donation;
use Stripe\Issuing\Card;
use App\Models\Membership;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\PaymentConfirmEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StripePaymentController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    
    public function payment_process_3d(Request $request)
    {
        // $validate=$this->validate($request,[
        //     'amount'=>"required|",
        // ]);
        //dd($request->all());
        //$callback=decrypt($request->callback);
        $callback="payment-success";
        $tran = Str::random(6) . '-' . rand(1, 1000);
        $order_amount = (int)$request->amount;
        $callback = $callback;
        //$config = Helpers::get_business_settings('stripe');
        Stripe::setApiKey(Setting::get('stripe_secret_key'));
        header('Content-Type: application/json');
        $currency_code = Setting::get('currency_code');

        // $checkout_session = \Stripe\Checkout\Session::create([
        //     'payment_method_types' => ['card'],
        //     'line_items' => [[
        //         'price_data' => [
        //             'currency' => $currency_code ?? 'usd',
        //             'unit_amount' => $order_amount * 100,
        //             'product_data' => [
        //                 'name' => Setting::get('site_name'),
        //                 'images' => [asset('storage') . '/' . Setting::get('site_logo')],
        //             ],
        //         ],
        //         'quantity' => 1,
        //     ]],
        //     'mode' => 'payment',
        //     'success_url' => route('pay-stripe.success', ['callback' => $callback, 'transaction_reference' => $tran]),
        //     'cancel_url' => url()->previous(),
        // ]);
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => 10000,
            'currency' => 'inr',
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);
    
        $output = [
            'clientSecret' => $paymentIntent->client_secret,
        ];
        // Payment::create([
        //     "user_id" => Auth::user()->id,
        //     "status" => "pending",
        //     "amount" =>$order_amount,
        //     "transaction"=>$tran
        // ]);
        return response()->json($output);
        //return redirect($checkout_session->url);
        //return response()->json($checkout_session);
        //return response()->json(['id' => $checkout_session->id,'url' => $checkout_session->url]);
    }

    public function stripe_pay(Request $request){
        Stripe::setApiKey(Setting::get('stripe_secret_key'));
        header('Content-Type: application/json');
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $request->session()->get('amount')*100,
            'currency' => Setting::get('currency_code'),
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);
        //$request->order_amount

        
        if($request->session()->exists('campaign_id')){
            $Campaign=Campaign::where('id', '=', $request->campaign_id)->first();
            Donation::create([
                'campaign_id' => $Campaign->id,
                'user_id' => Auth::user()->id,
                'amount' => $request->order_amount,
                'donator_name'=>Auth::user()->name,
                'donator_email'=>Auth::user()->email,
                'donator_address'=>Auth::user()->address,
                'donator_zip'=>Auth::user()->zip,
                'donation_method'=>'Stripe',
                'charge_id'=>$paymentIntent->client_secret,
                'donate_date'=>Carbon::now(),
                'txn_for'=>'campaign',
            ]);
        }
        if($request->session()->exists('membership_id')){
            Donation::create([
                
                'user_id' => Auth::user()->id,
                'amount' => $request->order_amount,
                'txn_for'=>'membership',
                'charge_id'=>$paymentIntent->client_secret,
                'membership_id'=>$request->session()->get('membership_id'),
            ]);
        }

    
        $output = [
            'clientSecret' => $paymentIntent->client_secret,
        ];
        echo json_encode($output);
    }

    public function success(Request $request)
    {
//         "payment_intent" => "pi_3MbPwGSIP0109f7i0SEeUdpX"
//   "payment_intent_client_secret" => "pi_3MbPwGSIP0109f7i0SEeUdpX_secret_SzYsVWOZ2ypmGMaMxUJRQRtnX"
//   "redirect_status" => "succeeded"
        //dd($request->all());
        $callback = $request['callback'];

        //token string generate
        if($request->session()->exists('campaign_id')){

            $transaction_reference = $request['transaction_reference'];
            $token_string = 'payment_method=stripe&&transaction_reference=' . $transaction_reference;
            $Campaign=Campaign::where('id',session()->get('campaign_id'))->first();
            $total_amount_available = $Campaign->available_fund+session()->get('amount');
            if($request->payment_intent){
                $donation=Donation::where("charge_id",$request->payment_intent_client_secret)->update([
                "txn_id"=>$request->payment_intent,
                    "status" => "paid",
                ]);
                $Campaign->update([
                    'available_fund' => $total_amount_available,
                ]);

                Mail::to(Auth::user()->email)->send(new PaymentConfirmEmail($request->payment_intent));
                if($donation){
                    $request->session()->forget(['amount', 'campaign_id']);
                }
            }
        }

        if($request->session()->exists('membership_id')){
            $membership = Membership::where('id', $request->session()->get('membership_id'))->first();

            $payment=Donation::where("charge_id",$request->payment_intent_client_secret)->update([
                "txn_id"=>$request->payment_intent,
                    "status" => "paid",
                ]);
                $user=User::findOrFail(Auth::user()->id);
                if($user){
                    $user->membership_id=$membership->id;
                    $user->is_parent=1;
                    $user->code=(1000+Auth::user()->id).(rand(1111,9999));
                    $user->expire=Carbon::today()->addDays(7);
                    $user->save();
                }
                Mail::to(Auth::user()->email)->send(new PaymentConfirmEmail($request->payment_intent." And your Code is ".$user->code));
                if($payment){
                    $request->session()->forget(['amount', 'membership_id']);
                }
        }
        
        //success
        if ($callback != null) {
            return redirect($callback . '/success' . '?token=' . base64_encode($token_string));
        } else {
            return \redirect()->route('user.home')->with('success','Donated successfully');
        }
    }

    public function fail(Request $request)
    {
        $callback = $request['callback'];

        //token string generate
        $transaction_reference = $request['transaction_reference'];
        $token_string = 'payment_method=stripe&&transaction_reference=' . $transaction_reference;

        //fail
        if ($callback != null) {
            return redirect($callback . '/fail' . '?token=' . base64_encode($token_string));
        } else {
            return \redirect()->route('payment-fail', ['token' => base64_encode($token_string)]);
        }
    }
}
