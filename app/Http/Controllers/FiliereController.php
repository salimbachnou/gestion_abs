<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index()
    {
        $filieres = Filiere::all();
        return view('filieres.index', compact('filieres'));
    }

    public function create()
    {
        return view('filieres.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_filiere' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Filiere::create($validated);

        return redirect()->route('filieres.index')
            ->with('success', 'Filière créée avec succès.');
    }

    public function show(Filiere $filiere)
    {
        return view('filieres.show', compact('filiere'));
    }

    public function edit(Filiere $filiere)
    {
        return view('filieres.edit', compact('filiere'));
    }

    public function update(Request $request, Filiere $filiere)
    {
        $validated = $request->validate([
            'nom_filiere' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $filiere->update($validated);

        return redirect()->route('filieres.index')
            ->with('success', 'Filière mise à jour avec succès.');
    }

    public function destroy(Filiere $filiere)
    {
        $filiere->delete();

        return redirect()->route('filieres.index')
            ->with('success', 'Filière supprimée avec succès.');
    }
}