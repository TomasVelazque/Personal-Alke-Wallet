<?php

use App\Http\Controllers\api\v1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

# RUTA PRINCIPAL DE LA APP VERSION 1
Route::prefix('v1')->group(function(){

    # ---------------------------------------------------------------------------------------
    # ---> AUTH <---

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/profile', [AuthController::class, 'profile']);

    

});