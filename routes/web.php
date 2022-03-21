<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', [App\Http\Controllers\Front\FrontendController::class, 'index'])->name('front.home');
Route::get('/faq', [App\Http\Controllers\Front\FrontendController::class, 'faq'])->name('front.faq');
Route::get('/work', [App\Http\Controllers\Front\FrontendController::class, 'work'])->name('front.work');
Route::get('/price', [App\Http\Controllers\Front\FrontendController::class, 'price'])->name('front.price');
Route::get('/contact', [App\Http\Controllers\Front\FrontendController::class, 'contact'])->name('front.contact');

//step form
Route::get('/checkout_1', [App\Http\Controllers\Front\checkOutController::class, 'checkout_1'])->name('front.checkout_1');
Route::post('/checkout_post_1', [App\Http\Controllers\Front\checkOutController::class, 'checkout_post_1'])->name('front.checkout_post_1');
Route::get('/checkout_2', [App\Http\Controllers\Front\checkOutController::class, 'checkout_2'])->name('front.checkout_2');
Route::post('/checkout_post_2', [App\Http\Controllers\Front\checkOutController::class, 'checkout_post_2'])->name('front.checkout_post_2');
Route::get('/checkout_3', [App\Http\Controllers\Front\checkOutController::class, 'checkout_3'])->name('front.checkout_3');
Route::any('/checkout_post_3', [App\Http\Controllers\Front\checkOutController::class, 'checkout_post_3'])->name('front.checkout_post_3');
Route::get('/checkout_4', [App\Http\Controllers\Front\checkOutController::class, 'checkout_4'])->name('front.checkout_4');

Route::get('/test', [App\Http\Controllers\Front\checkOutController::class, 'test'])->name('front.test');

Route::get('/paypal/notify', [App\Http\Controllers\Front\PaypalController::class, 'paymentNotify'])->name('notify.paypal');
Route::get('/cancel-payment', [App\Http\Controllers\Front\PaypalController::class, 'paymentCancel'])->name('cancel.paypal');
Route::get('/payment/success', [App\Http\Controllers\Front\PaypalController::class, 'paymentSuccess'])->name('success.payment');
Route::post('/stripe_credit', [App\Http\Controllers\Front\checkOutController::class, 'stripe_credit'])->name('front.stripe_credit');
Route::prefix('/admin')->middleware('auth:web')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
    Route::get('/order', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.order');
    Route::get('/order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'detail'])->name('admin.order.detail');
    Route::post('/order/update', [App\Http\Controllers\Admin\OrderController::class, 'update'])->name('admin.order.update');
});

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
