<?php
require_once(__DIR__ . '/../conf/config.php');

class User {
    
    // Inscription d'un nouvel utilisateur
    public static function register($nom, $prenom, $email, $mot_de_passe, $telephone = null, $age = null) {
        $db = getDB();
        
        // Vérifier si l'email existe déjà
        $stmt = $db->prepare("SELECT id FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return false; // Email déjà utilisé
        }
        
        // Hacher le mot de passe
        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        
        // Insérer le nouvel utilisateur
        $stmt = $db->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, telephone, age) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$nom, $prenom, $email, $mot_de_passe_hash, $telephone, $age]);
    }
    
    // Connexion d'un utilisateur
    public static function login($email, $mot_de_passe) {
        $db = getDB();
        
        $stmt = $db->prepare("SELECT id, nom, prenom, email, mot_de_passe, is_admin FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['is_admin'] ? 'admin' : 'user';
            $_SESSION['is_admin'] = $user['is_admin'];
            return true;
        }
        
        return false;
    }
    
    // Déconnexion
    public static function logout() {
        session_destroy();
    }
    
    // Récupérer les informations d'un utilisateur
    public static function getById($id) {
        $db = getDB();
        $stmt = $db->prepare("SELECT id, nom, prenom, email, telephone, age, date_inscription FROM utilisateurs WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    // Mettre à jour le profil d'un utilisateur
    public static function updateProfile($id, $nom, $prenom, $telephone, $age) {
        $db = getDB();
        $stmt = $db->prepare("UPDATE utilisateurs SET nom = ?, prenom = ?, telephone = ?, age = ? WHERE id = ?");
        return $stmt->execute([$nom, $prenom, $telephone, $age, $id]);
    }
    
    // Récupérer tous les utilisateurs (pour l'admin)
    public static function getAll() {
        $db = getDB();
        $stmt = $db->query("SELECT id, nom, prenom, email, telephone, age, date_inscription, is_admin FROM utilisateurs WHERE is_admin = 0 ORDER BY date_inscription DESC");
        return $stmt->fetchAll();
    }
    
    // Changer le mot de passe
    public static function changePassword($id, $ancien_mot_de_passe, $nouveau_mot_de_passe) {
        $db = getDB();
        
        // Vérifier l'ancien mot de passe
        $stmt = $db->prepare("SELECT mot_de_passe FROM utilisateurs WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($ancien_mot_de_passe, $user['mot_de_passe'])) {
            $nouveau_hash = password_hash($nouveau_mot_de_passe, PASSWORD_DEFAULT);
            $stmt = $db->prepare("UPDATE utilisateurs SET mot_de_passe = ? WHERE id = ?");
            return $stmt->execute([$nouveau_hash, $id]);
        }
        
        return false;
    }
}
?> 