<?php
// Script de migration pour corriger l'encodage UTF-8
require_once('conf/config.php');
require_once('model/Message.php');
require_once('model/Comment.php');
require_once('model/User.php');

echo "<h2>Migration de l'encodage UTF-8</h2>";
echo "<p>Correction des entités HTML dans la base de données...</p>";

echo "<h3>Correction des messages :</h3>";
$messages_corriges = Message::fixEncoding();
echo "✅ {$messages_corriges} messages corrigés<br>";

echo "<h3>Correction des commentaires :</h3>";
$commentaires_corriges = Comment::fixEncoding();
echo "✅ {$commentaires_corriges} commentaires corrigés<br>";

echo "<h3>Correction des utilisateurs :</h3>";
// Corriger les noms et prénoms des utilisateurs
$db = getDB();
$stmt = $db->query("SELECT id, nom, prenom, telephone FROM utilisateurs");
$utilisateurs = $stmt->fetchAll();

$utilisateurs_corriges = 0;
foreach ($utilisateurs as $utilisateur) {
    $nom_decode = html_entity_decode($utilisateur['nom'], ENT_QUOTES, 'UTF-8');
    $prenom_decode = html_entity_decode($utilisateur['prenom'], ENT_QUOTES, 'UTF-8');
    $telephone_decode = $utilisateur['telephone'] ? html_entity_decode($utilisateur['telephone'], ENT_QUOTES, 'UTF-8') : null;
    
    if ($nom_decode !== $utilisateur['nom'] || 
        $prenom_decode !== $utilisateur['prenom'] ||
        ($utilisateur['telephone'] && $telephone_decode !== $utilisateur['telephone'])) {
        
        $update_stmt = $db->prepare("UPDATE utilisateurs SET nom = ?, prenom = ?, telephone = ? WHERE id = ?");
        $update_stmt->execute([$nom_decode, $prenom_decode, $telephone_decode, $utilisateur['id']]);
        $utilisateurs_corriges++;
    }
}
echo "✅ {$utilisateurs_corriges} utilisateurs corrigés<br>";

echo "<hr>";
echo "<h3>Résumé de la migration :</h3>";
echo "<ul>";
echo "<li><strong>Messages :</strong> {$messages_corriges}</li>";
echo "<li><strong>Commentaires :</strong> {$commentaires_corriges}</li>";
echo "<li><strong>Utilisateurs :</strong> {$utilisateurs_corriges}</li>";
echo "</ul>";

$total = $messages_corriges + $commentaires_corriges + $utilisateurs_corriges;
echo "<p><strong>Total :</strong> {$total} enregistrements corrigés</p>";

if ($total > 0) {
    echo "<p style='color: green; font-weight: bold;'>✅ Migration réussie ! Les apostrophes et caractères spéciaux s'afficheront correctement maintenant.</p>";
} else {
    echo "<p style='color: blue; font-weight: bold;'>ℹ️ Aucune correction nécessaire - toutes les données sont déjà correctement encodées.</p>";
}

echo "<hr>";
echo "<p><em>Note : Ce script peut être supprimé après exécution.</em></p>";
echo "<p><a href='/'>Retour à l'accueil</a> | <a href='/gestion'>Administration</a></p>";
?> 