<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Seance;
use App\Models\User;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function index()
    {
        $absences = Absence::with(['user', 'seance.module'])->get();
        return view('absences.index', compact('absences'));
    }

    public function create()
    {
        $users = User::where('role', 'etudiant')->get();
        $seances = Seance::with('module')->get();

        return view('absences.create', compact('users', 'seances'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_seance' => 'required|exists:seances,id',
            'date_absence' => 'required|date',
            'justifiee' => 'required|boolean'
        ]);

        Absence::create($validated);

        return redirect()->route('absences.index')
            ->with('success', 'Absence enregistrée avec succès.');
    }

    public function show(Absence $absence)
    {
        return view('absences.show', compact('absence'));
    }

    public function edit(Absence $absence)
    {
        $users = User::where('role', 'etudiant')->get();
        $seances = Seance::with('module')->get();

        return view('absences.edit', compact('absence', 'users', 'seances'));
    }

    public function update(Request $request, Absence $absence)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_seance' => 'required|exists:seances,id',
            'date_absence' => 'required|date',
            'justifiee' => 'required|boolean'
        ]);

        $absence->update($validated);

        return redirect()->route('absences.index')
            ->with('success', 'Absence mise à jour avec succès.');
    }

    public function destroy(Absence $absence)
    {
        $absence->delete();

        return redirect()->route('absences.index')
            ->with('success', 'Absence supprimée avec succès.');
    }
} 