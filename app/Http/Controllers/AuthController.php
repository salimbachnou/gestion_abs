<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ]);
    }

    public function createUser(Request $request)
    {
        // Vérifier si l'utilisateur connecté est admin
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Non autorisé');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:rss,enseignant'
        ]);

        // Générer un mot de passe aléatoire
        $password = Str::random(8);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'role' => $request->role
        ]);

        // Envoyer l'email avec les identifiants
        Mail::to($user->email)->send(new \App\Mail\UserCredentials($user, $password));

        return redirect()->back()->with('success', 'Utilisateur créé avec succès');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
