<?php
/**
 * Routeur pour les pages d'administration
 * Toutes les pages de ce dossier sont protégées par Apache Basic Auth
 */

// Inclusion des fichiers de configuration et modèles
require_once('../conf/config.php');
require_once('../model/User.php');
require_once('../model/Message.php');
require_once('../model/Comment.php');

// Vérification que l'utilisateur est connecté ET administrateur
if (!isLoggedIn() || !isAdmin()) {
    // Redirection vers la page de connexion si pas connecté
    if (!isLoggedIn()) {
        header('Location: /auth/connexion');
        exit;
    }
    // Erreur 403 si connecté mais pas admin
    http_response_code(403);
    echo "Accès refusé. Vous devez être administrateur pour accéder à cette page.";
    exit;
}

// Récupération de l'URL demandée
$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);

// Suppression du préfixe /gestion
$path = str_replace('/gestion', '', $path);
$path = trim($path, '/');

// Si pas de chemin spécifié, redirection vers le dashboard
if (empty($path)) {
    $path = 'dashboard';
}

// Routage des pages d'administration
switch ($path) {
    case 'dashboard':
    case '':
        // Dashboard principal
        $stats = [
            'total_utilisateurs' => count(User::getAll()),
            'total_messages' => count(Message::getAll()),
            'total_commentaires' => count(Comment::getAll()),
            'messages_non_lus' => Message::countUnread(),
            'commentaires_en_attente' => count(Comment::getPending())
        ];
        
        $recent_messages = array_slice(Message::getAll(), 0, 5);
        $recent_comments = array_slice(Comment::getAll(), 0, 5);
        $recent_users = array_slice(User::getAll(), 0, 5);
        $commentaires_en_attente = Comment::getPending();
        
        include 'dashboard.php';
        break;
        
    case 'utilisateurs':
        // Liste des utilisateurs
        $utilisateurs = User::getAll();
        include 'utilisateurs.php';
        break;
        
    case 'utilisateur':
        // Détail d'un utilisateur
        if (isset($_GET['id'])) {
            $user_id = (int)$_GET['id'];
            $utilisateur = User::getById($user_id);
            
            if (!$utilisateur) {
                http_response_code(404);
                echo "Utilisateur non trouvé";
                exit;
            }
            
            $commentaires_utilisateur = Comment::getByUser($user_id);
            $messages_utilisateur = Message::getByUser($user_id);
            
            include 'utilisateur_detail.php';
        } else {
            header('Location: /gestion/utilisateurs');
            exit;
        }
        break;
        
    case 'messages':
        // Liste des messages
        $messages = Message::getAll();
        include 'messages.php';
        break;
        
    case 'message':
        // Détail d'un message
        if (isset($_GET['id'])) {
            $message_id = (int)$_GET['id'];
            $message = Message::getById($message_id);
            
            if (!$message) {
                http_response_code(404);
                echo "Message non trouvé";
                exit;
            }
            
            // Marquer le message comme lu
            Message::markAsRead($message_id);
            
            include 'message_detail.php';
        } else {
            header('Location: /gestion/messages');
            exit;
        }
        break;
        
    case 'message-repondre':
        // Répondre à un message
        if (isset($_GET['id'])) {
            $message_id = (int)$_GET['id'];
            $message = Message::getById($message_id);
            
            if (!$message) {
                http_response_code(404);
                echo "Message non trouvé";
                exit;
            }
            
            // Traitement du formulaire de réponse
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reponse'])) {
                $reponse = trim($_POST['reponse']);
                if (!empty($reponse)) {
                    if (Message::reply($message_id, $reponse)) {
                        header('Location: /gestion/message?id=' . $message_id);
                        exit;
                    } else {
                        $error = "Erreur lors de l'envoi de la réponse";
                    }
                } else {
                    $error = "La réponse ne peut pas être vide";
                }
            }
            
            include 'message_repondre.php';
        } else {
            header('Location: /gestion/messages');
            exit;
        }
        break;
        
    case 'commentaires':
        // Liste des commentaires
        $commentaires = Comment::getAll();
        include 'commentaires.php';
        break;
        
    case 'commentaire-approuver':
        // Approuver un commentaire
        if (isset($_GET['id'])) {
            $comment_id = (int)$_GET['id'];
            if (Comment::approve($comment_id)) {
                header('Location: /gestion/commentaires?success=approved');
            } else {
                header('Location: /gestion/commentaires?error=approve_failed');
            }
        } else {
            header('Location: /gestion/commentaires');
        }
        exit;
        break;
        
    case 'commentaire-rejeter':
        // Rejeter un commentaire
        if (isset($_GET['id'])) {
            $comment_id = (int)$_GET['id'];
            if (Comment::reject($comment_id)) {
                header('Location: /gestion/commentaires?success=rejected');
            } else {
                header('Location: /gestion/commentaires?error=reject_failed');
            }
        } else {
            header('Location: /gestion/commentaires');
        }
        exit;
        break;
        
    default:
        // Page non trouvée
        http_response_code(404);
        echo "Page d'administration non trouvée";
        exit;
} 