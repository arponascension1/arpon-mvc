<?php

namespace App\Http\Controllers;

use App\Models\User;
use Arpon\Http\Request;
use Arpon\Support\Facades\Auth;
use Arpon\Support\Facades\Redirect;
use Arpon\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return Redirect::to('/users')->with('success', 'User created successfully');
    }

    /**
     * Show the form for editing a user
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update a user
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
        ]);

        // Update user
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        // Only update password if provided
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        
        $user->save();

        return Redirect::to('/users')->with('success', 'User updated successfully');
    }

        /**
     * Delete a user
     */
    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::to('/users')->with('success', 'User deleted successfully');
    }
}
