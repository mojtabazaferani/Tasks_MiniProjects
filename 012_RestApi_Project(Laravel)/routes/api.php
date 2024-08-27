<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;

use App\Http\Controllers\AuthController;
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

Route::get('/blogs', [BlogController::class, 'index']);

Route::get('/blogs/{id}', [BlogController::class, 'show']);

Route::get('/blogs/search/{name}', [BlogController::class, 'search']);


//Protected Route
Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::post('/blogs', [BlogController::class, 'store']);

    Route::put('/blogs/{id}', [BlogController::class, 'update']);

    Route::delete('/blogs/{id}', [BlogController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});



