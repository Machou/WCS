# PHP Checkpoint 4

## Portfolio de Charlie

Checkpoint 4 de la formation PHP / Symfony de la Wild Code School.
Durée du checkpoint : du mercredi 3 février 2020 au jeudi 4 février 2021

## Requirements

- Php ^7.2 http://php.net/manual/fr/install.php;
- Composer https://getcomposer.org/download/;

## Technologies utilisées

* Mise en forme : HTML / CSS
* Langage : PHP
* SQL / Doctrine
* Javscript
* Architecture MVC
* PDO / Twig
* Symfony 5
* Yarn / NPM / Composer
* Git / GitHub

[MCD & Wireframe](ressources/wireframe_et_mcd.png)

## Étapes d'installation :

1. Cloner le dépôt sur GiHhub

2. Lancer `composer install`

3. Lancer `yarn install`

4. Copier le fichier `/.env` vers `/.env.local` et remplissez-le avec les données adéquates

5. Créer la base de données :  `symfony console d:d:c`

6. Créer les tables : `symfony console make:migration` & `symfony console d:m:m`

7. Créer les fixtures : `symfony console d:f:l`

8. Installer les composants yarn : `yarn add jquery popper.js bootstrap`

9.  Exécuter le serveur web interne PHP : `symfony server:start --no-tls`

## À faire :

- Supprimer les captures d'écrans
- Revoir le formulaire de contact
- Revoir le formulaire d'upload pour utiliser le bundle [VichUploader](https://github.com/dustin10/VichUploaderBundle)
- Revoir le CSS \o/
- .etc

Etapes Réalisée :

1. Créaton du dépot GitHub
2. Création des Users Story
3. Création du MCD
4. Création du dossier Symfony via `symfony new checkpoint4 --full`
5. Installation de encore via `composer require encore`
6. Installation de yarn via `yarn install`
7. Création de .env.local
8. Création de la base de données via `symfony console d:d:c`
9. Création du Controller de base via `symfony console make:controller`
10. Ajout du framework bootstrap via `yarn add bootstrap`
11. Création de l'utilisateur via `symfony console make:user`
12. Création des fixtures Utilisateurs via `symfony console make:fixtures`
13. Création du formulaire d'enregistrement d'un utilisateur via `symfony console make:registration-form`
14. Création du formulaire de contact via `symfony console make:form`
15. Création des messages flash
16. Ajout d'une double vérification dans le mot de passe de la page "S'enregistrer"
17. Ajout du service Slugify
18. Création du CRUD via `symfony console make:crud` pour ajouter des projets
19. Création des fixtures Projets via `symfony console make:fixtures`
20. Ajout du formulaire d'upload de la capture d'écran
21. Création d'un service d'upload de fichier **src/Service/FileUploader.php**
22. Ajout de la page /services