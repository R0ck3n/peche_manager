<?php
//en fonction du lien appelé ce fichier précise quel controller et quel fonction est utilisée pour afficher le corps de la page
return [
    '/' => [
        'App\Controllers\HomeController',
        'index'
    ],
    '/index.php/' => [
        'App\Controllers\HomeController',
        'index'
    ],
    '/index.php/login' => [
        'App\Controllers\UserController',
        'loginView'
    ],
    '/index.php/register' => [
        'App\Controllers\UserController',
        'registerView'
    ],
    '/index.php/memberSpace' => [
        'App\Controllers\MemberSpaceController',
        'memberView'
    ],
    '/index.php/fishingSessionHistory' => [
        'App\Controllers\MemberSpaceController',
        'displayHistory'
    ],
    '/index.php/fishingSessionRegister' => [
        'App\Controllers\MemberSpaceController',
        'registerSession'
    ],
    '/index.php/condition' => [
        'App\Controllers\HomeController',
        'condition'
    ],
    '/index.php/subscribe' => [
        'App\Controllers\UserController',
        'register'
    ],
    '/index.php/connect' => [
        'App\Controllers\UserController',
        'connect'
    ],
    '/index.php/logout' => [
        'App\Controllers\UserController',
        'logout'
    ],
    '/index.php/admin' => [
        'App\Controllers\UserController',
        'adminView'
    ],
    '/index.php/update' => [
        'App\Controllers\UserController',
        'updateView'
    ],
    '/index.php/delete' => [
        'App\Controllers\UserController',
        'deleteView'
    ],



];