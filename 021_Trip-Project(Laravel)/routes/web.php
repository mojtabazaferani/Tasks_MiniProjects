<?php

use App\Http\Controllers\TripController;
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

Route::controller(TripController::class)->group(function() {

    Route::get('/', 'home')->name('home');

    Route::get('/register', 'register')->name('register');

    Route::post('/store', 'store')->name('store');

    Route::get('/login', 'login')->name('login');

    Route::post('/check', 'check')->name('check');

    Route::get('/profile', 'profile')->name('profile');

    Route::get('/edit', 'edit')->name('edit');

    Route::get('/trip', 'trip')->name('trip');

    Route::post('/create-trip', 'createTrip')->name('create-trip');

    Route::get('/notification', 'notification')->name('notification');

    Route::get('/delete/notification/{id}', 'deleteNotification')->name('delete-notification');

    Route::get('/read/notification/{id}/{username}/{post}', 'readNotification')->name('read-notification');

    Route::get('/logout', 'logout')->name('logout');

    Route::delete('/delete', 'delete')->name('delete');

});


