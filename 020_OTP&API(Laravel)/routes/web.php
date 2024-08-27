<?php

use App\Http\Controllers\AmazonController;
use App\Http\Controllers\AuthOtpController;
use Illuminate\Support\Facades\Route;



Route::controller(AmazonController::class)->group(function() {

    Route::get('/', 'home')->name('home');

    Route::get('/register', 'register')->name('Register');

    Route::post('/store', 'store')->name('store');

    Route::get('/login', 'login')->name('Login');

    Route::post('/check', 'check')->name('check');

    Route::get('/profile', 'profile')->name('Profile');
    
    Route::get('/edit', 'edit')->name('edit');

    Route::put('/update', 'update')->name('update');

    Route::get('/delete', 'delete')->name('delete.account');

    Route::delete('/delete/account', 'deleteAccount')->name('deleted');

    Route::get('/logout', 'logout')->name('logout');

    Route::get('/del', 'del');

});

Route::controller(AuthOtpController::class)->group(function(){

    Route::get('/otp/login', 'login')->name('otp.login');

    Route::post('/otp/generate', 'generate')->name('otp.generate');

    Route::get('/otp/verification/{user_id}', 'verification')->name('otp.verification');

    Route::post('/otp/login', 'loginWithOtp')->name('otp.getlogin');

});



