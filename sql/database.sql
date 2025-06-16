-- ================================================================
-- Script de création de la base de données Murder Party (SAE202)
-- ================================================================

-- Suppression et création de la base de données
DROP DATABASE IF EXISTS sae202;
CREATE DATABASE sae202 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Utilisation de la base de données
USE sae202;

-- ================================================================
-- CRÉATION DE L'UTILISATEUR DÉDIÉ
-- ================================================================

-- Suppression de l'utilisateur s'il existe déjà
DROP USER IF EXISTS 'sae202_user'@'localhost';

-- Création de l'utilisateur dédié
CREATE USER 'sae202_user'@'localhost' IDENTIFIED BY 'sae202_password_2024';

-- Attribution des privilèges sur la base sae202
GRANT SELECT, INSERT, UPDATE, DELETE ON sae202.* TO 'sae202_user'@'localhost';

-- Application des privilèges
FLUSH PRIVILEGES;

-- ================================================================
-- CRÉATION DES TABLES
-- ================================================================

-- Table des utilisateurs
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    telephone VARCHAR(20) NULL,
    age INT NULL,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_admin TINYINT(1) DEFAULT 0,
    INDEX idx_email (email),
    INDEX idx_is_admin (is_admin)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des commentaires
CREATE TABLE commentaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL,
    contenu TEXT NOT NULL,
    approuve TINYINT(1) DEFAULT 0,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_approbation TIMESTAMP NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    INDEX idx_approuve (approuve),
    INDEX idx_date_creation (date_creation),
    INDEX idx_utilisateur_id (utilisateur_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des messages (messagerie interne)
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL,
    sujet VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL,
    lu TINYINT(1) DEFAULT 0,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    reponse TEXT NULL,
    date_reponse TIMESTAMP NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    INDEX idx_lu (lu),
    INDEX idx_date_creation (date_creation),
    INDEX idx_utilisateur_id (utilisateur_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des réservations (optionnel pour extension future)
CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL,
    date_evenement DATE NOT NULL,
    nombre_participants INT DEFAULT 1,
    statut ENUM('en_attente', 'confirmee', 'annulee') DEFAULT 'en_attente',
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    notes TEXT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    INDEX idx_date_evenement (date_evenement),
    INDEX idx_statut (statut),
    INDEX idx_utilisateur_id (utilisateur_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ================================================================
-- INSERTION DES DONNÉES DE TEST
-- ================================================================

-- Insertion de l'administrateur par défaut
INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, telephone, age, is_admin, date_inscription) 
VALUES (
    'Admin', 
    'Murder Party', 
    'admin@sae202.local', 
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
    '03 25 42 42 42',
    35,
    1, 
    NOW()
);

-- Insertion d'utilisateurs de test
INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, telephone, age, is_admin, date_inscription) VALUES
('Dupont', 'Jean', 'jean.dupont@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '06 12 34 56 78', 28, 0, DATE_SUB(NOW(), INTERVAL 10 DAY)),
('Martin', 'Sophie', 'sophie.martin@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '06 87 65 43 21', 32, 0, DATE_SUB(NOW(), INTERVAL 8 DAY)),
('Durand', 'Pierre', 'pierre.durand@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '06 11 22 33 44', 25, 0, DATE_SUB(NOW(), INTERVAL 5 DAY)),
('Leroux', 'Marie', 'marie.leroux@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '06 55 44 33 22', 29, 0, DATE_SUB(NOW(), INTERVAL 3 DAY));

-- Insertion de commentaires d'exemple (déjà approuvés)
INSERT INTO commentaires (utilisateur_id, contenu, approuve, date_creation, date_approbation) VALUES
(1, 'Événement absolument passionnant ! J\'ai hâte de participer à cette murder party. L\'ambiance mystérieuse promet une soirée inoubliable.', 1, DATE_SUB(NOW(), INTERVAL 1 DAY), NOW()),
(2, 'L\'ambiance mystérieuse me plaît beaucoup, concept très original. Je recommande vivement cette expérience unique !', 1, DATE_SUB(NOW(), INTERVAL 2 DAY), DATE_SUB(NOW(), INTERVAL 1 DAY)),
(3, 'Parfait pour une soirée entre amis, nous serons au rendez-vous ! Merci pour cette initiative créative.', 1, DATE_SUB(NOW(), INTERVAL 5 DAY), DATE_SUB(NOW(), INTERVAL 4 DAY)),
(4, 'Une expérience immersive fantastique ! Les organisateurs ont pensé à tous les détails.', 1, DATE_SUB(NOW(), INTERVAL 3 DAY), DATE_SUB(NOW(), INTERVAL 2 DAY));

-- Insertion de commentaires en attente de modération
INSERT INTO commentaires (utilisateur_id, contenu, approuve, date_creation) VALUES
(2, 'J\'ai quelques questions sur le déroulement de la soirée, mais j\'ai hâte d\'y participer !', 0, DATE_SUB(NOW(), INTERVAL 1 HOUR)),
(3, 'Est-ce que les costumes sont vraiment obligatoires ? En tout cas, le concept m\'intéresse beaucoup.', 0, DATE_SUB(NOW(), INTERVAL 3 HOUR));

-- Insertion de messages de test
INSERT INTO messages (utilisateur_id, sujet, contenu, lu, date_creation) VALUES
(2, 'Question sur les costumes', 'Bonjour, j\'aimerais savoir si les costumes d\'époque sont vraiment obligatoires ou simplement recommandés ? Merci !', 0, DATE_SUB(NOW(), INTERVAL 2 HOUR)),
(3, 'Allergies alimentaires', 'Bonsoir, je suis allergique aux fruits à coque. Pouvez-vous adapter le menu en conséquence ? Cordialement.', 1, DATE_SUB(NOW(), INTERVAL 1 DAY)),
(4, 'Transport depuis la gare', 'Bonjour, confirmez-vous qu\'il y aura bien une navette gratuite depuis la gare de Troyes ? À quelle heure exactement ?', 0, DATE_SUB(NOW(), INTERVAL 6 HOUR));

-- Message avec réponse
INSERT INTO messages (utilisateur_id, sujet, contenu, lu, date_creation, reponse, date_reponse) VALUES
(4, 'Confirmation de participation', 'Bonjour, je confirme ma participation pour la Murder Party du 29 juin. Merci !', 1, DATE_SUB(NOW(), INTERVAL 2 DAY), 'Parfait ! Votre participation est bien confirmée. Vous recevrez votre fiche personnage par email 48h avant l\'événement.', DATE_SUB(NOW(), INTERVAL 1 DAY));

-- Insertion de réservations de test
INSERT INTO reservations (utilisateur_id, date_evenement, nombre_participants, statut, date_reservation, notes) VALUES
(2, '2024-06-29', 1, 'confirmee', DATE_SUB(NOW(), INTERVAL 8 DAY), 'Végétarien'),
(3, '2024-06-29', 2, 'confirmee', DATE_SUB(NOW(), INTERVAL 5 DAY), 'Allergique aux fruits à coque'),
(4, '2024-06-29', 1, 'en_attente', DATE_SUB(NOW(), INTERVAL 3 DAY), NULL);

-- ================================================================
-- AFFICHAGE DES INFORMATIONS DE CONNEXION
-- ================================================================

SELECT '===================================================' AS '';
SELECT 'BASE DE DONNÉES CRÉÉE AVEC SUCCÈS !' AS '';
SELECT '===================================================' AS '';
SELECT '' AS '';
SELECT 'Informations de connexion :' AS '';
SELECT 'Base de données : sae202' AS '';
SELECT 'Utilisateur : sae202_user' AS '';
SELECT 'Mot de passe : sae202_password_2024' AS '';
SELECT '' AS '';
SELECT 'Compte administrateur par défaut :' AS '';
SELECT 'Email : admin@sae202.local' AS '';
SELECT 'Mot de passe : password' AS '';
SELECT '' AS '';
SELECT 'Pour tester, créez des comptes utilisateurs ou utilisez :' AS '';
SELECT 'Email : jean.dupont@email.com' AS '';
SELECT 'Mot de passe : password' AS '';
SELECT '===================================================' AS '';

-- ================================================================
-- VERIFICATION DES TABLES CRÉÉES
-- ================================================================

SHOW TABLES;

SELECT 
    COUNT(*) as total_utilisateurs,
    SUM(CASE WHEN is_admin = 1 THEN 1 ELSE 0 END) as admins,
    SUM(CASE WHEN is_admin = 0 THEN 1 ELSE 0 END) as utilisateurs_normaux
FROM utilisateurs;

SELECT 
    COUNT(*) as total_commentaires,
    SUM(CASE WHEN approuve = 1 THEN 1 ELSE 0 END) as commentaires_approuves,
    SUM(CASE WHEN approuve = 0 THEN 1 ELSE 0 END) as commentaires_en_attente
FROM commentaires;

SELECT 
    COUNT(*) as total_messages,
    SUM(CASE WHEN lu = 1 THEN 1 ELSE 0 END) as messages_lus,
    SUM(CASE WHEN lu = 0 THEN 1 ELSE 0 END) as messages_non_lus
FROM messages; 