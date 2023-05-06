<?php

require_once '../Florist/src/Plants.php';
//require_once '../src/Plants.php';

class allPlant {

    private array $palnt = [];

    public function __construct(){
        $this->setPlant();
    }

    public function setPlant(): void {
        $Plants = new Plant;
        $Plants = $Plants->getAllPlant();

        $Family = new Plant;
        $Family = $Family->getAllFamily();
        
        $this->plant['name'] = $Plants['name'];
        $this->plant['latin_name'] = $Plants['latin_name'];
        $this->plant['family'] = $Family['name'];
        $this->plant['price_DKK'] = $Plants['price_DKK'];       
        $this->plant['color'] = $Plants['color'];        
        $this->plant['season'] = $Plants['season'];       
        $this->plant['min_hight_cm'] = $Plants['min_hight_cm'];        
        $this->plant['max_hight_cm'] = $Plants['max_hight_cm'];        

        unset($Plants);
    }

    public function getPlant(): array {
        return ['allArraysOfPlant' => $this->plant];
    }

}

//$printPlants = new allPlant;
//print_r($printPlants->getPlant());

?>
  