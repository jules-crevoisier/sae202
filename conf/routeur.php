<?php
// Démarrer la session pour la gestion de l'authentification
session_start();

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
    
    // Récupération de l'IP réelle (en tenant compte des proxies)
    $client_ip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $client_ip = trim(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]);
    } elseif (isset($_SERVER['HTTP_X_REAL_IP'])) {
        $client_ip = $_SERVER['HTTP_X_REAL_IP'];
    }
    
    // Si l'IP n'est pas autorisée, vérifier l'authentification
    if (!in_array($client_ip, $authorized_ips)) {
        
        // Identifiants valides
        $valid_users = [
            'admin' => 'password123',
            'prof' => 'mmi2024',
            'sae202' => 'murderparty'
        ];
        
        // Vérifier si l'utilisateur est déjà authentifié via session
        $is_authenticated = isset($_SESSION['admin_authenticated']) && $_SESSION['admin_authenticated'] === true;
        
        // Si pas authentifié, vérifier HTTP Basic
        if (!$is_authenticated) {
            if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
                $username = $_SERVER['PHP_AUTH_USER'];
                $password = $_SERVER['PHP_AUTH_PW'];
                
                // Vérifier les identifiants
                if (array_key_exists($username, $valid_users) && $valid_users[$username] === $password) {
                    // Authentification réussie - sauvegarder en session
                    $_SESSION['admin_authenticated'] = true;
                    $_SESSION['admin_user'] = $username;
                    $is_authenticated = true;
                }
            }
        }
        
        // Si toujours pas authentifié, demander l'authentification
        if (!$is_authenticated) {
            header('WWW-Authenticate: Basic realm="Administration SAE202 - Murder Party"');
            header('HTTP/1.1 401 Unauthorized');
            echo '<!DOCTYPE html>';
            echo '<html><head><title>Authentification requise</title></head>';
            echo '<body><h1>Accès refusé</h1>';
            echo '<p>Vous devez vous authentifier pour accéder à cette section.</p>';
            echo '<p><strong>Comptes disponibles :</strong></p>';
            echo '<ul><li>admin / password123</li><li>prof / mmi2024</li><li>sae202 / murderparty</li></ul>';
            echo '</body></html>';
            exit;
        }
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