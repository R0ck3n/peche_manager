<?php
//en fonction du lien appelé ce fichier précise quel controller et quel fonction est utilisée pour afficher le corps de la page
return [
    '/' => [
        'App\Controllers\HomeController',
        'index'
    ],
    '/login' => [
        'App\Controllers\UserController',
        'loginView'
    ],
    '/register' => [
        'App\Controllers\UserController',
        'registerView'
    ],
    '/memberSpace' => [
        'App\Controllers\MemberSpaceController',
        'memberView'
    ],
    '/fishingSessionHistory' => [
        'App\Controllers\MemberSpaceController',
        'displayHistory'
    ],
    '/fishingSessionRegister' => [
        'App\Controllers\MemberSpaceController',
        'registerSession'
    ],
    '/condition' => [
        'App\Controllers\HomeController',
        'condition'
    ],
    '/subscribe' => [
        'App\Controllers\UserController',
        'register'
    ],
    '/connect' => [
        'App\Controllers\UserController',
        'connect'
    ],
    '/logout' => [
        'App\Controllers\UserController',
        'logout'
    ],
    '/admin' => [
        'App\Controllers\UserController',
        'adminView'
    ],
    '/update' => [
        'App\Controllers\UserController',
        'updateView'
    ],
    '/delete' => [
        'App\Controllers\UserController',
        'deleteView'
    ],



];