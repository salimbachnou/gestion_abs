@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Modifier l'absence</h2>

                <form action="{{ route('absences.update', $absence) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="id_user" class="block text-sm font-medium text-gray-700">Étudiant</label>
                        <select name="id_user" id="id_user" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Sélectionnez un étudiant</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" 
                                    {{ (old('id_user', $absence->id_user) == $user->id) ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_user')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="id_seance" class="block text-sm font-medium text-gray-700">Séance</label>
                        <select name="id_seance" id="id_seance" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Sélectionnez une séance</option>
                            @foreach($seances as $seance)
                                <option value="{{ $seance->id }}" 
                                    {{ (old('id_seance', $absence->id_seance) == $seance->id) ? 'selected' : '' }}>
                                    {{ $seance->module->nom_module }} - {{ \Carbon\Carbon::parse($seance->date_de_seance)->format('d/m/Y') }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_seance')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="date_absence" class="block text-sm font-medium text-gray-700">Date de l'absence</label>
                        <input type="date" name="date_absence" id="date_absence" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            value="{{ old('date_absence', $absence->date_absence) }}" required>
                        @error('date_absence')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="justifiee" class="block text-sm font-medium text-gray-700">Justifiée</label>
                        <select name="justifiee" id="justifiee" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="0" {{ (old('justifiee', $absence->justifiee) == '0') ? 'selected' : '' }}>Non</option>
                            <option value="1" {{ (old('justifiee', $absence->justifiee) == '1') ? 'selected' : '' }}>Oui</option>
                        </select>
                        @error('justifiee')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('absences.index') }}" 
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