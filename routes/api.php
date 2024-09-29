<?php

use App\Http\Controllers\iotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('SembakoStore',[iotController::class,'index']);
Route::get('SembakoStore/{id}',[iotController::class,'show']);
Route::put('SembakoStore/{id}',[iotController::class,'update']);
