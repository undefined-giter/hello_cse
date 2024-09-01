<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('index');
})->name('homepage');

Route::get('/login', [AdminController::class, 'login'])->name('login');

Route::post('/login', [AdminController::class, 'verifyLogin']);

Route::delete('/logout', [AdminController::class, 'logout'])->name('logout')->middleware('auth:admin');


Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.list');

Route::middleware('auth:admin')->name('profiles.')->group(function () {
    Route::get('/profiles/details/{id}', [ProfileController::class, 'details'])->name('details');

    Route::get('/profiles/create', [ProfileController::class, 'create'])->name('create');
    Route::post('/profiles/create', [ProfileController::class, 'store'])->name('store');

    Route::get('/profiles/{id}/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/profiles/{id}', [ProfileController::class, 'update'])->name('update');
});