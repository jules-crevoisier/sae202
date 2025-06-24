<?php
require_once('conf/config.php');
require_once('model/User.php');
require_once('model/Comment.php');
require_once('model/Message.php');

function index() {
    // Vérifier si l'utilisateur est admin
    if (!isAdmin()) {
        redirect('/auth/connexion');
    }
    
    // Statistiques du tableau de bord
    $nb_utilisateurs = count(User::getAll());
    $nb_messages_non_lus = Message::countUnread();
    $commentaires_en_attente = Comment::getPending();
    $nb_commentaires_attente = count($commentaires_en_attente);
    
    require_once('admin/dashboard.php');
}

function utilisateurs() {
    // Vérifier si l'utilisateur est admin
    if (!isAdmin()) {
        redirect('/auth/connexion');
    }
    
    $action = '';
    $utilisateur_id = 0;
    
    // Récupérer l'action depuis l'URL
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $items = explode('/', $path);
    if (isset($items[3])) {
        $action = $items[3];
        if (isset($items[4])) {
            $utilisateur_id = intval($items[4]);
        }
    }
    
    // Traitement des actions
    if ($action === 'detail' && $utilisateur_id > 0) {
        $utilisateur = User::getById($utilisateur_id);
        if (!$utilisateur) {
            redirect('/admin/utilisateurs');
        }
        
        // Récupérer les commentaires de l'utilisateur
        $commentaires_utilisateur = Comment::getByUser($utilisateur_id);
        
        // Récupérer les messages de l'utilisateur
        $messages_utilisateur = Message::getByUser($utilisateur_id);
        
        require_once('admin/utilisateur_detail.php');
        return;
    }
    
    // Récupérer tous les utilisateurs
    $utilisateurs = User::getAll();
    
    require_once('admin/utilisateurs.php');
}

function messages() {
    // Vérifier si l'utilisateur est admin
    if (!isAdmin()) {
        redirect('/auth/connexion');
    }
    
    $action = '';
    $message_id = 0;
    
    // Récupérer l'action depuis l'URL
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $items = explode('/', $path);
    if (isset($items[3])) {
        $action = $items[3];
        if (isset($items[4])) {
            $message_id = intval($items[4]);
        }
    }
    
    // Traitement des actions
    if ($action === 'voir' && $message_id > 0) {
        $message = Message::getById($message_id);
        if ($message) {
            Message::markAsRead($message_id);
        }
        require_once('admin/message_detail.php');
        return;
    }
    
    if ($action === 'repondre' && $message_id > 0) {
        $erreurs = [];
        $succes = false;
        
        $message = Message::getById($message_id);
        if (!$message) {
            redirect('/admin/messages');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reponse = nettoyer($_POST['reponse'] ?? '');
            
            if (empty($reponse)) {
                $erreurs[] = "La réponse est requise";
            } elseif (strlen($reponse) < 10) {
                $erreurs[] = "La réponse doit contenir au moins 10 caractères";
            }
            
            if (empty($erreurs)) {
                if (Message::reply($message_id, $reponse)) {
                    $succes = true;
                } else {
                    $erreurs[] = "Erreur lors de l'envoi de la réponse";
                }
            }
        }
        
        require_once('admin/message_repondre.php');
        return;
    }
    
    if ($action === 'supprimer' && $message_id > 0) {
        Message::delete($message_id);
        redirect('/admin/messages');
    }
    
    // Affichage de la liste des messages
    $messages = Message::getAll();
    require_once('admin/messages.php');
}

function commentaires() {
    // Vérifier si l'utilisateur est admin
    if (!isAdmin()) {
        redirect('/auth/connexion');
    }
    
    $action = '';
    $commentaire_id = 0;
    
    // Récupérer l'action depuis l'URL
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $items = explode('/', $path);
    if (isset($items[3])) {
        $action = $items[3];
        if (isset($items[4])) {
            $commentaire_id = intval($items[4]);
        }
    }
    
    // Traitement des actions
    if ($action === 'approuver' && $commentaire_id > 0) {
        Comment::approve($commentaire_id);
        redirect('/admin/commentaires');
    }
    
    if ($action === 'rejeter' && $commentaire_id > 0) {
        Comment::reject($commentaire_id);
        redirect('/admin/commentaires');
    }
    
    // Affichage de la liste des commentaires
    $commentaires = Comment::getAll();
    require_once('admin/commentaires.php');
}
?> 