# 🔧 DevOps Projet - Stack LEMP avec Ansible & Docker

## 🚀 Description

Ce projet déploie automatiquement une stack LEMP (Linux, Nginx, MySQL, PHP) via **Docker Compose** et **Ansible**.

## 📦 Technologies

- Docker
- Docker Compose
- Ansible
- MySQL 8
- Adminer
- Nginx
- PHP
- Git

## 📁 Structure

- `ansible/` : playbook de déploiement
- `nginx/` : configuration Nginx
- `php/` : Dockerfile PHP
- `html/` : contenu web

## ⚙️ Utilisation

### 1. Lancer le playbook Ansible

```bash
ansible-playbook -i ansible/hosts ansible/playbook.yml
