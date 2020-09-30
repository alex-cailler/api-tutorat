<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\MatterController;
use App\Http\Controllers\ClasseParticipantController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [SecurityController::class, 'login']);
Route::post('/register', [SecurityController::class, 'register']);
Route::post('/password/update', [SecurityController::class, 'updatePassword'])->middleware('auth:api');
Route::get('/me', [UserController::class, 'me'])->middleware(['auth:api']);
Route::post('/logout', [SecurityController::class, 'logout'])->middleware(['auth:api']);


Route::apiResources([
    'user' => UserController::class,
    'classe' => ClasseController::class,
    'participant-classe' => ClasseParticipantController::class,
    'matter' => MatterController::class
]);

