<?php
/*
Simplifie l'ajout de routes avec AltoRouter

Méthode de construction de l'objet dispo sur https://www.grafikart.fr/tutoriels/routeur-php-1163
*/

namespace App;
use AltoRouter;

class Router {
    
    /**
     * @var mixed dossier contenant la page demandée
     */
    protected $viewPath;        
    /**
     * @var mixed réf vers la classe parente
     */
    protected $router;
    
    public function __construct(string $viewPath = null) {
        $this->viewPath = $viewPath;
        $this->router = new AltoRouter();
    }
    
    /**
     * Paramètre la route vers la page demandée
     * @param  mixed $url  affiché sur le navigaeur
     * @param  mixed $view  le dossier contenant la page
     * @param  mixed $name  id de réference pour la methode url()
     * @return self
     */
    public function get(string $url, string $view, ?string $name = null): self {
        $this->router->map('GET', $url, $view, $name);
        return $this;
    }
    
    /**
     * Redirige les liens internes du site
     * @param  mixed $name  lien vers la methode get()
     * @param  mixed $params
     * @return string
     */
    public function url(string $name, ?array $params = []): string {
        return $this->router->generate($name, $params);        
    }
    
    /**
     * Affiche la page demandée
     * @return self
     */
    public function run(): self {
        $match = $this->router->match();
        $view = $match['target'];        
        $router = $this;
        ob_start();
        require $this->viewPath . DIRECTORY_SEPARATOR . $view;
        $bodyContent = ob_get_clean();
        $subPath = substr($view, 0, strpos($view, '/'));
        require $this->viewPath . DIRECTORY_SEPARATOR . $subPath . DIRECTORY_SEPARATOR . 'default.php';
        return $this;
    }
}