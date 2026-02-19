<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\IsAdmin;


Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/tree', function () {
    return view('tree');
})->name('tree');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::group(['middleware' => 'auth'], function () {
    Route::view('/dashboard', 'dashboard.index')->name('dashboard');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/two-factor', [ProfileController::class, 'showTwoFactor'])->name('profile.two-factor');
});

Route::group(['middleware' => ['auth', IsAdmin::class]], function () {
    Route::resource('users', UserController::class);
});
