<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\APIcontroller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);

// Route::middleware('auth:api')->group(function () {
//     // Route::get('/users', [APIcontroller::class,'index']);
//     // Route::post('/users', 'APIcontroller@store');
//     // Route::put('/users/{id}', 'APIcontroller@update');
//     // Route::delete('/users/{id}', 'APIcontroller@destroy');
// });

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/users', [APIcontroller::class,'index']);

});
