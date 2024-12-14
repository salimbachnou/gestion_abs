@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Créer un nouveau module</h2>

                <form action="{{ route('modules.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="nom_module" class="block text-sm font-medium text-gray-700">Nom du module</label>
                        <input type="text" name="nom_module" id="nom_module" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            value="{{ old('nom_module') }}" required>
                        @error('nom_module')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="date_creation" class="block text-sm font-medium text-gray-700">Date de création</label>
                        <input type="date" name="date_creation" id="date_creation" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            value="{{ old('date_creation') }}" required>
                        @error('date_creation')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('modules.index') }}" 
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