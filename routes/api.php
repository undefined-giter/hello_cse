<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\ProfileController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); // ->middleware('auth:sanctum') is here to protect routes by using Sanctum package

Route::middleware('auth:sanctum')->post('/profiles', [ProfileController::class, 'store']);
