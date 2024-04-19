<?php


require_once '../vendor/autoload.php';
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
    '/apropos',
    [
        'method' => 'mainAbout',
        'controller' => '\App\Controllers\MainController' 
    ],
    'main-about'
);

$router->map(
    'GET',
    '/posturologie/definition',
    [
        'method' => 'posturologieDefinition',
        'controller' => '\App\Controllers\PosturologieController' 
    ],
    'posturologie-definition'
);
$router->map(
    'GET',
    '/posturologie/seance',
    [
        'method' => 'posturologieSession',
        'controller' => '\App\Controllers\PosturologieController' 
    ],
    'posturologie-session'
);
$router->map(
    'GET',
    '/posturologie/quand-appeler',
    [
        'method' => 'posturologieNeeded',
        'controller' => '\App\Controllers\PosturologieController'
    ],
    'posturologie-needed'
);

$router->map(
    'GET',
    '/coaching/definition',
    [
        'method' => 'coachingDefinition',
        'controller' => '\App\Controllers\CoachingController' 
    ],
    'coaching-definition'
);
$router->map(
    'GET',
    '/coaching/seance',
    [
        'method' => 'coachingSession',
        'controller' => '\App\Controllers\CoachingController' 
    ],
    'coaching-session'
);
$router->map(
    'GET',
    '/coaching/quand-appeler',
    [
        'method' => 'coachingNeeded',
        'controller' => '\App\Controllers\CoachingController'
    ],
    'coaching-needed'
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
