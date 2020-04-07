<?php
namespace App\Controller;
use Core;

/**
 * Gère le contenu principal du site, page d'accueil, messagerie, listing d'articles etc...
 */
class AccountController extends Core\Controller {

    public function infos($params = null) {
        $controller = $this->render();
    }
} 