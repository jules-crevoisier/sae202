<?php
require_once('conf/config.php');
require_once('model/Comment.php');

function index() {
    // Vérifier si l'utilisateur est connecté
    if (!isLoggedIn()) {
        redirect('/auth/connexion');
    }
    
    $erreurs = [];
    $succes = false;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $contenu = securise($_POST['contenu'] ?? '');
        
        // Validations
        if (empty($contenu)) $erreurs[] = "Le commentaire est requis";
        if (strlen($contenu) < 10) $erreurs[] = "Le commentaire doit contenir au moins 10 caractères";
        if (strlen($contenu) > 1000) $erreurs[] = "Le commentaire ne peut pas dépasser 1000 caractères";
        
        if (empty($erreurs)) {
            if (Comment::add($_SESSION['user_id'], $contenu)) {
                $succes = true;
            } else {
                $erreurs[] = "Erreur lors de l'ajout du commentaire";
            }
        }
    }
    
    // Récupérer les commentaires de l'utilisateur
    $mes_commentaires = Comment::getByUser($_SESSION['user_id']);
    
    require_once('view/commentaire.php');
}
?> 