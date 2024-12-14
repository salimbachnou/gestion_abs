@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Modifier le niveau</h2>

                <form action="{{ route('niveaux.update', $niveau) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nom_niveau" class="block text-sm font-medium text-gray-700">Nom du niveau</label>
                        <input type="text" name="nom_niveau" id="nom_niveau" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            value="{{ old('nom_niveau', $niveau->nom_niveau) }}" required>
                        @error('nom_niveau')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="id_filiere" class="block text-sm font-medium text-gray-700">Filière</label>
                        <select name="id_filiere" id="id_filiere" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Sélectionnez une filière</option>
                            @foreach($filieres as $filiere)
                                <option value="{{ $filiere->id_filiere }}" 
                                    {{ (old('id_filiere', $niveau->id_filiere) == $filiere->id_filiere) ? 'selected' : '' }}>
                                    {{ $filiere->nom_filiere }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_filiere')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('niveaux.index') }}" 
                            class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition">
                            Annuler
                        </a>
                        <button type="submit" 
                            class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 