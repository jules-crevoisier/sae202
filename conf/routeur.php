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