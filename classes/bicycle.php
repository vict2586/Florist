<?php

require_once __DIR__.'/../src/length.php';

class Bicycle {

  public $brand;
  public $model;
  public $year;
  public $category;
  public $color;
  public $description;
  public $gender;
  public $price;
  protected $weight_kg;
  protected $condition_id;

  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];

  public const GENDERS = ['Mens', 'Womens', 'Unisex'];

  protected const CONDITION_OPTIONS = [
    1 => 'Beat up',
    2 => 'Decent',
    3 => 'Good',
    4 => 'Great',
    5 => 'Like New'
  ];
  protected const KG_TO_POUND_RATE = 2.2046226218;

  public function __construct($args=[]) {
    $this->brand = $args['brand'] ?? '';
    $this->model = $args['model'] ?? '';
    $this->year = $args['year'] ?? '';
    $this->category = $args['category'] ?? '';
    $this->color = $args['color'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->gender = $args['gender'] ?? '';
    $this->price = $args['price'] ?? 0;
    $this->weight_kg = $args['weight_kg'] ?? 0.0;
    $this->condition_id = $args['condition_id'] ?? 3;
  }

  public function weight_kg() {
    return number_format($this->weight_kg, 2) . ' kg';
  }

  public function set_weight_kg($value) {
    $this->weight_kg = floatval($value);
  }

  public function weight_lbs() {
    $weight_lbs = floatval($this->weight_kg) * self::KG_TO_POUND_RATE;
    return number_format($weight_lbs, 2) . ' lbs';
  }

  public function set_weight_lbs($value) {
    $this->weight_kg = floatval($value) / self::KG_TO_POUND_RATE;
  }

  public function condition() {
    if($this->condition_id > 0) {
      return self::CONDITION_OPTIONS[$this->condition_id];
    } else {
      return "Unknown";
    }
  }

  // --------------- this is just testing how we can convert a number with the converter 
  public function set_weight_length_test($value) {
    $length = New Length(floatval($value));
    $weight_inches = $length->convert();
    return number_format($weight_inches, 2) . ' inches';
  }
  // --------------- 

  /* AMR Sep 2022 */
  public function __toString() {    

    return <<<BIKE
      <tr>
        <td>{$this->brand}</td>
        <td>{$this->model}</td>
        <td>{$this->year}</td>
        <td>{$this->category}</td>
        <td>{$this->gender}</td>
        <td>{$this->color}</td>
        <td>{$this->set_weight_length_test($this->weight_kg)}</td>
        <td>{$this->condition()}</td>
        <td>\${$this->price}</td>
      </tr>
    BIKE;
  }
}
// --------------- this is just testing how we can convert a number with the converter 
// $Bike = New Bicycle();
// echo $Bike->set_weight_length_test(30);
// --------------- 
?>
