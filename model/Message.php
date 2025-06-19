<?php
require_once(__DIR__ . '/../conf/config.php');

class Message {
    
    // Envoyer un nouveau message
    public static function send($utilisateur_id, $sujet, $contenu) {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO messages (utilisateur_id, sujet, contenu) VALUES (?, ?, ?)");
        return $stmt->execute([$utilisateur_id, $sujet, $contenu]);
    }
    
    // Récupérer tous les messages (pour l'admin)
    public static function getAll() {
        $db = getDB();
        $stmt = $db->query("
            SELECT m.*, u.nom, u.prenom, u.email 
            FROM messages m 
            JOIN utilisateurs u ON m.utilisateur_id = u.id 
            ORDER BY m.date_creation DESC
        ");
        return $stmt->fetchAll();
    }
    
    // Récupérer les messages non lus (pour l'admin)
    public static function getUnread() {
        $db = getDB();
        $stmt = $db->query("
            SELECT m.*, u.nom, u.prenom, u.email 
            FROM messages m 
            JOIN utilisateurs u ON m.utilisateur_id = u.id 
            WHERE m.lu = 0 
            ORDER BY m.date_creation DESC
        ");
        return $stmt->fetchAll();
    }
    
    // Récupérer les messages d'un utilisateur
    public static function getByUser($utilisateur_id) {
        $db = getDB();
        $stmt = $db->prepare("
            SELECT * FROM messages 
            WHERE utilisateur_id = ? 
            ORDER BY date_creation DESC
        ");
        $stmt->execute([$utilisateur_id]);
        return $stmt->fetchAll();
    }
    
    // Récupérer un message par son ID
    public static function getById($id) {
        $db = getDB();
        $stmt = $db->prepare("
            SELECT m.*, u.nom, u.prenom, u.email 
            FROM messages m 
            JOIN utilisateurs u ON m.utilisateur_id = u.id 
            WHERE m.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    // Marquer un message comme lu
    public static function markAsRead($id) {
        $db = getDB();
        $stmt = $db->prepare("UPDATE messages SET lu = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    // Répondre à un message
    public static function reply($id, $reponse) {
        $db = getDB();
        $stmt = $db->prepare("UPDATE messages SET reponse = ?, date_reponse = NOW(), lu = 1 WHERE id = ?");
        return $stmt->execute([$reponse, $id]);
    }
    
    // Supprimer un message
    public static function delete($id) {
        $db = getDB();
        $stmt = $db->prepare("DELETE FROM messages WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    // Compter les messages non lus
    public static function countUnread() {
        $db = getDB();
        $stmt = $db->query("SELECT COUNT(*) as count FROM messages WHERE lu = 0");
        $result = $stmt->fetch();
        return $result['count'];
    }
    
    // Corriger l'encodage des messages existants (migration)
    public static function fixEncoding() {
        $db = getDB();
        
        // Récupérer tous les messages
        $stmt = $db->query("SELECT id, sujet, contenu, reponse FROM messages");
        $messages = $stmt->fetchAll();
        
        $count = 0;
        foreach ($messages as $message) {
            $sujet_decode = html_entity_decode($message['sujet'], ENT_QUOTES, 'UTF-8');
            $contenu_decode = html_entity_decode($message['contenu'], ENT_QUOTES, 'UTF-8');
            $reponse_decode = $message['reponse'] ? html_entity_decode($message['reponse'], ENT_QUOTES, 'UTF-8') : null;
            
            // Mettre à jour seulement si c'est différent (éviter les mises à jour inutiles)
            if ($sujet_decode !== $message['sujet'] || 
                $contenu_decode !== $message['contenu'] || 
                ($message['reponse'] && $reponse_decode !== $message['reponse'])) {
                
                $update_stmt = $db->prepare("UPDATE messages SET sujet = ?, contenu = ?, reponse = ? WHERE id = ?");
                $update_stmt->execute([$sujet_decode, $contenu_decode, $reponse_decode, $message['id']]);
                $count++;
            }
        }
        
        return $count;
    }
}
?> 