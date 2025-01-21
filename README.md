# Youdemy - Plateforme d'Apprentissage en Ligne

Une plateforme d'apprentissage en ligne permettant aux instructeurs de partager leurs connaissances et aux étudiants d'apprendre à leur rythme.

## 📚 Fonctionnalités Implémentées

### Système d'Authentification
- Inscription des utilisateurs (étudiants et enseignants)
- Connexion sécurisée
- Gestion des sessions
- Validation des enseignants par l'administrateur

### Gestion des Cours
- Création de cours avec titre, description, durée et prix
- Support pour différents types de contenu (vidéo, documents)
- Catégorisation des cours
- Système de tags pour une meilleure organisation
- Recherche de cours par mot-clé
- Filtrage par catégorie
- Affichage des cours populaires et récents

### Espace Étudiant
- Inscription aux cours
- Liste des cours inscrits
- Téléchargement de certificats

### Espace Enseignant
- Création et gestion des cours
- Statistiques d'enseignement
- Suivi des inscriptions
- Gestion du contenu des cours

### Panneau Administrateur
- Statistiques globales de la plateforme
- Gestion des utilisateurs (activation/désactivation)
- Validation des enseignants
- Gestion des catégories
- Gestion des tags
- Supervision des cours
- Gestion des inscriptions

### Interface Utilisateur
- Design responsive avec Tailwind CSS
- Navigation intuitive
- Composants réutilisables
- Pages d'accueil et à propos
- Filtres de recherche dynamiques

## 🛠️ Technologies Utilisées

- **Backend**: PHP 8 (POO)
- **Base de données**: MySQL
- **Frontend**: 
  - HTML5
  - Tailwind CSS
  - JavaScript
- **Outils**: Git

## 📁 Structure du Projet

```
Youdemy/
├── assets/             # Ressources frontend
│   ├── CSS/           # Styles Tailwind
│   ├── js/            # Scripts JavaScript
│   └── images/        # Images et médias
├── controllers/        # Logique métier
│   ├── admin/         # Administration
│   ├── auth/          # Authentification
│   ├── courses/       # Gestion des cours
│   └── student/       # Espace étudiant
├── database/          # Base de données
│   └── init.sql       # Structure et données initiales
├── helpers/           # Fonctions utilitaires
├── models/            # Modèles de données
└── views/             # Templates
    ├── admin/         # Interface admin
    ├── auth/          # Pages de connexion
    ├── components/    # Composants partagés
    ├── courses/       # Pages des cours
    └── student/       # Interface étudiant
```

## 🔐 Sécurité

- Validation des entrées utilisateur
- Hachage des mots de passe
- Sessions sécurisées
- Protection contre les injections SQL

## 📋 Modèles de Données

### User
- Gestion des utilisateurs (Admin, Teacher, Student)
- Authentification et autorisations
- Profils utilisateurs

### Course
- Gestion complète des cours
- Métadonnées (titre, description, durée, prix)
- Relations avec catégories et tags

### Category & Tag
- Organisation des cours
- Filtrage et recherche

### Enrollment
- Gestion des inscriptions
- Suivi des progrès
- Statistiques d'apprentissage

## 🚀 Installation

1. Cloner le repository
2. Configurer la base de données avec `database/init.sql`
3. Configurer le serveur web (Apache/Nginx)
4. Installer les dépendances frontend
5. Compiler les assets CSS avec Tailwind

## 📞 Support

Pour toute question technique ou suggestion d'amélioration, contactez l'équipe de développement.
