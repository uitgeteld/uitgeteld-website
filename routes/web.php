<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\IsAdmin;

Route::domain('tree.' . parse_url(config('app.url'), PHP_URL_HOST))->group(function () {
    Route::get('/', function () {
        return view('tree');
    })->name('tree');
});

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::group(['middleware' => 'auth'], function () {
    Route::view('/dashboard', 'dashboard.index')->name('dashboard');
    Route::get('/user-projects', [ProjectController::class, 'userProjects'])->name('projects.user');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/two-factor', [ProfileController::class, 'showTwoFactor'])->name('profile.two-factor');
});

Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');

Route::group(['middleware' => ['auth', IsAdmin::class]], function () {
    Route::resource('users', UserController::class);
});
