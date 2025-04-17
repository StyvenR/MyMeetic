# My Meetic

## Description
**My Meetic** est une application web de rencontres inspirée du site Meetic. Cette plateforme permet aux utilisateurs de créer un profil, de rechercher des partenaires potentiels et d'interagir avec d'autres membres.

## Fonctionnalités
- Inscription et connexion des utilisateurs
- Création et modification de profil personnalisé
- Sélection de centres d'intérêt (hobbies)
- Carrousel de profils sur la page d'accueil
- Interface responsive avec design moderne

## Installation
1. Clonez le dépôt sur votre machine locale :
  ```bash
  git clone <URL_DU_REPO>
  ```
2. Importez la base de données `meetic.sql` dans votre serveur MySQL :
  ```bash
  mysql -u username -p database_name < Config/meetic.sql
  ```
3. Configurez la connexion à la base de données dans `Config/Database.php` avec vos informations :
  ```php
  <?php
  // Exemple de configuration
  private $host = "localhost";
  private $db_name = "meetic";
  private $username = "votre_username";
  private $password = "votre_password";
  ```
4. Démarrez votre serveur web local (Apache, XAMPP, etc.).
5. Accédez à l'application via votre navigateur.

## Technologies utilisées
- **PHP** 7.4+
- **MySQL**
- **HTML/CSS**
- **JavaScript**
- **Tailwind CSS** (via CDN)