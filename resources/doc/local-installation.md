# Catfish

## Installation

Cloner le projet avec le tag --recursive pour cloner en même temps le submodule Laradock :

`git clone --recursive https://github.com/Baldrani/Catfish.git`

Se placer dans le dossier du projet (/Catfish)

### Lancer le projet avec Docker

Commandes npm propres à Docker pour le projet :

* `npm run build` : (à exécuter la 1ère fois) exécute `docker-compose up -d --build nginx mysql mongo phpmyadmin`
* `npm run start` : (à exécuter les fois suivantes) exécute `docker-compose up -d nginx mysql mongo phpmyadmin`
* `npm run stop` : (stoppe les containers) exécute `docker-compose down` 
* `npm run bash`: (lance le bash du container) exécute `docker-compose exec workspace bash`

**Au premier lancement du projet :**

`npm run build` 

`npm run bash`

`composer install`

`cp .env.example .env` 

`php artisan key:generate`

Le projet devrait être accessible sur votre **localhost** (port 80) 
(vérifiez que le port 80 n'était pas occupé par autre chose comme un \*AMP, Skype, etc.)

PHPMyAdmin est accessible sur **localhost:8080**

**Travailler en local**

Lancer `npm run start` pour déployer l'environnement Docker.

`npm run watch` permet d'analyser en continu vos fichiers et compiler les fichiers Sass (*resources/assets/sass/app.scss*) et JS (*resources/assets/js/app.js*) vers des fichiers CSS et JSS du dossier *public*.

Pour le JS, cela compile automatiquement ES6, les modules, et les fichiers .vue

*Si la commande `watch` ne fonctionne pas, essayez avec `npm run watch-poll`*

On peut ajouter d'autres fichiers à analyser que app.scss et app.js en éditant le fichier **_webpack.mix.js_** à la racine.
