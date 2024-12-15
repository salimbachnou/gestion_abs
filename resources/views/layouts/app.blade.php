<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPF - Gestion des Absences</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center gap-4">
                        <img src="{{ asset('images/upf-logo.png') }}" alt="UPF Logo" class="h-10">
                        <a href="/" class="text-xl font-bold text-indigo-600">Gestion des Absences</a>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-4">
                        <div class="relative group">
                            <button class="flex items-center px-3 py-2 text-gray-500 hover:text-indigo-600 group">
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                Gestion
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="absolute left-0 hidden group-hover:block mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                                <a href="{{ route('filieres.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">
                                    <i class="fas fa-graduation-cap mr-2"></i>Filières
                                </a>
                                <a href="{{ route('modules.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">
                                    <i class="fas fa-book mr-2"></i>Modules
                                </a>
                                <a href="{{ route('niveaux.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">
                                    <i class="fas fa-layer-group mr-2"></i>Niveaux
                                </a>
                            </div>
                        </div>
                        <div class="relative group">
                            <button class="flex items-center px-3 py-2 text-gray-500 hover:text-indigo-600 group">
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Absences
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="absolute left-0 hidden group-hover:block mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                                <a href="{{ route('seances.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">
                                    <i class="fas fa-clock mr-2"></i>Séances
                                </a>
                                <a href="{{ route('absences.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">
                                    <i class="fas fa-user-clock mr-2"></i>Absences
                                </a>
                            </div>
                        </div>
                        @if(Auth::user() && Auth::user()->role === 'admin')
                            <div class="relative group">
                                <button class="flex items-center px-3 py-2 text-gray-500 hover:text-indigo-600 group">
                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                    Utilisateurs
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="absolute left-0 hidden group-hover:block mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                                    <a href="{{ route('users.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">
                                        <i class="fas fa-user-plus mr-2"></i>Ajouter un utilisateur
                                    </a>
                                    <a href="{{ route('users.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">
                                        <i class="fas fa-users mr-2"></i>Liste des utilisateurs
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <div class="relative group">
                        <button class="flex items-center px-3 py-2 text-gray-500 hover:text-indigo-600">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-sm font-medium">{{ Auth::user()->name ?? 'Guest' }}</span>
                        </button>
                        @auth
                            <div class="absolute right-0 hidden group-hover:block mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">
                                        <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                                    </button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Statistiques -->
                <div class="md:col-span-4">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Statistiques des Absences</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-indigo-50 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900">1250</h3>
                                        <p class="text-sm text-gray-500">Total Étudiants</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-indigo-50 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900">4.8%</h3>
                                        <p class="text-sm text-gray-500">Taux d'Absentéisme</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-indigo-50 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900">85</h3>
                                        <p class="text-sm text-gray-500">Absences Non Justifiées</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Annonces -->
                <div class="md:col-span-4">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Annonces Importantes</h2>
                        <div class="space-y-4">
                            <div class="flex items-start p-4 bg-blue-50 rounded-lg">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-blue-800">Début des Examens</h3>
                                    <p class="mt-1 text-sm text-blue-600">Les examens commencent le 15 janvier 2024</p>
                                </div>
                            </div>
                            <div class="flex items-start p-4 bg-yellow-50 rounded-lg">
                                <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-yellow-800">Rappel Important</h3>
                                    <p class="mt-1 text-sm text-yellow-600">Justification des absences sous 48h obligatoire</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </main>

    @vite('resources/js/app.js')
</body>
</html>
