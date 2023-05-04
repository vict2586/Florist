<?php

class Plant {

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
        $this->family = $args['family'] ?? '';
        $this->price_in_DKK = $args['price_in_DKK'] ?? '';
        $this->color = $args['color'] ?? '';
        $this->season = $args['season'] ?? '';
        $this->min_height_in_cm = $args['min_height_in_cm'] ?? 0;
        $this->max_height_in_cm = $args['max_height_in_cm'] ?? 0;
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

}

?>
  