<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/users', function () {
    return Inertia::render('Users/Index', [
        'users' => User::query()
        ->when(Request::input('search'), fn (object $query, string $search) => 
                $query->where('name', 'like', '%' . $search . '%')
            )
            ->paginate(10)
            ->withQueryString()
            ->through(fn(User $user) => [
                'id' => $user->id,
                'name' => $user->name,
            ]),

        'filters' => Request::only(['search'])
    ]);
});

Route::post('/users', function () {
    $attributes = Request::validate([
        'name' => 'required|min:2|max:255',
        'email' => 'required|email',
        'password' => 'required|min:8'
    ]);

    User::create($attributes);

    return redirect('/users');
});

Route::get('/users/create', function () {
    return Inertia::render('Users/Create');
});


Route::get('/settings', function () {
    return Inertia::render('Settings');
});
