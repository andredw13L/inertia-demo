<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    sleep(2);
    return Inertia::render('Home');
});

Route::get('/users', function () {
    sleep(2);
    return Inertia::render('Users');
});

Route::get('/settings', function () {
    sleep(2);
    return Inertia::render('Settings');
});

Route::post('logout', function () {
    dd(request('foo'));
});
