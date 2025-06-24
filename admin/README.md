# Administration Murder Party

## 🔐 Sécurité

Ce dossier `/admin` est protégé par Apache Basic Authentication via le VirtualHost.

### Configuration VirtualHost

```apache
<Directory /var/www/sae202/admin>
    AuthType Basic
    AuthBasicProvider file
    AuthName "Administration sae202"
    AuthUserFile "/home/MMI/htpassword.mmi"
    <RequireAny>
    Require ip 195.83.128.43 194.199.63.200 194.199.63.199
    Require valid-user
    </RequireAny>
</Directory>
```

## 🚀 Accès

### URLs d'administration :
- **Dashboard** : `/admin` ou `/admin/dashboard`
- **Utilisateurs** : `/admin/utilisateurs`
- **Détail utilisateur** : `/admin/utilisateur?id=X`
- **Messages** : `/admin/messages`
- **Détail message** : `/admin/message?id=X`
- **Répondre à un message** : `/admin/message-repondre?id=X`
- **Commentaires** : `/admin/commentaires`
- **Approuver commentaire** : `/admin/commentaire-approuver?id=X`
- **Rejeter commentaire** : `/admin/commentaire-rejeter?id=X`

## 🔧 Fonctionnement

### Double protection :
1. **Apache Basic Auth** : Protection au niveau serveur
2. **Vérification PHP** : Contrôle que l'utilisateur est connecté ET administrateur

### Routage :
- Le fichier `index.php` gère tout le routage interne
- Les fichiers `.php` sont les vues (dashboard, utilisateurs, etc.)
- Le `.htaccess` redirige toutes les requêtes vers `index.php`

## 📁 Structure

```
/admin/
├── index.php              # Routeur principal
├── .htaccess              # Configuration Apache
├── header.php             # Header admin
├── footer.php             # Footer admin
├── dashboard.php          # Tableau de bord
├── utilisateurs.php       # Liste des utilisateurs
├── utilisateur_detail.php # Détail d'un utilisateur
├── messages.php           # Liste des messages
├── message_detail.php     # Détail d'un message
├── message_repondre.php   # Répondre à un message
├── commentaires.php       # Liste des commentaires
└── README.md              # Cette documentation
```

## 🔄 Migration

### Anciens liens → Nouveaux liens :
- `/gestion` → `/admin`
- `/gestion/utilisateurs` → `/admin/utilisateurs`
- `/gestion/messages` → `/admin/messages`
- `/gestion/commentaires` → `/admin/commentaires`

### Avantages :
- ✅ Protection Apache automatique
- ✅ URLs plus courtes et claires
- ✅ Séparation claire admin/public
- ✅ Sécurité renforcée
- ✅ Accès restreint par IP + mot de passe 