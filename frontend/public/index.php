<?php

require_once __DIR__ . '/../vendor/autoload.php';
session_start();

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
    '/articles/[s:articleSlug]',
    [
        'method' => 'articleDetail',
        'controller' => '\App\Controllers\ArticlesController' 
    ],
    'article-detail'
);

$router->map(
    'POST',
    '/articles/[s:articleSlug]',
    [
        'method' => 'articleDetailUpdate',
        'controller' => '\App\Controllers\ArticlesController' 
    ],
    'article-detail-update'
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
        'controller' => '\App\Controllers\PricesController' 
    ],
    'main-infos-pratiques'
);

$router->map(
    'GET',
    '/logout',
    [
        'method' => 'logout',
        'controller' => '\App\Controllers\AdminController' 
    ],
    'admin-logout'
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

$router->map(
    'GET',
    '/article/ajouter',
    [
        'method' => 'articleAdd',
        'controller' => '\App\Controllers\ArticlesController' 
    ],
    'article-add'
);

$router->map(
    'POST',
    '/article/ajouter',
    [
        'method' => 'articleAddPost',
        'controller' => '\App\Controllers\ArticlesController' 
    ],
    'article-add-post'
);

$router->map(
    'GET',
    '/article/delete/[i:articleId]',
    [
        'method' => 'articleDelete',
        'controller' => '\App\Controllers\ArticlesController' 
    ],
    'article-delete'
);

$router->map(
    'POST',
    '/prices/[i:priceId]',
    [
        'method' => 'priceUpdate',
        'controller' => '\App\Controllers\PricesController' 
    ],
    'price-update-post'
);

$router->map(
    'GET',
    '/price/delete/[i:priceId]',
    [
        'method' => 'priceDelete',
        'controller' => '\App\Controllers\PricesController' 
    ],
    'price-delete'
);

$router->map(
    'POST',
    '/price/ajouter',
    [
        'method' => 'priceAddPost',
        'controller' => '\App\Controllers\PricesController' 
    ],
    'price-add-post'
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
