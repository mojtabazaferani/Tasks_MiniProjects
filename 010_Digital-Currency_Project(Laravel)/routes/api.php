<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\CurrencyController;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

*/

//Public Route
Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

//Protected Route
Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::get('/details', [CurrencyController::class, 'details']);

    Route::get('/btc', [CurrencyController::class, 'btc']);

    Route::get('/checkprice', [CurrencyController::class, 'checkPrice']);

    Route::post('/alert', [CurrencyController::class, 'alert']);

    Route::get('/notice/{id}', [CurrencyController::class, 'notice']);

    Route::get('/invoice', [CurrencyController::class, 'invoice']);

    Route::get('/getnotification/{id}', [CurrencyController::class, 'getNotification']);

    Route::get('/readnotification/{id}', [CurrencyController::class, 'readNotification']);

    Route::post('/logout', [AuthController::class, 'logout']);

});



