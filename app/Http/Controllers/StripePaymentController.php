<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\Campaign;
use App\Models\Donation;
use Stripe\Issuing\Card;
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
            'amount' => $request->order_amount*100,
            'currency' => Setting::get('currency_code'),
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);

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
        ]);
    
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
        $transaction_reference = $request['transaction_reference'];
        $token_string = 'payment_method=stripe&&transaction_reference=' . $transaction_reference;
        if($request->payment_intent){
            $donation=Donation::where("charge_id",$request->payment_intent_client_secret)->update([
               "txn_id"=>$request->payment_intent,
                "status" => "paid",
             ]);

            Mail::to(Auth::user()->email)->send(new PaymentConfirmEmail($request->payment_intent));
            if($donation){
                $request->session()->forget(['amount', 'campaign_id']);
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
