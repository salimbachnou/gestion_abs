@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Détails du niveau</h2>
                    <a href="{{ route('niveaux.index') }}" 
                        class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition">
                        Retour
                    </a>
                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 rounded-lg">
                    <dt class="text-sm font-medium text-gray-500">ID</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $niveau->id }}</dd>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Nom du niveau</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $niveau->nom_niveau }}</dd>
                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 rounded-lg">
                    <dt class="text-sm font-medium text-gray-500">Filière</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $niveau->filiere->nom_filiere }}</dd>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Date de création</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $niveau->created_at->format('d/m/Y H:i') }}</dd>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('niveaux.edit', $niveau) }}" 
                        class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition">
                        Modifier
                    </a>
                    <form action="{{ route('niveaux.destroy', $niveau) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce niveau?')">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 