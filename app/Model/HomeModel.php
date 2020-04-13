<?php
namespace App\Model;
use Core\Model;

/**
 * Requêtes de la page Home vers la BDD
 */
class HomeModel extends Model {
    
    /**
     * Recupère les 10 derniers articles ajoutés
     *
     * @return void
     */
    public function getFeatured() {
        $price = $this->selectAll('id, price_tax_free', 'items', 'ORDER BY id DESC LIMIT 10 OFFSET 0');
        $picture = $this->selectAll('picture_1', 'pictures', 'ORDER BY item_id DESC LIMIT 10 OFFSET 0');        
        return array_replace_recursive($price, $picture);
    }
}
