<?php
namespace App\HTML;
use App\Model\HomeModel;
use Config\Config;

/**
 * Code HTML pour afficher les 10 derniers articles ajoutés sur la site sur la page d'accueil
 */
class RecentlyAdded {
    
    /**
     * Code HTML 
     */
    public $html;

    public function __construct() {
        // On fait appelle à HomeModel qui récupère les données dans la BDD
        $req = new HomeModel;
        $req = $req->getFeatured();
        // Ecriture du HTML
        $html = '<div class="b-articleFeatured__content -column"><ul class="-row">';
        for ($i = 0; $i < 5; $i++) {
            $html .= '<li><a href="#"><img class="b-articleFeatured__e-item" src="' .IMAGES.DS. 'items/' .$req[$i]['picture_1']. '-s500.jpg" alt="photo de l\'article"></a></li>';
        }
        $html .= '</ul><ul class="-row">';
        for ($i = 0; $i < 5; $i++) {
            $html .= '<li><a href="#">' .number_format(round($req[$i]['price_tax_free']*Config::$tva, 2), 2). ' EUR</a></li>';
        }
        $html .= '</ul></div>';
        $html .= '<div class="b-articleFeatured__content -column"><ul class="-row">';
        for ($i = 5; $i < 10; $i++) {
            $html .= '<li><a href="#"><img class="b-articleFeatured__e-item" src="' .IMAGES.DS. 'items/' .$req[$i]['picture_1']. '-s500.jpg" alt="photo de l\'article"></a></li>';
        }
        $html .= '</ul><ul class="-row">';
        for ($i = 5; $i < 10; $i++) {
            $html .= '<li><a href="#">' .number_format(round($req[$i]['price_tax_free']*Config::$tva, 2), 2). ' EUR</a></li>';
        }
        $html .= '</ul></div>';
        return $this->html = $html;
    }
}