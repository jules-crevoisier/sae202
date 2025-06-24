<?php
// Fichier de debug pour identifier l'erreur 500
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>Debug Administration</h1>";

echo "<h2>1. Test des chemins</h2>";
echo "Répertoire courant : " . __DIR__ . "<br>";
echo "Fichier config.php existe : " . (file_exists('../conf/config.php') ? 'OUI' : 'NON') . "<br>";
echo "Fichier User.php existe : " . (file_exists('../model/User.php') ? 'OUI' : 'NON') . "<br>";
echo "Fichier Message.php existe : " . (file_exists('../model/Message.php') ? 'OUI' : 'NON') . "<br>";
echo "Fichier Comment.php existe : " . (file_exists('../model/Comment.php') ? 'OUI' : 'NON') . "<br>";

echo "<h2>2. Test d'inclusion config.php</h2>";
try {
    require_once('../conf/config.php');
    echo "✅ Config.php inclus avec succès<br>";
    
    echo "Fonction isLoggedIn() existe : " . (function_exists('isLoggedIn') ? 'OUI' : 'NON') . "<br>";
    echo "Fonction isAdmin() existe : " . (function_exists('isAdmin') ? 'OUI' : 'NON') . "<br>";
    
} catch (Exception $e) {
    echo "❌ Erreur config.php : " . $e->getMessage() . "<br>";
}

echo "<h2>3. Test d'inclusion des modèles</h2>";
try {
    require_once('../model/User.php');
    echo "✅ User.php inclus avec succès<br>";
} catch (Exception $e) {
    echo "❌ Erreur User.php : " . $e->getMessage() . "<br>";
}

try {
    require_once('../model/Message.php');
    echo "✅ Message.php inclus avec succès<br>";
} catch (Exception $e) {
    echo "❌ Erreur Message.php : " . $e->getMessage() . "<br>";
}

try {
    require_once('../model/Comment.php');
    echo "✅ Comment.php inclus avec succès<br>";
} catch (Exception $e) {
    echo "❌ Erreur Comment.php : " . $e->getMessage() . "<br>";
}

echo "<h2>4. Test de connexion base de données</h2>";
try {
    $db = getDB();
    echo "✅ Connexion DB réussie<br>";
    
    // Test simple
    $stmt = $db->query("SELECT 1");
    echo "✅ Requête test réussie<br>";
    
} catch (Exception $e) {
    echo "❌ Erreur DB : " . $e->getMessage() . "<br>";
}

echo "<h2>5. Variables de session</h2>";
echo "Session démarrée : " . (session_status() == PHP_SESSION_ACTIVE ? 'OUI' : 'NON') . "<br>";
echo "user_id : " . ($_SESSION['user_id'] ?? 'non défini') . "<br>";
echo "is_admin : " . ($_SESSION['is_admin'] ?? 'non défini') . "<br>";

echo "<h2>6. Test des classes</h2>";
try {
    $users = User::getAll();
    echo "✅ User::getAll() fonctionne - " . count($users) . " utilisateurs<br>";
} catch (Exception $e) {
    echo "❌ Erreur User::getAll() : " . $e->getMessage() . "<br>";
}

echo "<hr>";
echo "<p><a href='index.php'>Tester index.php</a></p>";
echo "<p><a href='../'>Retour au site</a></p>";
?> 
