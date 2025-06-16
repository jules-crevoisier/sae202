<?php
session_start();

// Supprimer les variables de session d'authentification admin
unset($_SESSION['admin_authenticated']);
unset($_SESSION['admin_user']);

// Détruire la session
session_destroy();

// Forcer la déconnexion HTTP Basic en envoyant des identifiants invalides
header('WWW-Authenticate: Basic realm="Administration SAE202 - Murder Party"');
header('HTTP/1.1 401 Unauthorized');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion Administration</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        .container { max-width: 500px; margin: 0 auto; }
        .btn { background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Déconnexion réussie</h1>
        <p>Vous avez été déconnecté de l'administration.</p>
        <p>Pour vous reconnecter, <a href="/gestion" class="btn">cliquez ici</a></p>
        <p>Ou retournez à l'<a href="/" class="btn">accueil du site</a></p>
    </div>
</body>
</html> 