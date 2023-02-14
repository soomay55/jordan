<?php

use App\Mail\PaymentConfirmEmail;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    //dd(Auth::user());
    return view('home');
})->name('user.home');

Auth::routes();
Route::get('/language/{locale}', function ($locale) {
    
    app()->setLocale($locale);
    //session(['locale'=> $locale]);
    Session::put('locale', $locale);
    //dd( app()->getLocale($locale));
    return redirect()->back();
})->name('lang.switch');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/mission', [App\Http\Controllers\HomeController::class, 'mission'])->name('mission');
Route::get('/donate', [App\Http\Controllers\HomeController::class, 'donate'])->name('donate');
Route::get('/bylaw', [App\Http\Controllers\HomeController::class, 'bylaw'])->name('bylaw');
Route::get('/gallery', [App\Http\Controllers\HomeController::class, 'gallery'])->name('gallery');
Route::get('/event', [App\Http\Controllers\HomeController::class, 'event'])->name('event');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::post('stripe-pay', [App\Http\Controllers\StripePaymentController::class,'stripe_pay'])->name('pay.pay-stripe');
Route::get('pay-stripe', [App\Http\Controllers\StripePaymentController::class,'payment_process_3d'])->name('pay-stripe');
Route::get('pay-stripe/success', [App\Http\Controllers\StripePaymentController::class,'success'])->name('pay-stripe.success');
Route::get('pay-stripe/fail', [App\Http\Controllers\StripePaymentController::class,'success'])->name('pay-stripe.fail');
Route::get('donation/{id}',[App\Http\Controllers\HomeController::class,'donation'])->name('donation');
Route::get('payment-success/success',[App\Http\Controllers\UserController::class,'success'])->name('success');

//checkout payment
Route::get('/checkout',[HomeController::class, 'checkout_view'])->name('checkout.web');
Route::post('/checkout/amount',[HomeController::class, 'checkout'])->name('checkout.amount');


Route::get('mail',function(){
    Mail::to(Auth::user()->email)->send(new PaymentConfirmEmail("hello"));
});

Route::post('register-user',[App\Http\Controllers\UserController::class,'register_user'])->name('user.register');
Route::post('login-user',[App\Http\Controllers\UserController::class,'login_user'])->name('user.login');