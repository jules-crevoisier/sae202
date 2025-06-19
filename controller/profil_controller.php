<?php
require_once('conf/config.php');
require_once('model/User.php');

function index() {
    // Vérifier si l'utilisateur est connecté
    if (!isLoggedIn()) {
        redirect('/auth/connexion');
    }
    
    $erreurs = [];
    $succes = false;
    
    // Récupérer les informations de l'utilisateur
    $user = User::getById($_SESSION['user_id']);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = nettoyer($_POST['nom'] ?? '');
        $prenom = nettoyer($_POST['prenom'] ?? '');
        $telephone = nettoyer($_POST['telephone'] ?? '');
        $age = intval($_POST['age'] ?? 0);
        
        // Validations
        if (empty($nom)) $erreurs[] = "Le nom est requis";
        if (empty($prenom)) $erreurs[] = "Le prénom est requis";
        if ($age < 12 || $age > 120) $erreurs[] = "L'âge doit être compris entre 12 et 120 ans";
        
        if (empty($erreurs)) {
            if (User::updateProfile($_SESSION['user_id'], $nom, $prenom, $telephone, $age)) {
                $_SESSION['user_nom'] = $nom;
                $_SESSION['user_prenom'] = $prenom;
                $user = User::getById($_SESSION['user_id']); // Recharger les données
                $succes = true;
            } else {
                $erreurs[] = "Erreur lors de la mise à jour du profil";
            }
        }
    }
    
    require_once('view/profil.php');
}

function mot_de_passe() {
    // Vérifier si l'utilisateur est connecté
    if (!isLoggedIn()) {
        redirect('/auth/connexion');
    }
    
    $erreurs = [];
    $succes = false;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ancien_mot_de_passe = $_POST['ancien_mot_de_passe'] ?? '';
        $nouveau_mot_de_passe = $_POST['nouveau_mot_de_passe'] ?? '';
        $nouveau_mot_de_passe_confirm = $_POST['nouveau_mot_de_passe_confirm'] ?? '';
        
        // Validations
        if (empty($ancien_mot_de_passe)) $erreurs[] = "L'ancien mot de passe est requis";
        if (empty($nouveau_mot_de_passe)) $erreurs[] = "Le nouveau mot de passe est requis";
        if (strlen($nouveau_mot_de_passe) < 6) $erreurs[] = "Le nouveau mot de passe doit contenir au moins 6 caractères";
        if ($nouveau_mot_de_passe !== $nouveau_mot_de_passe_confirm) $erreurs[] = "Les nouveaux mots de passe ne correspondent pas";
        
        if (empty($erreurs)) {
            if (User::changePassword($_SESSION['user_id'], $ancien_mot_de_passe, $nouveau_mot_de_passe)) {
                $succes = true;
            } else {
                $erreurs[] = "L'ancien mot de passe est incorrect";
            }
        }
    }
    
    require_once('view/profil_mot_de_passe.php');
}
?> 