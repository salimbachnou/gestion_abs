<!DOCTYPE html>
<html>
<head>
    <title>Vos identifiants de connexion</title>
</head>
<body>
    <h2>Bonjour {{ $user->name }},</h2>
    <p>Voici vos identifiants de connexion :</p>
    <p>Email : {{ $user->email }}</p>
    <p>Mot de passe : {{ $password }}</p>
    <p>Vous pouvez vous connecter en utilisant ce lien : {{ url('/login') }}</p>
</body>
</html>
