# Youdemy - Plateforme d'Apprentissage en Ligne

Youdemy est une plateforme d'apprentissage en ligne qui permet aux instructeurs de créer et de partager des cours, et aux étudiants d'apprendre à leur rythme.

## 🚀 Fonctionnalités

### Pour les Étudiants
- Inscription et authentification
- Parcourir les cours disponibles
- S'inscrire aux cours
- Suivre sa progression
- Télécharger des certificats

### Pour les Instructeurs
- Créer et gérer des cours
- Télécharger du contenu (vidéos, documents)
- Suivre les inscriptions
- Interagir avec les étudiants

### Pour les Administrateurs
- Gérer les utilisateurs
- Valider les instructeurs
- Gérer les catégories et tags
- Superviser les cours
- Voir les statistiques

## 🛠️ Technologies Utilisées

- **Backend**: PHP 8
- **Base de données**: MySQL
- **Frontend**: 
  - HTML5
  - Tailwind CSS
  - JavaScript
- **Outils**:
  - Git pour le contrôle de version
  - Composer pour la gestion des dépendances

## 📦 Installation

1. Cloner le repository :
```bash
git clone https://github.com/votre-username/Youdemy.git
```

2. Configurer la base de données :
- Créer une base de données MySQL
- Importer le fichier `database/init.sql`

3. Configurer l'environnement :
- Copier `.env.example` en `.env`
- Modifier les paramètres de connexion à la base de données

4. Installer les dépendances :
```bash
composer install
npm install
```

5. Compiler les assets :
```bash
npm run build
```

## 🏗️ Structure du Projet

```
Youdemy/
├── assets/             # Ressources frontend (CSS, JS, images)
├── controllers/        # Contrôleurs de l'application
├── core/              # Classes principales du framework
├── database/          # Migrations et seeders
├── helpers/           # Fonctions utilitaires
├── models/            # Modèles de données
└── views/             # Templates et vues
    ├── admin/         # Interface administrateur
    ├── auth/          # Pages d'authentification
    ├── components/    # Composants réutilisables
    ├── courses/       # Pages des cours
    └── student/       # Interface étudiant
```

## 👥 Rôles Utilisateurs

1. **Admin**
   - Gestion complète de la plateforme
   - Accès à toutes les fonctionnalités

2. **Instructeur**
   - Création et gestion de cours
   - Suivi des étudiants

3. **Étudiant**
   - Inscription aux cours
   - Accès au contenu des cours

## 🔐 Sécurité

- Protection contre les injections SQL
- Validation des entrées utilisateur
- Hachage des mots de passe
- Sessions sécurisées
- Protection CSRF

## 🤝 Contribution

1. Fork le projet
2. Créer une branche pour votre fonctionnalité
3. Commiter vos changements
4. Pousser vers la branche
5. Ouvrir une Pull Request

## 📝 License

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

## 📧 Contact

Pour toute question ou suggestion, n'hésitez pas à nous contacter à [email@youdemy.com](mailto:email@youdemy.com).
