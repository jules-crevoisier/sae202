<?php
require_once(__DIR__ . '/../conf/config.php');

class Comment {
    
    // Ajouter un nouveau commentaire
    public static function add($utilisateur_id, $contenu) {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO commentaires (utilisateur_id, contenu) VALUES (?, ?)");
        return $stmt->execute([$utilisateur_id, $contenu]);
    }
    
    // Récupérer tous les commentaires approuvés pour l'affichage public
    public static function getApproved() {
        $db = getDB();
        $stmt = $db->query("
            SELECT c.*, u.nom, u.prenom, u.email 
            FROM commentaires c 
            JOIN utilisateurs u ON c.utilisateur_id = u.id 
            WHERE c.approuve = 1 
            ORDER BY c.date_creation DESC
        ");
        return $stmt->fetchAll();
    }
    
    // Récupérer tous les commentaires en attente (pour l'admin)
    public static function getPending() {
        $db = getDB();
        $stmt = $db->query("
            SELECT c.*, u.nom, u.prenom, u.email 
            FROM commentaires c 
            JOIN utilisateurs u ON c.utilisateur_id = u.id 
            WHERE c.approuve = 0 
            ORDER BY c.date_creation DESC
        ");
        return $stmt->fetchAll();
    }
    
    // Récupérer tous les commentaires (pour l'admin)
    public static function getAll() {
        $db = getDB();
        $stmt = $db->query("
            SELECT c.*, u.nom, u.prenom, u.email 
            FROM commentaires c 
            JOIN utilisateurs u ON c.utilisateur_id = u.id 
            ORDER BY c.date_creation DESC
        ");
        return $stmt->fetchAll();
    }
    
    // Approuver un commentaire
    public static function approve($id) {
        $db = getDB();
        $stmt = $db->prepare("UPDATE commentaires SET approuve = 1, date_approbation = NOW() WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    // Rejeter un commentaire
    public static function reject($id) {
        $db = getDB();
        $stmt = $db->prepare("DELETE FROM commentaires WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    // Récupérer un commentaire par son ID
    public static function getById($id) {
        $db = getDB();
        $stmt = $db->prepare("
            SELECT c.*, u.nom, u.prenom, u.email 
            FROM commentaires c 
            JOIN utilisateurs u ON c.utilisateur_id = u.id 
            WHERE c.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    // Récupérer les commentaires d'un utilisateur
    public static function getByUser($utilisateur_id) {
        $db = getDB();
        $stmt = $db->prepare("
            SELECT * FROM commentaires 
            WHERE utilisateur_id = ? 
            ORDER BY date_creation DESC
        ");
        $stmt->execute([$utilisateur_id]);
        return $stmt->fetchAll();
    }
    
    // Corriger l'encodage des commentaires existants (migration)
    public static function fixEncoding() {
        $db = getDB();
        
        // Récupérer tous les commentaires
        $stmt = $db->query("SELECT id, contenu FROM commentaires");
        $commentaires = $stmt->fetchAll();
        
        $count = 0;
        foreach ($commentaires as $commentaire) {
            $contenu_decode = html_entity_decode($commentaire['contenu'], ENT_QUOTES, 'UTF-8');
            
            // Mettre à jour seulement si c'est différent
            if ($contenu_decode !== $commentaire['contenu']) {
                $update_stmt = $db->prepare("UPDATE commentaires SET contenu = ? WHERE id = ?");
                $update_stmt->execute([$contenu_decode, $commentaire['id']]);
                $count++;
            }
        }
        
        return $count;
    }
}
?> 