<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);
        if ($request->wantsJson()) {
            return response()->json(['data' => []]);
        }
        return view('users.index');
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        $this->authorize('create', User::class);
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     * Use a FormRequest like StoreUserRequest for real validation.
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        // Validate and create user
        return redirect()->route('users.index');
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     * Use UpdateUserRequest for validation in implementation.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        return redirect()->route('users.show', $user);
    }

    /**
     * Remove the specified user from storage (soft delete).
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('users.index');
    }
}
