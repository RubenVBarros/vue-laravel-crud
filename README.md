## Procédure d'installation du projet
Tout d'abord il faut préciser que ce projet a été fait sous windows en utilisant <b>webpack.mix.js</b>
et en utilisant <b>Xampp</b> comme serveur local et on utilse <b>MySQL</b> pour la base de donnée

Le tout premier commit correspond au code de base en faisant la commande :

`composer create-project laravel/laravel vue-laravel-crud`

Comme indiqué dans les instructions fournis dans le mail

## Installation de Tailwind CSS :
J'ai installé TailwindCSS comme indiqué dans le tutoriel sur le site de Tailwind à cette adresse :

https://tailwindcss.com/docs/guides/laravel#mix

J'ai suivi la procédure pour installer avec webpack.mix.js

L'installation de tailwind survient dans le deuxième et troisième commit du dépôt git.

## Installation du reste des paquets vue vue-router vue-loader et axios :
On a juste à faire ces commandes :

`npm install vue`

`npm install vue-loader`

`npm install vue-router`

`npm install axios`

Pour installer le reste des paquets dont on aura besoin

## Création de la table Article
Nous allons maintenant créer la table Article, il faut d'abord créer un le model et 
le fichier de migration de la table.

En faisant cette commande :

`php artisan make:model Articles -m`

il faut ensuite faire en sorte de créer la table en faisant cette commande :

`php artisan migrate`

A savoir que j'ai changé le fichier .env qui contient divers informations notamment
tout ce qui est relatif à la base de donnée dans notre cas la base de donnée s'appelle :
<i><b>crud</b></i>

Et elle est crée via phpmyadmin  qui est disponible sur Xampp sous Windows.


## Création du controller, du seeder et de la factory
Le controller va posséder toute les méthodes que l'on va executer pour faire les opérations CRUD
sur nos articles on en crée un en faisant cette commande :

`php artisan make:controller ArticleController --resource`

Le flag --resource permet d'avoir l'entête des fonctions pour permettre le crud déjà prête.

Pour créer des données test dans la base de donnée il faut créer un seeder qui va populer cette base

Dans mon cas j'ai choisi de créer un Seeder qui va utiliser des données de la Factory, ces données de la 
Factory seront des données crées avec un contenu aléatoire et avec le seeder nous allons en crée
5 résultats à chaque fois que nous allons faire la commande qui permet de populer notre base.

Il faut alors créer le seeder avec cette commande :

`php artisan make:seeder ArticleSeeder`

Et nous allons créer une factory avec cette commande :

`php arisan make:facory ArticleFactory`

Pour populer notre base de donnée nous allons faire cette commande :

`php artisan db:seed --class=ArticleSeeder`

