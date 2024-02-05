<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\Authentication\LoginController;
use App\Http\Controllers\Api\V1\Authentication\LogoutController;
use App\Http\Controllers\Api\V1\Authentication\RegisterController;

use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\UserVrTrackerController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::ApiResource('users', UserController::class);

Route::post('auth/register', [RegisterController::class, 'register'])
    ->middleware('guest:sanctum');

Route::post('auth/login', [LoginController::class, 'login'])
    ->middleware('guest:sanctum');

Route::delete('auth/logout/{token?}', [LogoutController::class, 'logout'])
    ->middleware('auth:sanctum');

Route::post('life-style', [LifeStyleController::class, 'store']);