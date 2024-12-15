<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

// Route de login (accessible sans authentification)
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes protégées (nécessitent une authentification)
Route::middleware(['auth'])->group(function () {
    // Route principale après connexion
    Route::get('/home', function () {
        return view('layouts.app');
    })->name('home');

    // Autres routes protégées
    Route::resource('filieres', FiliereController::class);
    Route::resource('modules', ModuleController::class);
    Route::resource('seances', SeanceController::class);
    Route::resource('absences', AbsenceController::class);
    Route::resource('niveaux', NiveauController::class);

    // Routes admin uniquement
    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::resource('users', UserController::class);
    });
});
