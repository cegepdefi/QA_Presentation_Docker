#!/bin/bash

# https://github.com/cegepdefi

# Mettez à jour votre liste de packages existante
sudo apt update

# Installer gzip. il est utilisé pour la compression de fichiers
sudo apt install -y gzip

# Installez quelques packages prérequis qui permettent à apt d'utiliser des packages via HTTPS
sudo apt install -y apt-transport-https ca-certificates curl software-properties-common

# Ajoutez la clé GPG du référentiel Docker officiel à votre système
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -

# Ajouter le référentiel Docker aux sources APT
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"

# Mettez à jour la base de données des packages avec les packages Docker du dépôt nouvellement ajouté
sudo apt update

# Assurez-vous que vous êtes sur le point d'installer à partir du dépôt Docker au lieu du dépôt Ubuntu par défaut
apt-cache policy docker-ce

# Installer Docker
sudo apt install -y docker-ce

# Vérifier l'état de Docker
# sudo systemctl status docker

# installer docker compose
sudo apt install -y docker-compose

# Ajoutez l'utilisateur actuel au groupe Docker pour éviter d'utiliser sudo lors de l'exécution de Docker
sudo usermod -aG docker ${USER}

echo "Installation complete. Please log out and log back in for changes to take effect."
sudo reboot
