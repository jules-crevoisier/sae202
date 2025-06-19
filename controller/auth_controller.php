<?php
require_once('conf/config.php');
require_once('model/User.php');

function index() {
    // Redirection vers la page de connexion
    connexion();
}

function inscription() {
    $erreurs = [];
    $succes = false;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = securise($_POST['nom'] ?? '');
        $prenom = securise($_POST['prenom'] ?? '');
        $email = securise($_POST['email'] ?? '');
        $mot_de_passe = $_POST['mot_de_passe'] ?? '';
        $mot_de_passe_confirm = $_POST['mot_de_passe_confirm'] ?? '';
        $telephone = securise($_POST['telephone'] ?? '');
        $age = intval($_POST['age'] ?? 0);
        
        // Validations
        if (empty($nom)) $erreurs[] = "Le nom est requis";
        if (empty($prenom)) $erreurs[] = "Le prénom est requis";
        if (empty($email)) $erreurs[] = "L'email est requis";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $erreurs[] = "L'email n'est pas valide";
        if (empty($mot_de_passe)) $erreurs[] = "Le mot de passe est requis";
        if (strlen($mot_de_passe) < 6) $erreurs[] = "Le mot de passe doit contenir au moins 6 caractères";
        if ($mot_de_passe !== $mot_de_passe_confirm) $erreurs[] = "Les mots de passe ne correspondent pas";
        if ($age < 16 || $age > 120) $erreurs[] = "L'âge doit être compris entre 16 et 120 ans";
        
        if (empty($erreurs)) {
            if (User::register($nom, $prenom, $email, $mot_de_passe, $telephone, $age)) {
                $succes = true;
            } else {
                $erreurs[] = "Cette adresse email est déjà utilisée";
            }
        }
    }
    
    require_once('view/inscription.php');
}

function connexion() {
    $erreurs = [];
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = securise($_POST['email'] ?? '');
        $mot_de_passe = $_POST['mot_de_passe'] ?? '';
        
        if (empty($email)) $erreurs[] = "L'email est requis";
        if (empty($mot_de_passe)) $erreurs[] = "Le mot de passe est requis";
        
        if (empty($erreurs)) {
            if (User::login($email, $mot_de_passe)) {
                redirect('/');
            } else {
                $erreurs[] = "Email ou mot de passe incorrect";
            }
        }
    }
    
    require_once('view/connexion.php');
}

function deconnexion() {
    User::logout();
    redirect('/');
}
?> 