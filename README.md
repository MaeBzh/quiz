<p align="center"><img src="http://localhost/quizz/assets/Logo_project.png"></p>

## Au sujet de Quizz Master

Quizz Master est un projet développé dans le cadre du module Qualité Logiciel-Testing.

### Installation


#### BDD
installer le fichier quizz.sql

#### PHP Laravel
Dans un terminal, exécuter les commandes suivantes :

- taper git clone https://github.com/MaeBzh/quiz.git quizz pour cloner le dépôt
- alternative : télécharger le projet sous format .zip, et décompressez-le.
- taper cd quizz // dossier root du projet
- taper composer install pour télécharger les dépendances PHP
- taper composer update pour être sur que tous les packages sont à jour
- vérifier l'existence du fichier .env à la racine du projet, s'il n'existe pas, renommer .env.example en .env
- configurer les options de connexion à la base de données dans le fichier .env :
    - renseigner DB_HOST
    - renseigner DB_DATABASE
    - renseigner DB_USERNAME
    - renseigner DB_PASSWORD
- taper php artisan migrate:fresh pour créer les tables
- taper php artisan db:seed pour générer des jeux de données de démo

#### Affichage
Lancer un serveur local type XAMPP.

Dans un web-browser, exécuter la commande suivante : http://localhost/quizz/public/ pour accéder à l'écran d'accueil du Quizz.

Les différents onglets vous permettront soit :
  - d'accéder au détail des parties déjà réalisées -> Games
  - d'accéder au gestionnaire des questions et réponses -> Questions

