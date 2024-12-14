<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        return view('modules.index', compact('modules'));
    }

    public function create()
    {
        return view('modules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_module' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_creation' => 'required|date'
        ]);

        Module::create($validated);

        return redirect()->route('modules.index')
            ->with('success', 'Module créé avec succès.');
    }

    public function show(Module $module)
    {
        return view('modules.show', compact('module'));
    }

    public function edit(Module $module)
    {
        return view('modules.edit', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $validated = $request->validate([
            'nom_module' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_creation' => 'required|date'
        ]);

        $module->update($validated);

        return redirect()->route('modules.index')
            ->with('success', 'Module mis à jour avec succès.');
    }

    public function destroy(Module $module)
    {
        $module->delete();

        return redirect()->route('modules.index')
            ->with('success', 'Module supprimé avec succès.');
    }
} 