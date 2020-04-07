<?php
namespace Core;

/**
 * Plan du site. Dirige l'utilisateur vers la page demandée en fonction de l'URL
 */
class Router {
    
    /**
     * URL indexée sous forme de tableau
     */
    public $request;    
    /**
     * Ensemble des routes vers les différentes pages du site
     */
    static public $routes = [];
        
    /**
     * Parse l'URL entrée par l'utilisateur
     *
     * @param  mixed $request / url entrée
     */
    public function __construct(string $request=null) {
        $request = trim($request, '/');
        $request = explode('/', $request);
        $request = [
            'controller' => (!empty ($request[0])) ? $request[0] : 'access',
            'action' => (!empty ($request[1])) ? $request[1] : 'login',
            'params' => array_slice($request, 2)
        ];
        return $this->request = $request;
    }
    
    /**
     * Renvoie un tableau avec le mappage de toutes les pages du site
     *
     * @return array
     */
    public function map(): array {
        // On récupère les noms de tous les fichiers *Controller.php
        $pattern = '/Controller\.php$/';
        $controller_files = scandir(CONTROLLER);
        // On parse ces noms(controllers) et on recupère leurs méthodes(actions)
        foreach ($controller_files as $class) {
            if (preg_match($pattern, $class)) {
                $controller = strtolower(str_replace('Controller.php', '', $class));
                $class = str_replace([$class, '.php'], ['App\\Controller\\'.$class, ''], $class);
                $this::$routes[$controller] = get_class_methods($class);
            }
        }
        return $this::$routes;
    }
    
    /**
     * Permet les redirections internes du site
     *
     * @return void
     */
    public function url(string $controller, string $action, $params=null) {
        $routes = $this::$routes;
        if (array_key_exists($controller, $routes)) {
            if (in_array($action, $routes[$controller])) {                
                return $_SERVER['REQUEST_URI'] = DS.$controller.DS.$action;
            } else {
                $this->error();
            }
        } else {
            $this->error();
        }
    }

    /**
     * Permet de renvoyer une erreur 404 en cas d'URL inconnue
     *
     * @return void
     */
    static public function error() {
        require VIEW.DS.'error/404.php';
    }
}