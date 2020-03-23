<?php
require '../vendor/autoload.php';

/* $router = new App\Router(dirname(__DIR__) . '/src/view/access');
$router->get('/login', 'login.php', 'login');
$router->get('/register', 'register.php', 'register');
$router->run(); */

$router2 = new App\Router(dirname(__DIR__) . '/src/view/user');
$router2->get('/home', 'home.php', 'home');
$router2->run();
