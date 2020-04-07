<?php
namespace App\Controller;
use Core;
use Core\Router;

/**
 * Gère les pages d'accès au site permettant soit de se connecter, soit de s'enregister
 */
class AccessController extends Core\Controller {

    public function login($params = null) {
        $controller = $this->render();
        /* $route = new Router;
        $route->url('access', 'login'); */
    }

    public function register($params = null) {
        $controller = $this->render();
    }

} 