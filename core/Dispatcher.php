<?php
namespace Core;

use Core\Router;

/**
 * Le dispatcher récupère la requête et la traite. Il appelle ensuite de controller adequat ou renvoie une erreur si la page demandée n'existe pas
 */
class Dispatcher {

    private $request;
    private $router = false;
    
    /**
     * Fonction principale de la classe
     *
     * @return void
     */
    public function __construct() {
        // Initialisation du mappage du site
        if ($this->router === false) {
            $router = new Router();
            $router->map();
            $this->router = true;
        }
        // On récupère l'URL et on la traite
        $this->request = new Request();
        $this->request = new Router($this->request->url);
        $this->request = $this->request->request;
        // On appelle soit le controlleur soit une page d'erreur
        $controller = $this->loadController();
        $action = $this->request['action'];        
        if (class_exists($controller) && in_array($action, get_class_methods($controller))) {
            call_user_func_array(array(new $controller, $action), $this->request['params']);
        } else {
            Router::error(); 
        }        
    }
       
    /**
     * Permet de paramètrer le nom du controller qui va être appelé
     *
     * @return string / Controller et son namespace
     */
    private function loadController():string {
        $name = 'App\Controller'.DS.ucfirst($this->request['controller']).'Controller';
        return $name;
    }
}