<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhoneNumberController;

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

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);
Route::get('/users/{user}/show-user-infos', [UserController::class, 'showUserInfos']);

Route::get('/phone-numbers', [PhoneNumberController::class, 'index']);
Route::post('/phone-numbers', [PhoneNumberController::class, 'store']);
Route::get('/phone-numbers/{phoneNumber}', [PhoneNumberController::class, 'show']);
Route::put('/phone-numbers/{phoneNumber}', [PhoneNumberController::class, 'update']);
Route::delete('/phone-numbers/{phoneNumber}', [PhoneNumberController::class, 'destroy']);