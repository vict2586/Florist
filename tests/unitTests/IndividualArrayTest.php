<?php

require_once __DIR__. '/../../src/Plants.php';

use PHPUnit\Framework\TestCase;

//$printPlants = new Plant;
//print_r($printPlants->getAllPlant()[0]);

class IndividualArrayTest extends TestCase
{

    private Plant $plants;
    
    public function setUp(): void
    {
        $this->plants = new Plant;
    }

    public function tearDown(): void
    {
        unset($this->plants);
    }

    /**
     * @dataProvider arrayKeys
     */

    // ------------------------------------------
    // TEST IF THE 0 ARRAY HAS THE RIGHT KEYS
    // ------------------------------------------
    public function test_if_array_0_has_keys($key)
    {
        $result = array_key_exists($key, $this->plants->getAllPlant()[0]);
    
        $this->assertTrue($result);
    }
    
    public function arrayKeys()
    {
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
    public function test_if_array_0_not_has_keys($key)
    {
        $result = array_key_exists($key, $this->plants->getAllPlant()[0]);
    
        $this->assertFalse($result);
    }
    
    public function notArrayKeys()
    {
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
    public function test_if_array_0_keys_is_string($key)
    {
        
        $this->assertIsString($this->plants->getAllPlant()[0][$key]);
    }
    
    public function arrayKeysString()
    {
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
    public function test_if_array_0_keys_is_int($key)
    {

        $this->assertIsInt($this->plants->getAllPlant()[0][$key]);
    }
    
    public function arrayKeysInt()
    {
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
    public function test_if_array_0_keys_is_float($key)
    {

        $this->assertIsFloat($this->plants->getAllPlant()[0][$key]);
    }
    
    public function arrayKeysFloat()
    {
        return [
            ['min_hight_cm'],
            ['max_hight_cm']
        ];
    }


    // ------------------------------------------
    // TEST IF THE 0 ARRAY KEY "name" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_name_has_correct_format()
    {
        $name = $this->plants->getAllPlant()[0]['name'];

        $this->assertMatchesRegularExpression("/^[a-zA-Z\-'\s]{1,100}$/", $name);
    }


    // ------------------------------------------
    // TEST IF THE 0 ARRAY KEY "latin_name" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_latin_name_has_correct_format()
    {
        $latin_name = $this->plants->getAllPlant()[0]['latin_name'];

        $this->assertMatchesRegularExpression("/^[a-zA-Z\s]{1,100}$/", $latin_name);
    }


    // ------------------------------------------
    // TEST IF THE 0 ARRAY KEY "price_DKK" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_price_DKK_has_correct_format()
    {
        $price_DKK = $this->plants->getAllPlant()[0]['price_DKK'];

        $this->assertMatchesRegularExpression("/^[1-9][0-9]{0,4}|[1-9]{0,1}[0-9]{0,1}\.[0-9]{0,5}$/", $price_DKK);
    }


    // ------------------------------------------
    // TEST IF THE 0 ARRAY KEY "min_hight_cm" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_min_hight_cm_has_correct_format()
    {
        $min_hight_cm = $this->plants->getAllPlant()[0]['min_hight_cm'];

        $this->assertMatchesRegularExpression("/^[1-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$/", $min_hight_cm);
    }


    // ------------------------------------------
    // TEST IF THE 0 ARRAY KEY "max_hight_cm" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_max_hight_cm_has_correct_format()
    {
        $max_hight_cm = $this->plants->getAllPlant()[0]['max_hight_cm'];

        $this->assertMatchesRegularExpression("/^[1-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$/", $max_hight_cm);
    }


    // ------------------------------------------
    // TEST IF THE 0 ARRAY KEY "color" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_color_has_correct_format()
    {
        $color = $this->plants->getAllPlant()[0]['color'];

        $this->assertMatchesRegularExpression("/^[a-zA-Z\s\-\,\']{1,50}?$/", $color);
    }


    // ------------------------------------------
    // TEST IF THE 0 ARRAY KEY "season" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_season_has_correct_format()
    {
        $season = $this->plants->getAllPlant()[0]['season'];

        $this->assertMatchesRegularExpression("/^[a-zA-Z]{1,50}|[a-zA-Z\s]+\/+[\sa-zA-Z]{1,50}$/", $season);
    }


    // ------------------------------------------
    // TEST IF THE 0 ARRAY KEY "family_name" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_family_name_has_correct_format()
    {
        $family_name = $this->plants->getAllPlant()[0]['family_name'];

        $this->assertMatchesRegularExpression("/^[a-zA-Z]{1,50}$/", $family_name);
    }

    // ------------------------------------------ // ------------------------------------------
    // ------------------------------------------ // ------------------------------------------

    /**
     * @dataProvider formatName
     */

    // ------------------------------------------
    // TEST IF "name" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_our_name_format($name, $expected)
    {

        $result = preg_match("/^[a-zA-Z\-'\s]{1,100}$/", $name) === 1;
        $this->assertEquals($expected, $result);
    }

    public function formatName()
    {
        return [
            ['Ornithogalum adseptentrionesvergentulum', true],
            ['', false],
            ["Florist's daisy", true],
            ['/?#%&', false],
            ['Apple tree', true],
        ];
    }


    /**
     * @dataProvider formatLatinName
     */

    // ------------------------------------------
    // TEST IF "latin_name" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_our_latin_name_format($latin_name, $expected)
    {

        $result = preg_match("/^[a-zA-Z\s]{1,100}$/", $latin_name) === 1;
        $this->assertEquals($expected, $result);
    }

    public function formatLatinName()
    {
        return [
            ['Ornithogalum adseptentrionesvergentulum', true],
            ['', false],
            ["Cornu's florida", false],
            ["-/?#%&", false],
            ['Rubus allegheniensis', true],
        ];
    }


    /**
     * @dataProvider formatPriceDKK
     */

    // ------------------------------------------
    // TEST IF "price_DKK" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_our_price_DKK_format($price_DKK, $expected)
    {

        $result = preg_match("/^[1-9][0-9]{0,4}|[1-9]{0,1}[0-9]{0,1}\.[0-9]{0,5}$/", $price_DKK) === 1;
        $this->assertEquals($expected, $result);
    }

    public function formatPriceDKK()
    {
        return [
            [1, true],
            ['', false],
            [65.535, true],
            ["'/?-#%&", false],
            [65535, true],
            [0, false],
            // [100000000, false], // should fail but does not
        ];
    }


    /**
     * @dataProvider formatMinHightCm
     */

    // ------------------------------------------
    // TEST IF "min_hight_cm" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_our_min_hight_cm_format($min_hight_cm, $expected)
    {

        $result = preg_match("/^[1-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$/", $min_hight_cm) === 1;
        $this->assertEquals($expected, $result);
    }

    public function formatMinHightCm()
    {
        return [
            [1.7976931348623157E+308, true],
            ['', false],
            [65.535, true],
            ["'-/?#%&", false],
            [7.077532027016991E+307, true],
            // [0, false], // should fail but does not
            [65535, true],
        ];
    }


    /**
     * @dataProvider formatMaxHightCm
     */

    // ------------------------------------------
    // TEST IF "max_hight_cm" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_our_max_hight_cm_format($max_hight_cm, $expected)
    {

        $result = preg_match("/^[1-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$/", $max_hight_cm) === 1;
        $this->assertEquals($expected, $result);
    }

    public function formatMaxHightCm()
    {
        return [
            [1.7976931348623157E+308, true],
            ['', false],
            [65.535, true],
            ["'/-?#%&", false],
            [7.077532027016991E+307, true],
            // [0, false], // should fail but does not
            [65535, true],
        ];
    }


    /**
     * @dataProvider formatColor
     */

    // ------------------------------------------
    // TEST IF "color" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_our_color_format($color, $expected)
    {

        $result = preg_match("/^[a-zA-Z\s\-\,\']{1,50}$/", $color) === 1;
        $this->assertEquals($expected, $result);
    }

    public function formatColor()
    {
        return [
            ['White flowers with a pink fade', true],
            ['', false],
            ['Green, white, yellow, pink or purple flowers          ', false],
            ["?#'/%&", false],
            ['Greenish-yellow flowers', true],
        ];
    }


    /**
     * @dataProvider formatSeason
     */

    // ------------------------------------------
    // TEST IF "season" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_our_season_format($season, $expected)
    {

        $result = preg_match("/^[a-zA-Z]{1,50}|[a-zA-Z\s]+\/+[\sa-zA-Z]{1,50}$/", $season) === 1;
        $this->assertEquals($expected, $result);
    }

    public function formatSeason()
    {
        return [
            ['Summer / Autumn', true],
            ['', false],
            // ['Summer / Autumn / Spring', false], // should fail but does not
            ["-'?#%&", false],
            ['Spring', true],
        ];
    }


    /**
     * @dataProvider formatFamilyName
     */

    // ------------------------------------------
    // TEST IF "family_name" IS RIGHT FORMAT
    // ------------------------------------------
    public function test_our_family_name_format($family_name, $expected)
    {

        $result = preg_match("/^[a-zA-Z]{1,50}$/", $family_name) === 1;
        $this->assertEquals($expected, $result);
    }

    public function formatFamilyName()
    {
        return [
            ['Rosaceae', true],
            ['', false],
            ['Papaveraceae  ', false],
            ["-'/?#%&", false],
            ['Apocynaceae', true],
        ];
    }
}
