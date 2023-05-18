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
    public function testDBStreetHasCorrectFormat(){
        $name = $this->plants->getAllPlant()[0]['name'];

        $this->assertMatchesRegularExpression("/^[a-zA-Z ]*$/", $name);
    }

}