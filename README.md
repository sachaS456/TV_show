# Binôme : Sacha HIMBER (himb0004) Florian VALENTIN (vale0075)

## Description
Ce site permet d'afficher des séries TV avec leurs saisons et leurs épisodes.
Il est possible d'ajouter, de supprimer ou de modifier le contenu de la base avec ce site web.

## Installation / Confifuration:
Necessite l'installation de php et de composer pour le bon fonctionnement du site web et des tests.

**Installation de composer:**
> composer install


**Fichier config .mypdo.ini:**  
Ce fichier permet de se connecter à la base de données contenant le lien de connexion qui comprend l'identifiant et le mot de passe.  
Ce fichier est requis pour le fonctionnement du site web.

**Voici un exemple de fichier .mypdo.ini**
> [mypdo]
> dsn = "mysql:host=mysql;dbname=exemple_base;charset=utf8"  
> username = "exemple"  
> password = "password"

**Installation d'une base de données réduite sqlite**
Cette base est requise pour effectuer les tests de Browse.

## Tests:
* Lance la commande de vérification du code
> composer test:cs

* Effectue la commande de correction du code
> composer fix:cs

* Vérification de la validité du code des fichiers php situé dans le repertoire public
> composer test:Browse

* Vérification de la validité du code des fichiers php situé dans le repertoire src/Entity
> composer test:crud

* Vérification de la validité du code de tous les fichiers php situé dans le repertoire src/Entity et public
> composer test:codecept

* Effectuer l'ensemble des tests (test:codecept, test:cs)
> composer test

## Démarrage du serveur local (commande requis):
* Sur une distribution linux
> composer start:linux


* Sur un sytème windows
> composer start:windows


* Exécute la commande composer start:linux
> composer start

## Architecture du dépôt

**Bin**: Contient les fichiers de commande qui permet d'effectuer le lancement du serveur local
**public**: Contient les fichiers qui permette l'affichage du site web
**src**: Contient les fichiers qui permet d'effectuer les interactions de la base.
**tests**: Contient les fichiers de jeux de tests