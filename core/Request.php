<?php
namespace Core;

/**
 * Récupère l'URL entrée par l'utilisateur
 */
class Request {
    
    /**
     * URL entrée
     */
    public $url;
    
    /**
     * Fonction principale de la classe
     * 
     * @return void
     */
    public function __construct() {
        $this->url = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : '/';
    }
}