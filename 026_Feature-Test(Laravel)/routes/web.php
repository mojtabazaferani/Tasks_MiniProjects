<?php

use App\Http\Controllers\TddController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(TddController::class)->group(function() {

    Route::get('/', 'home')->name('home');

    Route::get('/welcome', 'welcome')->name('welcome');

    Route::get('/register', 'register')->name('register');

    Route::post('/store', 'store')->name('store');

    Route::get('/login', 'login')->name('login');

    Route::post('/check', 'check')->name('check');
    
});
