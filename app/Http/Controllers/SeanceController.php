<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Models\Module;
use App\Models\Niveau;
use App\Models\Groupe;
use App\Models\User;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    public function index()
    {
        $seances = Seance::with(['module', 'niveau', 'groupe', 'user'])->get();
        return view('seances.index', compact('seances'));
    }

    public function create()
    {
        $modules = Module::all();
        $niveaux = Niveau::all();
        $groupes = Groupe::all();
        $users = User::where('role', 'professeur')->get();

        return view('seances.create', compact('modules', 'niveaux', 'groupes', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_de_seance' => 'required|date',
            'id_module' => 'required|exists:modules,id_module',
            'niveau_id' => 'required|exists:niveaux,id',
            'id_groupe' => 'required|exists:groupes,id_groupe',
            'id_user' => 'required|exists:users,id'
        ]);

        Seance::create($validated);

        return redirect()->route('seances.index')
            ->with('success', 'Séance créée avec succès.');
    }

    public function show(Seance $seance)
    {
        return view('seances.show', compact('seance'));
    }

    public function edit(Seance $seance)
    {
        $modules = Module::all();
        $niveaux = Niveau::all();
        $groupes = Groupe::all();
        $users = User::where('role', 'professeur')->get();

        return view('seances.edit', compact('seance', 'modules', 'niveaux', 'groupes', 'users'));
    }

    public function update(Request $request, Seance $seance)
    {
        $validated = $request->validate([
            'date_de_seance' => 'required|date',
            'id_module' => 'required|exists:modules,id_module',
            'niveau_id' => 'required|exists:niveaux,id',
            'id_groupe' => 'required|exists:groupes,id_groupe',
            'id_user' => 'required|exists:users,id'
        ]);

        $seance->update($validated);

        return redirect()->route('seances.index')
            ->with('success', 'Séance mise à jour avec succès.');
    }

    public function destroy(Seance $seance)
    {
        $seance->delete();

        return redirect()->route('seances.index')
            ->with('success', 'Séance supprimée avec succès.');
    }
} 