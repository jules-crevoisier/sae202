<?php
/**
 * Routeur pour les pages d'administration
 * Toutes les pages de ce dossier sont protégées par Apache Basic Auth
 */

// Démarrage de la session
session_start();

// Inclusion des fichiers de configuration et modèles
require_once('../conf/conf.php');
require_once('../model/lib/database.php');
require_once('../model/lib/user.php');
require_once('../model/lib/message.php');
require_once('../model/lib/commentaire.php');

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

// Suppression du préfixe /admin
$path = str_replace('/admin', '', $path);
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
            'total_utilisateurs' => getTotalUsers(),
            'total_messages' => getTotalMessages(),
            'total_commentaires' => getTotalComments(),
            'messages_non_lus' => getUnreadMessagesCount(),
            'commentaires_en_attente' => getPendingCommentsCount()
        ];
        
        $recent_messages = getRecentMessages(5);
        $recent_comments = getRecentComments(5);
        $recent_users = getRecentUsers(5);
        
        include 'dashboard.php';
        break;
        
    case 'utilisateurs':
        // Liste des utilisateurs
        $utilisateurs = getAllUsers();
        include 'utilisateurs.php';
        break;
        
    case 'utilisateur':
        // Détail d'un utilisateur
        if (isset($_GET['id'])) {
            $user_id = (int)$_GET['id'];
            $utilisateur = getUserById($user_id);
            
            if (!$utilisateur) {
                http_response_code(404);
                echo "Utilisateur non trouvé";
                exit;
            }
            
            $commentaires_utilisateur = getCommentsByUserId($user_id);
            $messages_utilisateur = getMessagesByUserId($user_id);
            
            include 'utilisateur_detail.php';
        } else {
            header('Location: /admin/utilisateurs');
            exit;
        }
        break;
        
    case 'messages':
        // Liste des messages
        $messages = getAllMessages();
        include 'messages.php';
        break;
        
    case 'message':
        // Détail d'un message
        if (isset($_GET['id'])) {
            $message_id = (int)$_GET['id'];
            $message = getMessageById($message_id);
            
            if (!$message) {
                http_response_code(404);
                echo "Message non trouvé";
                exit;
            }
            
            // Marquer le message comme lu
            markMessageAsRead($message_id);
            
            include 'message_detail.php';
        } else {
            header('Location: /admin/messages');
            exit;
        }
        break;
        
    case 'message-repondre':
        // Répondre à un message
        if (isset($_GET['id'])) {
            $message_id = (int)$_GET['id'];
            $message = getMessageById($message_id);
            
            if (!$message) {
                http_response_code(404);
                echo "Message non trouvé";
                exit;
            }
            
            // Traitement du formulaire de réponse
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reponse'])) {
                $reponse = trim($_POST['reponse']);
                if (!empty($reponse)) {
                    if (replyToMessage($message_id, $reponse)) {
                        header('Location: /admin/message?id=' . $message_id);
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
            header('Location: /admin/messages');
            exit;
        }
        break;
        
    case 'commentaires':
        // Liste des commentaires
        $commentaires = getAllComments();
        include 'commentaires.php';
        break;
        
    case 'commentaire-approuver':
        // Approuver un commentaire
        if (isset($_GET['id'])) {
            $comment_id = (int)$_GET['id'];
            if (approveComment($comment_id)) {
                header('Location: /admin/commentaires?success=approved');
            } else {
                header('Location: /admin/commentaires?error=approve_failed');
            }
        } else {
            header('Location: /admin/commentaires');
        }
        exit;
        break;
        
    case 'commentaire-rejeter':
        // Rejeter un commentaire
        if (isset($_GET['id'])) {
            $comment_id = (int)$_GET['id'];
            if (rejectComment($comment_id)) {
                header('Location: /admin/commentaires?success=rejected');
            } else {
                header('Location: /admin/commentaires?error=reject_failed');
            }
        } else {
            header('Location: /admin/commentaires');
        }
        exit;
        break;
        
    default:
        // Page non trouvée
        http_response_code(404);
        echo "Page d'administration non trouvée";
        exit;
} 