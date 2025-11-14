<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login');
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth');

// TODO: Handle edit authorization and security

// TODO: Create a fallback route and page

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return Inertia::render('Home', [
            'inspire' => [
                'message' => Inspiring::quote()
            ]
        ]);
    });

    Route::resource('/users', UserController::class);

    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    })->can('create', 'App\\Models\User');


    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });
});
