<?php
// Script de test pour l'authentification
echo "<h2>Test d'authentification - Dossier Gestion</h2>";

echo "<h3>Informations sur l'authentification :</h3>";
echo "<ul>";
echo "<li><strong>PHP_AUTH_USER:</strong> " . ($_SERVER['PHP_AUTH_USER'] ?? 'Non défini') . "</li>";
echo "<li><strong>REMOTE_USER:</strong> " . ($_SERVER['REMOTE_USER'] ?? 'Non défini') . "</li>";
echo "<li><strong>HTTP_AUTHORIZATION:</strong> " . ($_SERVER['HTTP_AUTHORIZATION'] ?? 'Non défini') . "</li>";
echo "</ul>";

echo "<h3>Variables d'environnement Apache :</h3>";
echo "<ul>";
foreach ($_SERVER as $key => $value) {
    if (strpos($key, 'AUTH') !== false || strpos($key, 'REMOTE') !== false) {
        echo "<li><strong>$key:</strong> " . htmlspecialchars($value) . "</li>";
    }
}
echo "</ul>";

echo "<h3>Informations sur le serveur :</h3>";
echo "<ul>";
echo "<li><strong>SERVER_SOFTWARE:</strong> " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Non défini') . "</li>";
echo "<li><strong>DOCUMENT_ROOT:</strong> " . ($_SERVER['DOCUMENT_ROOT'] ?? 'Non défini') . "</li>";
echo "<li><strong>REQUEST_URI:</strong> " . ($_SERVER['REQUEST_URI'] ?? 'Non défini') . "</li>";
echo "</ul>";

if (isset($_SERVER['PHP_AUTH_USER'])) {
    echo "<div style='color: green; font-weight: bold;'>✅ Authentification Apache fonctionne !</div>";
    echo "<p>Utilisateur connecté : " . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . "</p>";
} else {
    echo "<div style='color: red; font-weight: bold;'>❌ Authentification Apache ne fonctionne pas</div>";
    echo "<p>Aucune authentification détectée.</p>";
}

echo "<hr>";
echo "<p><a href='index.php'>Retour à l'administration</a></p>";
?> 