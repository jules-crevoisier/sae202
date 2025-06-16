<?php
// ETAPE 1: Récupération du chemin de l'URL
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Supprimer le chemin de base si on est dans un sous-dossier
$script_name = dirname($_SERVER['SCRIPT_NAME']);
if ($script_name !== '/' && strpos($path, $script_name) === 0) {
    $path = substr($path, strlen($script_name));
}

// S'assurer que le chemin commence par /
if (substr($path, 0, 1) !== '/') {
    $path = '/' . $path;
}

$items = explode('/', trim($path, '/'));

// ETAPE 2: Détermination du contrôleur
if (empty($items[0]) || $items[0] === '') {
    $controller = 'accueil';
} else {
    $controller = $items[0];
}

// PROTECTION DES ROUTES D'ADMINISTRATION
if ($controller === 'gestion') {
    // IPs autorisées (MMI Troyes)
    $authorized_ips = [
        '195.83.128.43',
        '194.199.63.200', 
        '194.199.63.199'
    ];
    
    $client_ip = $_SERVER['REMOTE_ADDR'];
    
    // Si l'IP n'est pas autorisée, demander l'authentification
    if (!in_array($client_ip, $authorized_ips)) {
        // Vérifier si l'authentification HTTP Basic est fournie
        if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
            // Demander l'authentification
            header('WWW-Authenticate: Basic realm="Administration SAE202 - Murder Party"');
            header('HTTP/1.0 401 Unauthorized');
            echo '<h1>Accès refusé</h1>';
            echo '<p>Vous devez vous authentifier pour accéder à cette section.</p>';
            exit;
        }
        
        // Vérifier les identifiants (vous pouvez adapter selon vos besoins)
        $valid_users = [
            'admin' => 'password123',
            'prof' => 'mmi2024',
            'sae202' => 'murderparty'
        ];
        
        $username = $_SERVER['PHP_AUTH_USER'];
        $password = $_SERVER['PHP_AUTH_PW'];
        
        if (!isset($valid_users[$username]) || $valid_users[$username] !== $password) {
            // Identifiants incorrects
            header('WWW-Authenticate: Basic realm="Administration SAE202 - Murder Party"');
            header('HTTP/1.0 401 Unauthorized');
            echo '<h1>Identifiants incorrects</h1>';
            echo '<p>Nom d\'utilisateur ou mot de passe invalide.</p>';
            exit;
        }
        
        // Authentification réussie, continuer
    }
}

// ETAPE 3: Détermination de l'action
if (empty($items[1]) || $items[1] === '') {
    $action = 'index';
} else {
    $action = $items[1];
}

// ETAPE 4: Chargement du contrôleur et exécution de l'action
$controller_file = 'controller/' . $controller . '_controller.php';

if (file_exists($controller_file)) {
    require_once($controller_file);
    if (function_exists($action)) {
        $action();
    } else {
        // Action non trouvée, redirection vers l'accueil
        require_once('controller/accueil_controller.php');
        index();
    }
} else {
    // Contrôleur non trouvé, redirection vers l'accueil
    require_once('controller/accueil_controller.php');
    index();
}
?> 