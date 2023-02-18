<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CampaignController;
use App\Jobs\SendEmail;

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
Route::get('/sendmail', function(){
    dispatch(new SendEmail('somaybaskey@gmail.com',"spomefayayh"));
});

Route::get('/home', function () {
    return view('welcome');
});
route::name('admin.')->group(function(){
    Route::get('/',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('/login',[AdminAuthController::class,'showLogin']);
Route::post('login',[AdminAuthController::class,'checkLogin'])->name('login');
Route::get('logout',[AdminAuthController::class,'logout'])->name('logout');


});
Route::get('settings', [SettingController::class,'index'])->name('admin.settings');
Route::post('settings', [SettingController::class,'update'])->name('admin.settings.update');
Route::get('demo', [SettingController::class,'demo'])->name('demo');
Route::get('campaign', [CampaignController::class,'index'])->name('admin.campaign.index');
Route::get('campaign/create', [CampaignController::class,'create'])->name('admin.campaign.create');
Route::post('campaign/create', [CampaignController::class,'store'])->name('admin.campaign.store');
Route::get('campaign/edit/{id}', [CampaignController::class,'edit'])->name('admin.campaign.edit');
Route::post('campaign/update/{id}', [CampaignController::class,'update'])->name('admin.campaign.update');
Route::get('donation', [AdminController::class,'donation'])->name('admin.donation');
Route::post('send-mail', [AdminController::class,'send_mail'])->name('admin.send-mail');