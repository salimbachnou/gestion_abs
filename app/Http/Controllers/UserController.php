<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display a listing of the users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('users.create');
    }

    // Store a newly created user in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,rss,enseignant,etudiant',
            'date_naissance' => 'required|date',
            'ville' => 'required|string|max:255',
            'id_groupe' => 'nullable|exists:groupes,id_groupe',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    // Display the specified user
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    // Show the form for editing the specified user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Update the specified user in storage
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'email' => 'sometimes|email|unique:user,email,' . $id . ',id_user',
            'password' => 'sometimes|min:8',
            'role' => 'sometimes|in:admin,rss,enseignant,etudiant',
            'date_naissance' => 'sometimes|date',
            'ville' => 'sometimes|string|max:255',
            'id_groupe' => 'nullable|exists:groupes,id_groupe',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    // Remove the specified user from storage
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}