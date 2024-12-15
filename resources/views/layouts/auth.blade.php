<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestion des Absences</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #818cf8 0%, #6366f1 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
        }
        .login-header {
            background: linear-gradient(to right, #818cf8, #6366f1);
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 20px;
            text-align: center;
        }
        .login-body {
            padding: 30px;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #ddd;
            background: rgba(255, 255, 255, 0.9);
        }
        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
        }
        .btn-login {
            background: linear-gradient(to right, #818cf8, #6366f1);
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background: linear-gradient(to right, #6366f1, #818cf8);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4);
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .student-image {
            max-width: 80%;
            height: auto;
            filter: drop-shadow(0 10px 15px rgba(0,0,0,0.3));
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .container {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        /* Ajout d'effets de survol pour les champs de formulaire */
        .form-control:hover {
            border-color: #818cf8;
            transition: all 0.3s ease;
        }
        /* Style pour le texte de bienvenue */
        .welcome-text {
            color: #6366f1;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        /* Animation pour les icônes */
        .fa-user-circle {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        .illustration-wrapper {
            position: relative;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .background-wave {
            position: absolute;
            width: 100%;
            height: auto;
            opacity: 0.1;
            z-index: 1;
        }

        .login-illustration {
            position: relative;
            z-index: 2;
            max-width: 80%;
            height: auto;
            filter: drop-shadow(0 10px 15px rgba(255, 255, 255, 0.1));
            animation: float 6s ease-in-out infinite;
            opacity: 0.9;
        }

        .login-illustration:hover {
            opacity: 1;
            transform: scale(1.02);
            filter: drop-shadow(0 15px 25px rgba(255, 255, 255, 0.2));
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        /* Ajustement des couleurs pour correspondre au thème */
        .login-illustration path {
            fill: #818cf8;
        }

        .login-illustration circle {
            fill: #6366f1;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

