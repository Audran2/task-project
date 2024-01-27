## Projet laravel

pour fonctionner, le projet laravel nécessite seulement l'éxécution des commandes de base : <br>

-   `composer update`
-   `php artisan migrate`
-   `php artisan serve`

Pour la gestion d'erreur du formulaire, j'ai installé la langue française sur le projet avec: <br>

-   `php artisan lang:publish`
-   `php artisan lang:add fr`

## Fonctionnalités

### Migrations

Les migrations sont créés par la commande `php artisan make:migration create_name_table`.

J'ai d'abord créé celle pour les tâches qui contient un id, titre, slug (associé au titre), description, date et les timestamps (création et mise à jour).

J'ai ensuite créé celle pour la catégorie qui est composée d'un id, nom, slug (associé au nom), une couleur et enfin les timestamps. Dans cette même migration, j'ajoute à la table `tasks` la caractéristique `category_id` en clé étrangère.

Enfin, j'ai créé une dernière migration pour remplir les tables de la base de données avec Faker.

Pour éxécuter les migrations, j'utilise la commande `php artisan migrate`

### model

Les modèles sont créés via la commande `php artisan make:model Nom`.

Ils permettent de définir les caractéristiques modifiables ou protégées d'une table ainsi que les relations entre plusieurs tables.

Dans mon cas, le model `Category` dispose d'une fonction définissant une relation OneToMany entre elle et le model `Task`.

### ControllerRequest

Ces fichiers sont créés via `php artisan make:request CreateTaskRequest`. Ils permettent de vérifier facilement les informations venant d'un formulaire grâce à la définition de règles.

### Controller

Les controller sont créés par la commande `php artisan make:controller NomController`. 3 controller ont été créé.

Les deux premiers sont les controllers pour les tâches et les catégories.
Ceux-ci possèdent la même structure et les mêmes fonctions à savoir :

-   `index()` avec une pagination de 10 éléments
-   `show($slug)` qui affiche les détails de la tâche pour Task. Pour la catégorie, j'affiche les tâches qui lui sont reliées dans un tableau rangé par ordre ascendant et avec une pagination de 10 éléments.
-   `create()` qui redirige vers le formulaire de création.
-   `store($request)` qui récupère les données du formulaire et les valide avec le fichier `Request`. Si aucun problème n'est rencontré, on crée le slug à partir du titre/nom puis on ajoute les infos dans la table. Une redirection est ensuite effectué vers `show()`
-   `edit($slug)` qui redirige vers le formulaire de modification.
-   `update($request, $slug)` qui édit un élément en fonction de son slug et update celui-ci si aucune erreur n'est rencontré. Une redirection est ensuite effectué vers `show()`
-   `destroy($slug)` qui supprime l'élément en fonction de son slug.

Une dernier controller est aussi créer pour le calendrier. Il n'est composé que de la fonction `index()` et se content d'appeler l'ensemble des tâches et catégories.

### Routes

Les routes dans Laravel définissent les URL et les actions associées. Elles permettent de diriger les requêtes vers les contrôleurs appropriés, facilitant ainsi la gestion des pages et des fonctionnalités de l'application web.

Les routes sont organisées sous un groupe préfixe permettant d'organiser les url associées à un ensemble spécifique de fonctionnalités ou de ressources sous un même préfixe commun. Dans mon cas, mes routes sont actionnées autour des prefix `task` et `category`.

Chaque route est ensuite créée suivant le même model :
chemin de l'url - appelle d'une méthode spécifique du controller - attribution à un nom.

L'attribution d'un nom permet d'appeler plus facilement la route dans un `<a></a>` d'une view.

### View

Pour chaque fonction dans le controller (excepté `store()` et `update()`), une view est créée.

#### Layout

Pour définir une structure de code similaire et éviter les duplications, j'ai créer un layout. Bien que très basique, il me permet de faire facilement appelle à mes scripts et style (utilisation de tailwind).

#### Components

Pour éviter la duplication de code, j'ai créé différent component qui sont, par la suite appelé sur mes pages.

##### Navbar

Une navbar simple qui est directement appelé dans mon layout

##### Formulaire catégorie et tâche

Afin d'éviter d'avoir un formulaire pour la création et pour l'édition, j'ai créé un même formulaire qui est ensuite appelé sur les pages spécifiques. En fonction des props que je lui envoie, certaines parties du code s'ajoutent ou non comme la méthode `PUT` qui ne doit être disponible que sur l'édition ou encore les value des input (avec l'utilisation de `optional()`, cela me permet de pouvoir récupérer facilement la valeur de l'élément si on est en édition).

Ces méthodes sont ensuite appelées de cette façon dans mes pages :

-   `<x-task-form :categories="$categories" />` pour task
-   `<x-category-form />` pour category

##### Tableau des tâches

Etant utilisé à la fois dans la view `index` de task et dans la view `show` de category, j'ai préféré créer un component qui est ensuite appelé dans ces pages. Celui-ci est appelé de cette façon :

`<x-tasks-table :tasks="$tasks" />`
