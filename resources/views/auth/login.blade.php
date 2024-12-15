@extends('layouts.auth')

@section('content')
    <div class="row align-items-center">
        <!-- Formulaire de connexion -->
        <div class="col-md-6">
            <div class="login-card">
                <div class="login-header">
                    <div class="logo-container">
                        <i class="fas fa-user-circle fa-3x text-white mb-3"></i>
                        <h4 class="mb-0">Gestion des Absences</h4>
                        <p class="text-light mb-0">Connectez-vous à votre compte</p>
                    </div>
                </div>

                <div class="login-body">
                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label">Adresse Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-login text-white">
                                Se connecter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Image à droite -->
        <div class="col-md-6 d-none d-md-block text-center">
            <div class="illustration-wrapper">
                <img src="/images/school-application.png" alt="School Application" class="login-illustration"
                    onerror="this.onerror=null; console.log('Erreur de chargement de l\'image');">
            </div>
            <h2 class="text-white mt-4">Bienvenue sur la plateforme</h2>
            <p class="text-white-50">Système de gestion des absences</p>
        </div>
    </div>
@endsection
