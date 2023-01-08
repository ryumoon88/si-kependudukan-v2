<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/service', App\Http\Controllers\Api\ServiceController::class)->names('api.service');
Route::post('/resident', [App\Http\Controllers\Api\ResidentController::class, 'index'])->name('api.resident');
Route::post('/resident-birth', [App\Http\Controllers\Api\ResidentBirthController::class, 'index'])->name('api.resident-birth');