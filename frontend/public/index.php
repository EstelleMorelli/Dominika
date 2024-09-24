<?php

require_once __DIR__ . '/../vendor/autoload.php';
//session_start();

$router = new AltoRouter();


if (array_key_exists('BASE_URI', $_SERVER)) {
    
    $router->setBasePath($_SERVER['BASE_URI']);
    
} else { 
    $_SERVER['BASE_URI'] = '/';
}


$router->map(
    'GET',
    '/accueil',
    [
        'method' => 'mainHome',
        'controller' => '\App\Controllers\MainController' 
    ],
    'main-home'
);

$router->map(
    'GET',
    '/',
    [
        'method' => 'mainHome',
        'controller' => '\App\Controllers\MainController' 
    ],
    'main-home2'
);
$router->map(
    'GET',
    '/apropos',
    [
        'method' => 'mainAbout',
        'controller' => '\App\Controllers\MainController' 
    ],
    'main-about'
);
$router->map(
    'GET',
    '/coaching',
    [
        'method' => 'coaching',
        'controller' => '\App\Controllers\ArticlesController' 
    ],
    'coaching'
);
$router->map(
    'GET',
    '/douleurs-persistantes',
    [
        'method' => 'douleursPersistantes',
        'controller' => '\App\Controllers\ArticlesController' 
    ],
    'douleurs-persistantes'
);
$router->map(
    'GET',
    '/difficultes-scolaires',
    [
        'method' => 'difficultesScolaires',
        'controller' => '\App\Controllers\ArticlesController' 
    ],
    'difficultes-scolaires'
);
$router->map(
    'GET',
    '/hernie-discale',
    [
        'method' => 'hernieDiscale',
        'controller' => '\App\Controllers\ArticlesController'
    ],
    'hernie-discale'
);

$router->map(
    'GET',
    '/maux-de-tete',
    [
        'method' => 'mauxTete',
        'controller' => '\App\Controllers\ArticlesController' 
    ],
    'maux-de-tete'
);
$router->map(
    'GET',
    '/performance',
    [
        'method' => 'performance',
        'controller' => '\App\Controllers\ArticlesController' 
    ],
    'performance'
);
$router->map(
    'GET',
    '/posturologie',
    [
        'method' => 'posturologie',
        'controller' => '\App\Controllers\ArticlesController'
    ],
    'posturologie'
);
$router->map(
    'GET',
    '/contact',
    [
        'method' => 'contact',
        'controller' => '\App\Controllers\MainController' 
    ],
    'main-contact'
);
$router->map(
    'POST',
    '/contact',
    [
        'method' => 'contactPost',
        'controller' => '\App\Controllers\MainController' 
    ],
    'main-contact-post'
);
$router->map(
    'GET',
    '/infos-pratiques',
    [
        'method' => 'infosPratiques',
        'controller' => '\App\Controllers\MainController' 
    ],
    'main-infos-pratiques'
);

$router->map(
    'GET',
    '/admin',
    [
        'method' => 'login',
        'controller' => '\App\Controllers\AdminController' 
    ],
    'admin-login-page'
);

$router->map(
    'POST',
    '/admin',
    [
        'method' => 'loginPost',
        'controller' => '\App\Controllers\AdminController' 
    ],
    'login-post'
);
/* -------------
--- DISPATCH ---
--------------*/

// On demande à AltoRouter de trouver une route qui correspond à l'URL courante
$match = $router->match();

// Ensuite, pour dispatcher le code dans la bonne méthode, du bon Controller
// On délègue à une librairie externe : https://packagist.org/packages/benoclock/alto-dispatcher
// 1er argument : la variable $match retournée par AltoRouter
// 2e argument : le "target" (controller & méthode) pour afficher la page 404
$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
$dispatcher->setControllersArguments($router, $match);
// Une fois le "dispatcher" configuré, on lance le dispatch qui va exécuter la méthode du controller
$dispatcher->dispatch();
