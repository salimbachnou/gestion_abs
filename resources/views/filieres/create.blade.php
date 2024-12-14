@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Créer une nouvelle filière</h2>

                <form action="{{ route('filieres.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="nom_filiere" class="block text-sm font-medium text-gray-700">Nom de la filière</label>
                        <input type="text" name="nom_filiere" id="nom_filiere" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            value="{{ old('nom_filiere') }}" required>
                        @error('nom_filiere')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('filieres.index') }}" 
                            class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition">
                            Annuler
                        </a>
                        <button type="submit" 
                            class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                            Créer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 