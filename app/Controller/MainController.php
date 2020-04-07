<?php
namespace App\Controller;
use Core;

/**
 * Gère le contenu principal du site, page d'accueil, messagerie, listing d'articles etc...
 */
class MainController extends Core\Controller {

    public function home($params = null) {
        $controller = $this->render();
    }
} 