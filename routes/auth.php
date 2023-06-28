<?php


use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\SocialController;

use function PHPSTORM_META\type;

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

Route::controller(ResetPasswordController::class)->middleware('guest')->group(function () {
    Route::get('forgot-password', "sendEmailForm")->name('password.request');

    Route::post('forgot-password', "sendResetEmail")->name('password.email');

    Route::get('reset-password/{token}', "resetPasswordFrom")->name('password.reset');

    Route::post('reset-password', 'resetPassword')->name('password.update');
});

Route::controller(RegisterUserController::class)->middleware('guest')->group(function () {
    Route::get('/register', 'create')->name('showform-register');

    Route::post('/register', 'store')->name('register');
});

Route::controller(LoginUserController::class)->group(function () {
    Route::get('login', 'login')->name('showform-login')->middleware('guest');
    Route::post('login', 'handleLogin')->name('login')->middleware('guest');
    Route::get('logout', 'logout')->name('logout');
});
Route::controller(VerifyEmailController::class)->group(function () {

    Route::get('/verify-email', 'index')->middleware(['auth'])->name('verification.notice');

    Route::post('/email/verification-notification', 'resendVerifyEmail')->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    Route::get('/email/verify/{id}/{hash}', 'handleVerifyEmail')->middleware(['auth', 'signed'])->name('verification.verify');
});

Route::controller(SocialController::class)->group(function (){
    Route::get('auth/google', 'redireactGoogle')->name('google-auth');
    Route::get('auth/google/call-back', 'callbackGoogle');

    Route::get('auth/facebook', 'redireactFacebook')->name('facebook-auth');
    Route::get('auth/facebook/call-back', 'callbackFacebook');

    Route::get('auth/twitter', 'redireactTwitter')->name('twitter-auth');
    Route::get('auth/twitter/call-back', 'callbackTwitter');
});

