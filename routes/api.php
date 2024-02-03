<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\AccessTokenController;
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

Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'register']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

Route::get('/user/{id}/vrtracker', [UserVrTrackerController::class, 'index']);
Route::get('/user/{id}/vrtracker/{vrtracker_id}', [UserVrTrackerController::class, 'show']);
Route::post('/user/{id}/vrtracker', [UserVrTrackerController::class, 'store']);
Route::put('/user/{id}/vrtracker/{vrtracker_id}', [UserVrTrackerController::class, 'update']);
Route::delete('/user/{id}/vrtracker/{vrtracker_id}', [UserVrTrackerController::class, 'destroy']);

Route::post('auth/access-tokens', [AccessTokenController::class, 'store'])
    ->middleware('guest:sanctum');

Route::delete('auth/access-tokens/{token?}', [AccessTokenController::class, 'destroy'])
    ->middleware('auth:sanctum');