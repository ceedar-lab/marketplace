<?php
namespace App\API;
use App\API\CryptoCompare;

/*
Constructeur de l'article "TAUX DE CHANGE"
*/
class CreateArticle {
        
    /**
     * L'abréviation de la crypto qui sert de référence
     */
    protected $coin;    
    /**
     * Passerelle vers CryptoCompare
     */
    protected $bridge;    
    /**
     * Tableau de correspondance abréviations / noms
     */
    protected $names = [
        'EUR' => 'Euro',
        'USD' => 'Dollar américain',
        'GBP' => 'Livre sterling',
        'JPY' => 'Yen japonnais',
        'CAD' => 'Dollar canadien',
        'CHF' => 'Franc suisse',
        'BTC' => 'Bitcoin',
        'ETH' => 'Ethereum',
        'LTC' => 'Litecoin',
        'XMR' => 'Monero'];
        
    /**
     * __construct
     *
     * @param  mixed $coin / Crypto qu'on souhaite afficher dans la partie "TAUX DE CHANGE"
     */
    public function __construct(string $coin) {
        $this->coin = $coin;
        $this->bridge = new CryptoCompare($coin);
    }
        
    /**
     * Constuit chaque div de la section "TAUX DE CHANGE"
     *
     * @param  mixed $currency / Les devises qu'on souhaite récupérer
     */
    public function create(string ...$currency) {
        $bridge = $this->bridge;
        $data = $bridge->getRate(...$currency);
        $evol = $this->bridge->evolution(...$currency);

        // Le titre : nom de la crypto 
        echo '<h2>'.$this->names[$this->coin].' ('.$this->coin.')</h2>';
        echo '<div><ul>';

        // La nom de la devise et son drapeau
        $arg = func_get_args();
        foreach ($arg as $k) {
            echo '<li><img class="-flag" src="'.IMAGES.DS.'flag_'.$k.'.png" alt="currency flag">'.$this->names[$k].' ('.$k.')</li>';
        }
        echo '</ul><ul>';
        
        // La valeur de la devise
        foreach($arg as $key) {
            if ($evol[$key] == 1) {
                echo '<li class="-increase">'.$data[$key].'</li>';
            } elseif ($evol[$key] == -1) {
                echo '<li class="-decrease">'.$data[$key].'</li>';
            } else {
                echo '<li class="-equal">'.$data[$key].'</li>';
            }
        }       
        echo '</ul></div>';
        echo '<img src="<?= IMAGES ?>icon_separator_horizontal.png" alt"separateur">';
    }
}