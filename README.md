# Murder Party - Site Événementiel

Site web pour l'organisation d'événements Murder Party développé dans le cadre de la SAE202.

## 🚀 Fonctionnalités

### Site Public
- **Page d'accueil** : Présentation de l'événement avec commentaires approuvés
- **Page concept** : Explication du principe de la Murder Party
- **Page infos pratiques** : Localisation, accès, programme détaillé
- **Système d'inscription et connexion** des participants
- **Mentions légales**

### Espace Privé (Participants connectés)
- **Page profil** : Gestion des informations personnelles
- **Messagerie interne** : Communication avec les organisateurs
- **Formulaire de commentaires** : Partage d'expérience (soumis à modération)

### Back-office Administrateur
- **Tableau de bord** : Statistiques et vue d'ensemble
- **Gestion des utilisateurs** : Liste des inscrits
- **Modération des commentaires** : Approuver/rejeter les commentaires
- **Gestion de la messagerie** : Répondre aux messages des participants

## 📋 Prérequis

- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur
- Serveur web (Apache/Nginx)
- Extension PHP PDO MySQL

## 🛠️ Installation

### 1. Cloner le projet
```bash
git clone [url-du-repo]
cd sae202
```

### 2. Configuration de la base de données
1. Créer une base de données MySQL nommée `sae202`
2. Importer le fichier `sql/database.sql` :
```sql
mysql -u root -p sae202 < sql/database.sql
```

### 3. Configuration du site
Modifier le fichier `conf/config.php` avec vos paramètres :
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'sae202');
define('DB_USER', 'votre_utilisateur');
define('DB_PASS', 'votre_mot_de_passe');
```

### 4. Configuration du serveur web

#### Apache (.htaccess)
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
```

#### Nginx
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

## 🎯 Structure MVC

```
sae202/
├── index.php                 # Point d'entrée
├── conf/
│   ├── config.php            # Configuration générale
│   └── routeur.php           # Routeur MVC
├── model/
│   ├── User.php              # Modèle utilisateur
│   ├── Comment.php           # Modèle commentaire
│   └── Message.php           # Modèle message
├── controller/
│   ├── accueil_controller.php
│   ├── auth_controller.php
│   ├── concept_controller.php
│   ├── infos_controller.php
│   ├── mentions_controller.php
│   ├── profil_controller.php
│   ├── messagerie_controller.php
│   ├── commentaire_controller.php
│   └── gestion_controller.php
├── view/
│   ├── accueil.php
│   ├── concept.php
│   ├── infos.php
│   ├── mentions.php
│   ├── inscription.php
│   ├── connexion.php
│   ├── profil.php
│   └── autres_pages/
│       ├── header.php
│       └── footer.php
└── sql/
    └── database.sql          # Structure de la base
```

## 🔐 Comptes par défaut

### Administrateur
- **Email** : admin@sae202.local
- **Mot de passe** : password

## 🌐 URLs du site

### Pages publiques
- `/` - Accueil
- `/concept` - Concept de la Murder Party
- `/infos` - Informations pratiques
- `/mentions` - Mentions légales
- `/auth/inscription` - Inscription
- `/auth/connexion` - Connexion

### Espace utilisateur connecté
- `/profil` - Mon profil
- `/profil/mot_de_passe` - Changer le mot de passe
- `/messagerie` - Messagerie
- `/messagerie/nouveau` - Nouveau message
- `/commentaire` - Proposer un commentaire
- `/auth/deconnexion` - Déconnexion

### Administration
- `/gestion` - Tableau de bord admin
- `/gestion/utilisateurs` - Gestion des utilisateurs
- `/gestion/messages` - Gestion de la messagerie
- `/gestion/commentaires` - Modération des commentaires

## 🎨 Technologies utilisées

- **Backend** : PHP avec architecture MVC
- **Base de données** : MySQL
- **Frontend** : HTML5, CSS3, Bootstrap 5
- **Icons** : Font Awesome 6
- **Sécurité** : Sessions PHP, hashage des mots de passe, protection XSS

## 🔒 Sécurité

- Hashage des mots de passe avec `password_hash()`
- Protection contre les injections SQL avec PDO
- Échappement des données avec `htmlspecialchars()`
- Validation côté serveur de tous les formulaires
- Sessions sécurisées
- Contrôle d'accès par rôle (utilisateur/admin)

## 📱 Responsive Design

Le site est entièrement responsive et s'adapte à tous les types d'écrans :
- Desktop
- Tablette
- Mobile

## 🚦 Contraintes respectées

- ✅ Architecture MVC avec routeur
- ✅ Base de données MySQL nommée "sae202"
- ✅ Site responsive avec Bootstrap
- ✅ Sécurisation des formulaires
- ✅ Sessions PHP pour l'authentification
- ✅ Limitation des fichiers : 200Ko pour les images, 4Mo pour les vidéos
- ✅ URLs propres via le routeur
- ✅ Séparation des rôles utilisateur/admin

## 📞 Support

Pour toute question concernant le projet SAE202 :
- Email : contact@murderparty.local
- Téléphone : 03 25 XX XX XX

## 📄 Licence

Projet développé dans le cadre de la SAE202 - MMI Troyes 
