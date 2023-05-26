<?php
    
    require_once __DIR__ . '/../info/info.php';
    
class Currency
{
        
    const BASE_URL = 'https://api.currencyapi.com/v3/';
    const API_KEY = apiKey::CURRENCY_API_KEY;

    private function apiCall(string $url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/json']);
        $response = json_decode(curl_exec($ch), true);
        curl_close($ch);

        return $response;
    }

    private function extractCurrency($currency)
    {
        return [$currency['code'], $currency['name']];
    }

    public function getCurrencies()
    {
        $url = self::BASE_URL . 'currencies?apikey=' . self::API_KEY;

        $response = $this->apiCall($url);

        // array_values turns the associative array into a normal array, so that it can be processed by array_map.
        // array_filter eliminates null values.
        $currencies = array_filter(array_values($response['data']));
        return array_map(array($this, 'extractCurrency'), $currencies);
    }

    /**
     * Description of what this module is doing.
     */
    public function convert(float $amount, string $baseCurrency = 'DKK', string $destinationCurrency = 'EUR')
    {
        $url = self::BASE_URL . 'latest?apikey=' . self::API_KEY . '&base_currency=' . $baseCurrency;

        $response = $this->apiCall($url);

        if (isset($response['errors'])) {
            return $response['message'];
        }
            
        if (!array_key_exists($destinationCurrency, $response['data'])) {
            return 'Destination currency not found';
        } 
        // returns a number with 2 decimals (0.00)
        return round($amount * $response['data'][$destinationCurrency]['value'], 2);
    }
    
}


    // -------------- testing that the api works
    // $currency = New Currency;
    // echo $currency->convert(30);
