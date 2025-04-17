# README - MyMeetic Project

## Description

Ce projet est une application web se basant sur le site de rencontre meetic. Le but du projet est donc de repoduire un site de rencontre.

## Installation

Clonez le dépôt sur votre machine locale :

git clone <URL_DU_REPO>
Importez la base de données meetic.sql dans votre serveur MySQL.
Vérifiez que le fichier Config/Database.php contient les bonnes informations de connexion à la base de données.

## Structure du projet

- Config/Database.php : Fichier de connexion à la base de données
- Models/ : Contient les classes représentant les tables de la base de données
- Views/ : Contient les fichiers d'affichage HTML/PHP
- Controller/ : Contient les redirections et les vérifications des données envoyées
## Dépendances

- PHP >= 7.4
- MySQL
- Tailwind CSS (inclus via CDN)
