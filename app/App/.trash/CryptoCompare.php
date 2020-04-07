<?php
namespace App\API;

/*
CryptoCompare
 
Utilise l'API du site https://min-api.cryptocompare.com/

Permet d'afficher le taux de change d'une devise en fonction du cours d'une cryptomonnaie
Devises supportées :                                Cryptos supportées :
  x Euro : 'EUR'                                      x Bitcoin : 'BTC'
  x Dollar US : 'USD'                                 x Ethereum : 'ETH'
  x Livre Sterling : 'GBP'                            x Litecoin : 'LTC'
  x Yen Japonais : 'JPY'                              x Monero : 'XMR'
  x Dollar Canadien : 'CAD'
  x Franc Suisse : 'CHF'
*/
class CryptoCompare {
        
    /**
     * string / Crypto qu'on va convertir
     */
    protected $coin;    
    /**
     * array / Contient le JSON décodé de l'API
     */
    protected $data;    
    /**
     * array / Taux de change récents
     */
    protected $values = [];    
    /**
     * array / Indices de croissance des devises : 1 = le taux grimpe, -1 = il diminue, 0 = il se maintient
     */
    protected $evolution = [];
        
   
    /**
     * __construct
     *
     * @param string $coin / La crypto qu'on va convertir
     */
    public function __construct(string $coin) {
        $this->coin = $coin;
    }
           
    /**
     * Connection à l'API et enregistrement du JSON
     *
     * @return string
     */
    public function init() {
        // Archivage du taux actuel avant son remplacement par un taux plus récent. Servira à déterminer si le taux grimpe ou diminue
        copy(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'data/rates.json', dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'data/last_rates.json');
       
        $curl = curl_init('https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH,LTC,XMR&tsyms=EUR,USD,GBP,JPY,CAD,CHF');
        curl_setopt_array($curl, [
            CURLOPT_CAINFO => dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'data/cryptocompare.cer',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 1
        ]);
        $data = curl_exec($curl);
        if ($data !== false && curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200) {
            file_put_contents(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'data/rates.json', $data);
            return $this->data = $data;
        }            
    }
       
    /**
     * Renvoie le taux de change le plus récent
     *
     * @param  mixed $currency / Les devises qu'on souhaite récupérer
     * @return array
     */
    public function getRate(...$currency): array {
        $data = file_get_contents(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'data/rates.json');
        $data = json_decode($data, true);        
        $cur = func_get_args();
        foreach ($cur as $k) {
            $values[$k] = $data[$this->coin][$k]; 
        }
        return $this->values = $values;
    }
   
    /**
     * Compare le taux récent avec celui archivé. Renvoie un int positif si l'évolution est croissant et vice versa. 0 dans le cas où il stagne.
     *
     * @param  mixed $currency / Les devises qu'on souhaite récupérer
     * @return array
     */
    public function evolution(...$currency): array {
        $evolution = $this->evolution;
        $values = $this->values;
        $last_values = file_get_contents(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'data/last_rates.json');
        $last_values = json_decode($last_values, true);
        $cur = func_get_args();
        foreach ($cur as $k) {
            $value = $values[$k];
            $last_value = $last_values[$this->coin][$k];
            if ($value > $last_value) {
                $evolution[$k] = 1;
            } elseif ($value < $last_value) {
                $evolution[$k] = -1;
            } else {
                $evolution[$k] = 0;
            }
        }
        return $this->evolution = $evolution;
    }
}