<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\IsAdmin;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::group(['middleware' => 'auth'], function () {
    Route::view('/dashboard', 'dashboard.index')->name('dashboard');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
});

Route::group(['middleware' => ['auth', IsAdmin::class]], function () {
    Route::resource('users', UserController::class);
});
