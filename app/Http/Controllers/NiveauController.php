<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use App\Models\Filiere;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    /**
     * Afficher la liste des niveaux.
     */
    public function index()
    {
        $niveaux = Niveau::with('filiere')->get(); // Charger la filière associée
        return view('niveaux.index', compact('niveaux'));
    }

    /**
     * Afficher le formulaire pour créer un nouveau niveau.
     */
    public function create()
    {
        $filieres = Filiere::all(); // Récupérer toutes les filières pour le dropdown
        return view('niveaux.create', compact('filieres'));
    }

    /**
     * Enregistrer un nouveau niveau.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_niveau' => 'required|string|max:255',
            'id_filiere' => 'required|exists:filieres,id_filiere',
        ]);

        Niveau::create($request->all());

        return redirect()->route('niveaux.index')->with('success', 'Niveau créé avec succès.');
    }

    /**
     * Afficher un niveau spécifique.
     */
    public function show(Niveau $niveau)
    {
        return view('niveaux.show', compact('niveau'));
    }

    /**
     * Afficher le formulaire pour modifier un niveau.
     */
    public function edit(Niveau $niveau)
    {
        $filieres = Filiere::all(); // Récupérer toutes les filières pour le dropdown
        return view('niveaux.edit', compact('niveau', 'filieres'));
    }

    /**
     * Mettre à jour un niveau existant.
     */
    public function update(Request $request, Niveau $niveau)
    {
        $request->validate([
            'nom_niveau' => 'required|string|max:255',
            'id_filiere' => 'required|exists:filieres,id_filiere',
        ]);

        $niveau->update($request->all());

        return redirect()->route('niveaux.index')->with('success', 'Niveau mis à jour avec succès.');
    }

    /**
     * Supprimer un niveau.
     */
    public function destroy(Niveau $niveau)
    {
        $niveau->delete();

        return redirect()->route('niveaux.index')->with('success', 'Niveau supprimé avec succès.');
    }
}