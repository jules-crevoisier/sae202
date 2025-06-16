<?php
require_once('conf/config.php');
require_once('model/Message.php');

function index() {
    // Vérifier si l'utilisateur est connecté
    if (!isLoggedIn()) {
        redirect('/auth/connexion');
    }
    
    // Récupérer les messages de l'utilisateur
    $messages = Message::getByUser($_SESSION['user_id']);
    
    require_once('view/messagerie.php');
}

function nouveau() {
    // Vérifier si l'utilisateur est connecté
    if (!isLoggedIn()) {
        redirect('/auth/connexion');
    }
    
    $erreurs = [];
    $succes = false;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sujet = securise($_POST['sujet'] ?? '');
        $contenu = securise($_POST['contenu'] ?? '');
        
        // Validations
        if (empty($sujet)) $erreurs[] = "Le sujet est requis";
        if (empty($contenu)) $erreurs[] = "Le message est requis";
        if (strlen($contenu) < 10) $erreurs[] = "Le message doit contenir au moins 10 caractères";
        
        if (empty($erreurs)) {
            if (Message::send($_SESSION['user_id'], $sujet, $contenu)) {
                $succes = true;
            } else {
                $erreurs[] = "Erreur lors de l'envoi du message";
            }
        }
    }
    
    require_once('view/messagerie_nouveau.php');
}

function voir() {
    // Vérifier si l'utilisateur est connecté
    if (!isLoggedIn()) {
        redirect('/auth/connexion');
    }
    
    // Récupérer l'ID du message depuis l'URL
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $items = explode('/', $path);
    $message_id = intval($items[3] ?? 0);
    
    if ($message_id <= 0) {
        redirect('/messagerie');
    }
    
    // Récupérer le message
    $message = Message::getById($message_id);
    
    // Vérifier que le message appartient à l'utilisateur connecté
    if (!$message || $message['utilisateur_id'] != $_SESSION['user_id']) {
        redirect('/messagerie');
    }
    
    require_once('view/messagerie_voir.php');
}
?> 