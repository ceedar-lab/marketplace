<?php
/*
BTCExchangeRate
 
Utilise l'API du site https://www.blockchain.com/api/exchange_rates_api

Permet d'afficher le taux de change d'une devise en fonction du cours du bitcoin
Devises principales :
  x Euro : 'EUR'
  x Dollar US : 'USD'
  x Livre Sterling : 'GBP'
  x Yen Japonais : 'JPY'
  x Plein d'autres !
*/

namespace App;

class BTCExchangeRate {
        
    /**
     * @var string Devise qu'on va comparer au Bitcoin
     */
    protected $currency;    
    /**
     * @var array contient le JSON décodé avant traitement
     */
    protected $data;    
    /**
     * @var float contient les dernières valeurs du taux de change stockées dans la bdd
     */
    protected $stocked_rate;
    /**
     * @var float contient le taux de change en direct
     */
    protected $current_rate;
        
    /**
     * On paramètre la devise qu'on souhaite échanger ici
     * @param string $currency
     */
    public function __construct(string $currency) {
        $this->currency = $currency;
    }
        
    /**
     * Connection à l'API, decodage du JSON et retour d'un array 
     * @return array $data
     */
    public function init(): array {
        $curl = curl_init('https://blockchain.info/ticker');
        curl_setopt_array($curl, [
            CURLOPT_CAINFO => dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'data/blockchain_info.cer',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 1
        ]);
        $data = curl_exec($curl);
        if ($data !== false && curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200) {
            $data = json_decode($data, true);
            return $this->data = $data;
        }            
    }
    
    /**
     * On stoque les dernières valeurs des taux pour les comparer plus tard au taux en direct afin de voir l'évolution
     * @return void
     */
    public function stockRate() {
        $data = $this->init();
        foreach($data as $key => $valeur) {
            $last_rate[$key]['last'] = $data[$key]['15m'];
        }
        file_put_contents(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'data/btc_exchange_rate.json', json_encode($last_rate));
    }
    
    /**
     * On recupère les dernières valeurs du taux de change stockées dans la bdd
     * @return float $last_rate
     */
    public function getStockedRate(): float {
        $last_rate = file_get_contents(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'data/btc_exchange_rate.json');
        $last_rate = json_decode($last_rate, true);
        return $this->last_rate = $last_rate[$this->currency]['last'];
    }
    
    /**
     * Renvoie le taux de change en direct
     * @return float $current_rate
     */
    public function getCurrentRate(): float {
        $data = $this->init();
        return $this->current_rate = $data[$this->currency]['15m'];
    }
    
    /**
     * Compare les derniers taux à ceux en direct. Renvoie un int positif si l'évolution est croissant et vice versa 
     * @return int
     */
    public function evolution(): int {
        $stocked_rate = $this->getStockedRate($this->currency);
        $current_rate = $this->getCurrentRate($this->currency);
        if ($current_rate > $stocked_rate) {
            return 1;
        } elseif ($current_rate < $stocked_rate) {
            return -1;
        } else {
            return 0;
        }
    }
}