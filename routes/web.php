<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum'])->prefix('admin')->name('admin.')->group(function() {
    Route::resource('users', Admin\UserController::class);
});
