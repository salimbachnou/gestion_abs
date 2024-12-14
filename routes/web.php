<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\NiveauController;

use Illuminate\Support\Facades\Route;

Route::view('/', 'layouts/app');

Route::resource('filieres', FiliereController::class);
Route::resource('modules', ModuleController::class);
Route::resource('seances', SeanceController::class);
Route::resource('absences', AbsenceController::class);
Route::resource('niveaux', NiveauController::class);