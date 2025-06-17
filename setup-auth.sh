#!/bin/bash

echo "=== Configuration de l'authentification Apache pour /admin ==="

# Vérifier si le répertoire existe
if [ ! -d "/home/mmi24c01" ]; then
    echo "Création du répertoire /home/mmi24c01..."
    sudo mkdir -p /home/mmi24c01
fi

# Créer le fichier de mots de passe
echo "Création du fichier de mots de passe..."
echo "Entrez le nom d'utilisateur pour l'admin :"
read username

# Créer le fichier htpasswd
sudo htpasswd -c /home/mmi24c01/htpassword.mmi "$username"

# Vérifier les permissions
sudo chown www-data:www-data /home/mmi24c01/htpassword.mmi
sudo chmod 644 /home/mmi24c01/htpassword.mmi

echo "Fichier créé : /home/mmi24c01/htpassword.mmi"
echo "Contenu :"
sudo cat /home/mmi24c01/htpassword.mmi

# Tester la configuration Apache
echo "Test de la configuration Apache..."
sudo apache2ctl configtest

if [ $? -eq 0 ]; then
    echo "Configuration Apache OK"
    echo "Rechargement d'Apache..."
    sudo systemctl reload apache2
    echo "Apache rechargé avec succès !"
else
    echo "ERREUR dans la configuration Apache"
fi

echo "=== Configuration terminée ==="
echo "Testez maintenant l'accès à : http://mmi24c01.sae202.ovh/admin" 