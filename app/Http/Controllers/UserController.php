<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function __construct(protected User $user) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Inertia::render('Users/Index', [
            'users' => User::query()
                ->when(
                    $request->input('search'),
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

            'filters' => $request->only(['search']),

            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        User::create($attributes);

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user)
    {

        return Inertia::render('Users/Edit', [
            'user' => $user->only('name', 'email', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $attributes = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user->update($attributes);

        return redirect()->to('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
