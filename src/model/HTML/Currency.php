<?php
namespace App\HTML;
use App\BTCExchangeRate;

class Currency {

    protected $currency;
    protected $exchange;

    public function __construct(string $currency) {
        $this->currency = $currency;
        $this->exchange = new BTCExchangeRate($currency);
    }

    public function showExchangeRate() {
        echo '<li>';
        switch ($this->exchange->evolution()) {
            case -1:
            echo '<img src="images\icon_arr_decrease.png" alt="red arrow">';
            break;
            case 1:
            echo '<img src="images\icon_arr_increase.png" alt="green arrow">';
            break;
            default:
            echo '<img src="images\icon_arr_equal.png" alt="grey arrow">';                                
        }
        echo $this->currency . ' ' . $this->exchange->getCurrentRate() . '</li>';
    }

    public function stockRate() {
        $this->exchange->stockRate();
    }    
}