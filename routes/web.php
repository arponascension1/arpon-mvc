<?php

use Arpon\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/example', [App\Http\Controllers\ExampleController::class, 'index']);

// Test new routing features with named routes
Route::group(['prefix' => 'test', 'as' => 'test.'], function () {
    Route::get('/{id}', function ($id) {
        return "User ID (numeric only): $id";
    })->whereNumber('id')->name('numeric');

    Route::get('/name/{name?}', function ($name = 'Guest') {
        return "Hello, $name! (optional parameter)";
    })->whereAlpha('name')->name('optional');
});

Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->middleware('guest');
Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->middleware('guest');

// User CRUD routes (protected by authentication middleware) - Using Resource Route
Route::resource('users', App\Http\Controllers\UserController::class)
    ->middleware('auth')
    ->except(['show']); // Exclude show route since we only need CRUD operations
 