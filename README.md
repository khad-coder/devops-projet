# 📦 Projet DevOps – Déploiement d'une Stack LEMP avec Ansible & Docker

## 🔧 Objectif

Automatiser le déploiement d'une stack **LEMP** (Linux, Nginx, MariaDB, PHP) à l’aide d’**Ansible** et **Docker Compose** pour simplifier la gestion des environnements de développement ou de production.

---

## 📁 Structure du projet

```
devops-projet/
├── ansible/
│   ├── docker-compose.yml       # Définition des services Docker
│   ├── Dockerfile               # Dockerfile principal
│   ├── php/Dockerfile           # Dockerfile PHP-FPM
│   ├── nginx/default.conf       # Configuration Nginx
│   ├── html/index.html          # Page web d'accueil
│   ├── html/test-db.php         # Script test connexion DB
│   ├── hosts                    # Fichier d'inventaire Ansible
│   └── playbook.yml             # Playbook de déploiement complet
├── install_docker.yml           # Playbook indépendant pour installer Docker
└── README.md                    # Documentation du projet
```

---

## 🚀 Fonctionnalités Automatisées

✅ Création d’un utilisateur `deploy` non-root sécurisé  
✅ Installation automatique de **Docker** et **Docker Compose**  
✅ Ajout de l’utilisateur au groupe `docker`  
✅ Déploiement via `docker-compose`  
✅ Clonage d’un dépôt Git (CI/CD simplifié)  
✅ Stack **LEMP** opérationnelle avec page d'accueil et test de connexion DB

---

## 📜 Pré-requis

- Un hôte Ubuntu 20.04+ avec accès SSH
- Python 3 installé
- Accès root ou utilisateur avec sudo

---

## ▶️ Commandes de lancement

```bash
# 1. Modifier le fichier d'inventaire Ansible
nano ansible/hosts

# 2. Lancer le playbook principal
ansible-playbook -i ansible/hosts ansible/playbook.yml
```

---

## 🛠 Exemple de configuration `hosts`

```ini
[web]
192.168.10.20 ansible_user=root ansible_ssh_pass=motdepasse
```

---

## ✨ Bonus CI/CD

Le dépôt Git peut être connecté à un **webhook** GitHub pour un déploiement continu, grâce à l’étape de clonage automatique intégrée dans le playbook.