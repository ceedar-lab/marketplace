<?php
namespace Core;
use App\Model;

/**
 * Controller général parent des App/Controller
 */
class Controller {
    
    /**
     * Permet de renvoyer une page en fonction de l'url 
     *
     * @return void
     */
    protected function render() {
        // Permet de récuperer le nom de la class enfant
        $controller = explode(DS, get_called_class());
        $controller = strtolower(substr($controller[2], 0, -10));
        // Permet de récuperer le nom de la méthode de la class enfant qui a appelé le render
        $action = debug_backtrace()[1]['function'];
        ob_start();        
        require VIEW.DS.$controller.DS.$action.'.php';
        $bodyContent = ob_get_clean();
        require VIEW.DS.$controller.DS.'default.php';
    }
}