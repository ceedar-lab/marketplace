<?php
require '../vendor/autoload.php';

/* $router = new App\Router(dirname(__DIR__) . '/src/view/access');
$router->get('/login', 'login.php', 'login');
$router->get('/register', 'register.php', 'register');
$router->run(); */

$router = new App\Router(dirname(__DIR__) . '/src/view/user');
$router->get('/home', 'home.php', 'home');
$router->run();
