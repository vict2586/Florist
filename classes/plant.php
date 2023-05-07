<?php

require_once '../Florist/src/Plants.php';
//require_once '../src/Plants.php';

class allPlant {

    public function setPlant(): void {
        $Plants = new Plant;
        $Plants = $Plants->getAllPlant();
    }

    public $name;
    public $latin_name;
    public $family;
    public $price_in_DKK;
    public $color;
    public $season;
    protected $min_height_in_cm;
    protected $max_height_in_cm;

    public function __construct($args=[]) {
        $this->name = $args['name'] ?? '';
        $this->latin_name = $args['latin_name'] ?? '';
        $this->family = $args['family_name'] ?? '';
        $this->price_in_DKK = $args['price_DKK'] ?? '';
        $this->color = $args['color'] ?? '';
        $this->season = $args['season'] ?? '';
        $this->min_height_in_cm = $args['min_hight_cm'] ?? 0;
        $this->max_height_in_cm = $args['max_hight_cm'] ?? 0;
    }

    public function height_cm() {
        return number_format($this->min_height_in_cm, 2) . ' - ' . number_format($this->max_height_in_cm, 2) . ' cm';
    }

    public function set_min_in_height_cm($value) {
        $this->min_height_in_cm = floatval($value);
    }

    public function set_max_in_height_cm($value) {
        $this->max_height_in_cm = floatval($value);
    }

    public function __toString() {    

        return <<<PLANT
          <tr>
            <td>{$this->name}</td>
            <td>{$this->latin_name}</td>
            <td>{$this->family}</td>
            <td>{$this->price_in_DKK}</td>
            <td>{$this->color}</td>
            <td>{$this->season}</td>
            <td>{$this->min_height_in_cm}</td>
            <td>{$this->max_height_in_cm}</td>
          </tr>
        PLANT;
    }

}

?>
  