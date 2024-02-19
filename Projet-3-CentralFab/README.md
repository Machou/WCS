# [Projet 3 - CentralFab](https://github.com/WildCodeSchool/reims-php-2009-project3-central-fab)

## Projet N°3 de la Wild Code School, promotion 2020-2021 'Horizon'.

## Technologies utilisées :

* Utilisation du cadre de travail SCRUM pour l'organisation
* Mise en forme : HTML / CSS
* Langage : PHP
* SQL / Doctrine
* Javscript ( Leaflet )
* Architecture MVC
* PDO / Twig
* Symfony 5
* Yarn / NPM / Composer
* Git / GitHub

##  A quoi sert notre projet ?

CentralFab est un projet qui liste tous les Fablabs en France et permet de mettre en relation un utilisateur et le gérant du Fablab.

## Les dates du projet

* Le projet s'est déroulé en 8 semaines du 30 novembre 2020 au 29 décembre 2021 dans le cadre de notre 3ème projet à la Wild Code School de Reims.

## Le contexte du projet

* Nous avons réalisé ce projet au cours de notre formation développeur web et mobile (5 mois)

* Projet réalisé en présentiel

## Étapes d'installation

1. Cloner le repo de Github

2. Lancer ```composer install```

3. Lancer ```yarn install```

4. Copier le fichier ```/.env``` vers ```/.env.local``` et remplissez-le

5. Créer la base de données via  ```symfony console d:d:c```

6. Créer les tables via ```symfony console make:migration```

7. Puis ```symfony console d:m:m```

8. Créer les fixtures via ```symfony console d:f:l```

9. Exécuter le serveur web interne PHP avec ```symfony server:start --no-tls```

10. Direction [localhost:8000](http://localhost:8000) avec votre navigateur préféré
