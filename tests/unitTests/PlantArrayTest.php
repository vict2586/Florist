<?php

require_once __DIR__. '/../../src/Plants.php';

use PHPUnit\Framework\TestCase;

//$printPlants = new Plant;
//print_r($printPlants->getAllPlant());

class PlantArrayTest extends TestCase
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

    // ------------------------------------------
    // TEST IF WE RECIEVE AN ARRAY OF ARRAYS
    // ------------------------------------------
    public function testIfArrayOfArrays()
    {
        $result = is_array($this->plants->getAllPlant());

        $this->assertTrue($result);
    }
    
    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 0 AS AN ARRAY
    // ------------------------------------------
    public function testIfArray0IsArray()
    {
        $result = is_array($this->plants->getAllPlant()[0]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 1 AS AN ARRAY
    // ------------------------------------------
    public function testIfArray1IsArray()
    {
        $result = is_array($this->plants->getAllPlant()[1]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 2 AS AN ARRAY
    // ------------------------------------------
    public function testIfArray2IsArray()
    {
        $result = is_array($this->plants->getAllPlant()[2]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 3 AS AN ARRAY
    // ------------------------------------------
    public function testIfArray3IsArray()
    {
        $result = is_array($this->plants->getAllPlant()[3]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 4 AS AN ARRAY
    // ------------------------------------------
    public function testIfArray4IsArray()
    {
        $result = is_array($this->plants->getAllPlant()[4]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 5 AS AN ARRAY
    // ------------------------------------------
    public function testIfArray5IsArray()
    {
        $result = is_array($this->plants->getAllPlant()[5]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 6 AS AN ARRAY
    // ------------------------------------------
    public function testIfArray6IsArray()
    {
        $result = is_array($this->plants->getAllPlant()[6]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 7 AS AN ARRAY
    // ------------------------------------------
    public function testIfArray7IsArray()
    {
        $result = is_array($this->plants->getAllPlant()[7]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 8 AS AN ARRAY
    // ------------------------------------------
    public function testIfArray8IsArray()
    {
        $result = is_array($this->plants->getAllPlant()[8]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 9 AS AN ARRAY
    // ------------------------------------------
    public function testIfArray9IsArray()
    {
        $result = is_array($this->plants->getAllPlant()[9]);

        $this->assertTrue($result);
    }
}
