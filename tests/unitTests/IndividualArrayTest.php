<?php

require_once __DIR__. '/../../src/Plants.php';

use PHPUnit\Framework\TestCase;

$printPlants = new Plant;
print_r($printPlants->getAllPlant()[0]);

class IndividualArrayTest extends TestCase {

    private Plant $plants;
    
    public function setUp(): void {
        $this->plants = new Plant;
    }

    public function tearDown(): void {
        unset($this->plants);
    }

    /**
     * @dataProvider arrayKeys
     */

    // ------------------------------------------ 
    // TEST IF THE 0 ARRAY HAS THE RIGHT KEYS
    // ------------------------------------------ 
    public function test_if_array_0_has_keys($key) {
        $result = array_key_exists($key, $this->plants->getAllPlant()[0]);
    
        $this->assertTrue($result);
    }
    
    public function arrayKeys() {
        return [
            ['name'],  
            ['latin_name'], 
            ['price_DKK'],
            ['min_hight_cm'],
            ['max_hight_cm'],
            ['color'],
            ['season'],
            ['family_name']
        ];
    } 

    
    /**
     * @dataProvider notArrayKeys
     */

    // ------------------------------------------ 
    // TEST IF THE 0 ARRAY NOT HAS THE RIGHT KEYS
    // ------------------------------------------ 
    public function test_if_array_0_not_has_keys($key) {
        $result = array_key_exists($key, $this->plants->getAllPlant()[0]);
    
        $this->assertFalse($result);
    }
    
    public function notArrayKeys() {
        return [
            ['names'],   
            ['price_in_DKK'],
            ['min_height_in_cm'],
            ['max_height_in_cm'],
            ['colors'],
            ['family']
        ];
    } 


    /**
     * @dataProvider arrayKeysString
     */

    // ------------------------------------------ 
    // TEST IF THE 0 ARRAY KEYS IS STRING
    // ------------------------------------------ 
    public function test_if_array_0_keys_is_string($key) {
        
        $this->assertIsString($this->plants->getAllPlant()[0][$key]);
    }
    
    public function arrayKeysString() {
        return [
            ['name'],  
            ['latin_name'], 
            ['color'],
            ['season'],
            ['family_name']
        ];
    } 


    /**
     * @dataProvider arrayKeysInt
     */

    // ------------------------------------------ 
    // TEST IF THE 0 ARRAY KEYS IS INT
    // ------------------------------------------ 
    public function test_if_array_0_keys_is_int($key) {

        $this->assertIsInt($this->plants->getAllPlant()[0][$key]);
    }
    
    public function arrayKeysInt() {
        return [
            ['price_DKK']
        ];
    } 


    /**
     * @dataProvider arrayKeysFloat
     */

    // ------------------------------------------ 
    // TEST IF THE 0 ARRAY KEYS IS FLOAT
    // ------------------------------------------ 
    public function test_if_array_0_keys_is_float($key) {

        $this->assertIsFloat($this->plants->getAllPlant()[0][$key]);
    }
    
    public function arrayKeysFloat() {
        return [
            ['min_hight_cm'],
            ['max_hight_cm']
        ];
    } 


    // ------------------------------------------ 
    // TEST IF THE 0 ARRAY KEY "name" IS RIGHT FORMAT
    // ------------------------------------------ 
    public function test_name_has_correct_format(){
        $name = $this->plants->getAllPlant()[0]['name'];

        $this->assertMatchesRegularExpression("/^[a-zA-Z\-'\s]{1,100}$/", $name);
    }


    // ------------------------------------------ 
    // TEST IF THE 0 ARRAY KEY "latin_name" IS RIGHT FORMAT
    // ------------------------------------------ 
    public function test_latin_name_has_correct_format(){
        $latin_name = $this->plants->getAllPlant()[0]['latin_name'];

        $this->assertMatchesRegularExpression("/^[a-zA-Z\s]{1,100}$/", $latin_name);
    }


    // ------------------------------------------ 
    // TEST IF THE 0 ARRAY KEY "price_DKK" IS RIGHT FORMAT
    // ------------------------------------------ 
    public function test_price_DKK_has_correct_format(){
        $price_DKK = $this->plants->getAllPlant()[0]['price_DKK'];

        $this->assertMatchesRegularExpression("/^[1-9][0-9]{0,5}|6[1-9]\.[0-9]{0,5}|65.535$/", $price_DKK);
    }


    // ------------------------------------------ 
    // TEST IF THE 0 ARRAY KEY "min_hight_cm" IS RIGHT FORMAT
    // ------------------------------------------ 
    public function test_min_hight_cm_has_correct_format(){
        $min_hight_cm = $this->plants->getAllPlant()[0]['min_hight_cm'];

        $this->assertMatchesRegularExpression("/^[1-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$/", $min_hight_cm);
    }


    // ------------------------------------------ 
    // TEST IF THE 0 ARRAY KEY "max_hight_cm" IS RIGHT FORMAT
    // ------------------------------------------ 
    public function test_max_hight_cm_has_correct_format(){
        $max_hight_cm = $this->plants->getAllPlant()[0]['max_hight_cm'];

        $this->assertMatchesRegularExpression("/^[1-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$/", $max_hight_cm);
    }


    // ------------------------------------------ 
    // TEST IF THE 0 ARRAY KEY "color" IS RIGHT FORMAT
    // ------------------------------------------ 
    public function test_color_has_correct_format(){
        $color = $this->plants->getAllPlant()[0]['color'];

        $this->assertMatchesRegularExpression("/^[a-zA-Z\,'\s]{1,50}$/", $color);
    }


    // ------------------------------------------ 
    // TEST IF THE 0 ARRAY KEY "season" IS RIGHT FORMAT
    // ------------------------------------------ 
    public function test_season_has_correct_format(){
        $season = $this->plants->getAllPlant()[0]['season'];

        $this->assertMatchesRegularExpression("/^[a-zA-Z\w\s\/\s\w]{1,50}$/", $season);
    }


    // ------------------------------------------ 
    // TEST IF THE 0 ARRAY KEY "family_name" IS RIGHT FORMAT
    // ------------------------------------------ 
    public function test_family_name_has_correct_format(){
        $family_name = $this->plants->getAllPlant()[0]['family_name'];

        $this->assertMatchesRegularExpression("/^[a-zA-Z]{1,50}$/", $family_name);
    }

}