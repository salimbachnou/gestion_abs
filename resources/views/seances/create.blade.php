@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Créer une nouvelle séance</h2>

                <form action="{{ route('seances.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="date_de_seance" class="block text-sm font-medium text-gray-700">Date de la séance</label>
                        <input type="date" name="date_de_seance" id="date_de_seance" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            value="{{ old('date_de_seance') }}" required>
                        @error('date_de_seance')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="niveau_id" class="block text-sm font-medium text-gray-700">Niveau</label>
                        <select name="niveau_id" id="niveau_id" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Sélectionnez un niveau</option>
                            @foreach($niveaux as $niveau)
                                <option value="{{ $niveau->id }}" {{ old('niveau_id') == $niveau->id ? 'selected' : '' }}>
                                    {{ $niveau->nom_niveau }}
                                </option>
                            @endforeach
                        </select>
                        @error('niveau_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="id_groupe" class="block text-sm font-medium text-gray-700">Groupe</label>
                        <select name="id_groupe" id="id_groupe" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Sélectionnez un groupe</option>
                            @foreach($groupes as $groupe)
                                <option value="{{ $groupe->id_groupe }}" {{ old('id_groupe') == $groupe->id_groupe ? 'selected' : '' }}>
                                    {{ $groupe->nom_groupe }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_groupe')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="id_module" class="block text-sm font-medium text-gray-700">Module</label>
                        <select name="id_module" id="id_module" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Sélectionnez un module</option>
                            @foreach($modules as $module)
                                <option value="{{ $module->id_module }}" {{ old('id_module') == $module->id_module ? 'selected' : '' }}>
                                    {{ $module->nom_module }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_module')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="id_user" class="block text-sm font-medium text-gray-700">Professeur</label>
                        <select name="id_user" id="id_user" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Sélectionnez un professeur</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id_user }}" {{ old('id_user') == $user->id_user ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_user')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('seances.index') }}" 
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