# Wild Séries

## Annuaire de séries, créé en PHP 7 / Symfony 5

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

## Le contexte du projet

* Ce projet m'a permis de travailler et d'apprendre Symfony 5 en l'espace de quelques mois.

* Les bases ont été acquises, et des améliorations sur le projet sont à prévoir

* Projet réalisé en présentiel et distanciel

## Étapes d'installation

1. Cloner le repo de Github

2. Lancer `composer install`

3. Lancer `yarn install`

4. Copier le fichier `/.env` vers `/.env.local` et remplissez-le

5. Créer la base de données :  `symfony console d:d:c`

6. Créer les tables : `symfony console make:migration` & `symfony console d:m:m`

7. Créer les fixtures : `symfony console d:f:l`

8. Installer les composants yarn : `yarn add jquery popper.js bootstrap`

9. Exécuter le serveur web interne PHP avec `symfony server:start --no-tls`

## Informations utiles

* [Streamable](https://streamable.com/)


**Installer la dernière version de Node.js**

```bash
apt install npm

npm cache clean -f
npm install -g n
n latest
n _choisir_la_version_ // node/16.1.0
```

**Configurer & lancer le serveur**

* [Installer Encore](https://symfony.com/doc/current/frontend/encore/installation.html)
* [Installation et configuration du framework Symfony](https://symfony.com/doc/current/setup.html)

```bash
cd /var/www
npm cache clean -f
composer selfupdate && composer u
yarn install --force && yarn upgrade
symfony check:requirements
symfony console cache:clear

symfony console d:d:c
symfony console make:migration
symfony console d:m:m
symfony console d:f:l

yarn encore dev
yarn encore dev --watch
yarn encore production
```