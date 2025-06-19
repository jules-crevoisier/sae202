<?php
// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'sae202');
define('DB_USER', 'sae202_user'); // Utilisateur dédié créé dans database.sql
define('DB_PASS', 'sae202_password_2024'); // Mot de passe de l'utilisateur dédié

// Configuration générale du site
define('SITE_NAME', 'Murder Party - Événement Mystère');
define('SITE_URL', 'https://MMI.sae202.ovh');
define('ADMIN_URL', 'https://MMI.sae202.ovh/gestion');

// Paramètres de sécurité
define('UPLOAD_MAX_SIZE', 204800); // 200Ko en octets
define('VIDEO_MAX_SIZE', 4194304); // 4Mo en octets

// Configuration des sessions
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 0); // Mettre à 1 en HTTPS
session_start();

// Fonction de connexion à la base de données
function getDB() {
    static $db = null;
    if ($db === null) {
        try {
            $db = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
                ]
            );
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }
    return $db;
}

// Fonction de nettoyage des données (pour stockage en base)
function nettoyer($data) {
    return trim($data);
}

// Fonction de sécurisation des données (pour affichage HTML)
function securise($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Fonction pour décoder les entités HTML (pour les données déjà stockées)
function decoder($data) {
    return html_entity_decode(trim($data), ENT_QUOTES, 'UTF-8');
}

// Fonction de redirection
function redirect($url) {
    header('Location: ' . $url);
    exit();
}

// Fonction de vérification de connexion
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Fonction de vérification d'admin
function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}
?> 