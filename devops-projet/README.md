# 🚀 Présentation du Projet DevOps — Stack LEMP Automatisée

## 🌟 Objectif

Déployer automatiquement une **application web LEMP** (Linux, Nginx, MySQL, PHP) sur un serveur distant à l'aide d'**Ansible**, **Docker**, **Git**, et un système de **CI/CD personnalisé via webhook**.

---

## 🧱 Architecture du Projet

```txt
📁 devops-projet/
🗄 ansible/
├── playbook.yml          # Playbook principal Ansible
├── hosts                 # Fichier d'inventaire (ex : 192.168.10.20)
🗄 docker-compose.yml        # Stack LEMP (nginx, php, mysql, adminer)
🗄 html/
├── index.html            # Page d'accueil
└── test-db.php           # Script de test MySQL
🗄 nginx/
└── default.conf          # Configuration de nginx
🗄 php/
└── Dockerfile            # Dockerfile PHP avec extensions nécessaires
```

---

## ⚙️ Fonctionnement du Playbook Ansible

Le fichier `ansible/playbook.yml` automatise les étapes suivantes :

1. **Création d’un utilisateur non-root sécurisé (`deploy`)**
2. **Installation de Docker & Docker Compose**
3. **Ajout de l'utilisateur au groupe `docker`**
4. **Création du répertoire du projet**
5. **Clonage du dépôt Git**
6. **Déploiement de l’application via `docker-compose up -d --build`**

---

## 🔐 Sécurité

* Utilisation d’un **utilisateur non-root (`deploy`)**
* Accès `sudo` sans mot de passe limité à ce compte pour déploiement
* Connexion SSH sécurisée (via mot de passe ou clé, à configurer selon environnement)

---

## 🔄 CI/CD avec Webhook Git

* Déploiement déclenché automatiquement après chaque **push sur le dépôt Git** :

  * `git pull`
  * `docker-compose down && docker-compose up -d --build`

* Serveur Python Flask minimaliste écoutant sur le port `9000` :

  * URL webhook : `http://192.168.10.20:9000/hook`

---

## 🧪 Technologies Utilisées

| Composant         | Rôle                                           |
| ----------------- | ---------------------------------------------- |
| **Ansible**       | Automatisation de l'installation & déploiement |
| **Docker**        | Conteneurisation des services                  |
| **Nginx**         | Reverse proxy pour PHP                         |
| **MySQL**         | Base de données                                |
| **Adminer**       | Interface d’administration DB                  |
| **Git + Webhook** | CI/CD simplifié                                |
| **Flask**         | Serveur webhook léger                          |

---

## 📌 Pré-requis côté serveur distant (target)

* OS : Ubuntu (testé sur 20.04+)
* Ports ouverts : 22 (SSH), 80 (HTTP), 8080 (Adminer), 9000 (Webhook)
* Authentification SSH configurée (dans `ansible/hosts`)
* Accès internet pour récupérer les paquets Docker, Git, etc.

---

## 📍 Pour lancer le projet

1. Modifier le fichier `ansible/hosts` :

   ```ini
   [web]
   192.168.10.20 ansible_user=root ansible_ssh_pass=motdepasse
   ```

2. Lancer le playbook :

   ```bash
   ansible-playbook -i ansible/hosts ansible/playbook.yml
   ```

3. (Optionnel) Activer le webhook CI/CD avec :

   ```bash
   nohup python3 /opt/hooks/webhook.py &
   ```

---

## ✅ Résultat attendu

Une stack LEMP complète déployée et opérationnelle :

* Application accessible via le navigateur
* Adminer disponible sur `http://192.168.10.20:8080`
* Code mis à jour automatiquement à chaque `git push`
