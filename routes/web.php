<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login');
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth');

// TODO: Create a edit user endpoint, view and handle authorization

// TODO: Create a fallback route and page

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return Inertia::render('Home', [
            'inspire' => [
                'message' => Inspiring::quote()
            ]
        ]);
    });

    Route::get('/users', function () {
        return Inertia::render('Users/Index', [
            'users' => User::query()
                ->when(
                    Request::input('search'),
                    fn(object $query, string $search) =>
                    $query->where('name', 'like', '%' . $search . '%')
                )
                ->paginate(10)
                ->withQueryString()
                ->through(fn(User $user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'can' => [
                        'edit' => Auth::user()->can('edit', $user)
                    ]
                ]),

            'filters' => Request::only(['search']),

            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
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
    })->can('create', 'App\\Models\User');


    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });
});
