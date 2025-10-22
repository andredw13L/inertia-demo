<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home', [
        'name' => 'André Ribeiro',
        'frameworks' => [
            'Laravel', 'Vue', 'Inertia'
        ]
    ]);
});
