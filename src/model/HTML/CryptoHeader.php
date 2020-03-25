<?php
/**
 * Construit l'affichage du taux de change crypto/devise au dessus de la nav barre 
 */

namespace App\HTML;
use App\CoinConversion;

class CryptoHeader {
    
    /**
     * L'abréviation de la crypto qui sert de référence
     */
    protected $coin;    
    /**
     * Passerelle vers CoinConversion
     */
    protected $bridge;
    
    /**
     * __construct
     *
     * @param  mixed $coin / Crypto que l'utilisateur a défini
     */
    public function __construct(string $coin) {
        $this->coin = $coin;
        $this->bridge = new CoinConversion($coin);
    }
    
    /**
     * Construit la banière "taux de change" avec affichage de la croissance
     *
     * @param  mixed $currency / Les devises qu'on souhaite récupérer
     */
    public function showExchangeRate(string ...$currency) {
        $data = $this->bridge->getRate(...$currency);
        $evol = $this->bridge->evolution(...$currency);
        
        // Flèche qui montre la croissance de la devise / affichage de la valeur
        $arg = func_get_args();
        foreach ($arg as $k) {
            echo '<li>';
            switch ($evol[$k]) {
                case -1:
                    echo '<img src="images\icon_arr_decrease.png" alt="red arrow">';
                    break;
                case 1:
                    echo '<img src="images\icon_arr_increase.png" alt="green arrow">';
                    break;
                default:
                    echo '<img src="images\icon_arr_equal.png" alt="grey arrow">';
            }
            echo $k . ' ' . $data[$k] . '</li>';
        }
    }
}
