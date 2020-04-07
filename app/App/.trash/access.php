<?php
require dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
use App\Table;
use App\Router;

function checkLogin() {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $router = new Router;
    if ($login !== null && $password !== null) {
        $search = new Table('users');
        $search = $search->checkLogin($login, $password);
        $route = $router->url('home');
        if ($search) {
            header("Location : " . $route);
        } else {
            echo 'Le mot de passe n\'est pas valide';
        }
    }
    echo 'Veuillez entrer tous les champs';
}

checkLogin();