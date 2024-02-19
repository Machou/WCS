# [Projet 2 - FéminVision](https://github.com/WildCodeSchool/reims-php-2009-project2-women-directors)

## Projet N°2 de la Wild Code School, promotion 2020-2021 'Horizon'.

## Technologies utilisées :

* Utilisation du cadre de travail SCRUM pour l'organisation
* Mise en forme : HTML/CSS
* Langage : PHP
* Architecture MVC
* PDO / Twig
* SQL (pour la base de données)

##  A quoi sert notre projet ?

FéminVision une base de données qui rescence les films réalisés par des femmes depuis le début du cinéma.

L'utilisateur peut :

* Ajouter / Modifier / Surpprimer un film

* Parcourir la liste des films

* Moteur de recherche intégré au site

## Les dates du projet

* Le projet s'est déroulé en 6 semaines du 19 octobre 2020 au 27 novembre 2020 dans le cadre de notre 2ème projet à la Wild Code School de Reims.

## Le contexte du projet

* Nous avons réalisé ce projet au cours de notre formation développeur web et mobile (5 mois)

* Projet réalisé en présentiel et distanciel

## Étapes d'installation

1. Cloner le repo de GitHub

2. Lancer ```composer install```

3. Créer ```config/db.php``` à partir du fichier ```config/db.php.dist``` et ajouter les paramètres de votre base de données. Ne pas supprimer pas le fichier .dist, il doit être conservé

4. Importer ```feminivision_db.sql``` dans votre serveur SQL

5. Exécuter le serveur web interne PHP avec ```php -S localhost:8000 -t public/```. L'option *-t* avec public en paramètre signifie que votre localhost ciblera le dossier /public

6. Direction [localhost:8000](http://localhost:8000) avec votre navigateur préféré