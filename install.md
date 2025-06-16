# Guide d'Installation - Murder Party SAE202

## 🛠️ Installation Étape par Étape

### 1. Prérequis
- PHP 7.4+ avec extension PDO MySQL
- MySQL 5.7+ ou MariaDB
- Serveur web (Apache avec mod_rewrite ou Nginx)

### 2. Installation de la Base de Données

#### Méthode 1 : Via ligne de commande MySQL
```bash
# Se connecter à MySQL en tant qu'administrateur
mysql -u root -p

# Exécuter le script (une fois connecté à MySQL)
source sql/database.sql

# Ou depuis l'extérieur :
mysql -u root -p < sql/database.sql
```

#### Méthode 2 : Via phpMyAdmin
1. Ouvrir phpMyAdmin
2. Créer une nouvelle base de données `sae202`
3. Importer le fichier `sql/database.sql`

### 3. Configuration du Site

Le fichier `conf/config.php` est déjà configuré avec l'utilisateur dédié :

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'sae202');
define('DB_USER', 'sae202_user');
define('DB_PASS', 'sae202_password_2024');
```

### 4. Configuration du Serveur Web

#### Apache
Le fichier `.htaccess` est déjà présent. Assurez-vous que :
- `mod_rewrite` est activé
- `AllowOverride All` est configuré dans votre VirtualHost

#### Nginx
Ajouter dans votre configuration :
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location ~ \.php$ {
    include fastcgi_params;
    fastcgi_pass 127.0.0.1:9000;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
}
```

### 5. Permissions des Fichiers
```bash
# Définir les bonnes permissions
chmod 755 -R .
chmod 644 sql/database.sql
chmod 644 conf/config.php
```

### 6. Test de l'Installation

#### Comptes de Test Créés
- **Administrateur :**
  - Email : `admin@sae202.local`
  - Mot de passe : `password`

- **Utilisateur test :**
  - Email : `jean.dupont@email.com`
  - Mot de passe : `password`

#### URLs à Tester
- `/` - Page d'accueil
- `/concept` - Page concept
- `/auth/connexion` - Connexion
- `/auth/inscription` - Inscription
- `/gestion` - Administration (après connexion admin)

### 7. Vérification de la Base de Données

Après installation, vérifiez que les tables sont créées :
```sql
USE sae202;
SHOW TABLES;

-- Doit afficher :
-- commentaires
-- messages
-- reservations
-- utilisateurs
```

### 8. Résolution de Problèmes

#### Erreur de connexion à la base
1. Vérifiez que MySQL est démarré
2. Vérifiez les identifiants dans `conf/config.php`
3. Vérifiez que l'utilisateur `sae202_user` existe :
```sql
SELECT User, Host FROM mysql.user WHERE User = 'sae202_user';
```

#### Erreur 404 sur les pages
1. Vérifiez que `mod_rewrite` est activé (Apache)
2. Vérifiez la configuration `.htaccess`
3. Vérifiez que le serveur web pointe vers le bon dossier

#### Erreur de permissions
```bash
# Apache/Nginx doit pouvoir lire les fichiers
sudo chown -R www-data:www-data /chemin/vers/sae202
chmod 755 -R /chemin/vers/sae202
```

### 9. Sécurité en Production

1. **Changer les mots de passe par défaut**
2. **Activer HTTPS** (décommenter dans .htaccess)
3. **Modifier l'utilisateur de base de données**
4. **Configurer les sauvegardes**

### 10. Données de Test

Le script crée automatiquement :
- 5 utilisateurs (1 admin + 4 utilisateurs normaux)
- 6 commentaires (4 approuvés + 2 en attente)
- 4 messages (avec 1 réponse)
- 3 réservations

Ces données permettent de tester toutes les fonctionnalités du site.

## 🎯 Validation de l'Installation

✅ Site accessible sur `/`  
✅ Connexion admin fonctionne  
✅ Inscription utilisateur fonctionne  
✅ Messagerie fonctionne  
✅ Modération commentaires fonctionne  
✅ Design responsive fonctionne  

## 📞 Support

En cas de problème, vérifiez :
1. Les logs d'erreur PHP
2. Les logs d'erreur du serveur web
3. Les logs d'erreur MySQL

Le site est maintenant prêt pour la SAE202 ! 🚀 