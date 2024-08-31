<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('index');
})->name('homepage');

Route::get('/login', [AdminController::class, 'login'])->name('admin.login');

Route::post('/login', [AdminController::class, 'verifyLogin']);


Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.list');

Route::get('/profiles/create', [ProfileController::class, 'create'])->name('profiles.create')->middleware('auth:sanctum');

Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store')->middleware('auth:sanctum');
// ->middleware('auth:sanctum') is here to protect routes by using Sanctum package;