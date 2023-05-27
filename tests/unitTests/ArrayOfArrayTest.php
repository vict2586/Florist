<?php

require_once __DIR__. '/../../src/Plants.php';

use PHPUnit\Framework\TestCase;

//$printPlants = new Plant;
//print_r($printPlants->getAllPlant());

class ArrayOfArrayTest extends TestCase
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
    public function Test_if_array_of_arrays()
    {
        $result = is_array($this->plants->getAllPlant());

        $this->assertTrue($result);
    }
    
    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 0 AS AN ARRAY
    // ------------------------------------------
    public function test_if_array_0_is_array()
    {
        $result = is_array($this->plants->getAllPlant()[0]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 1 AS AN ARRAY
    // ------------------------------------------
    public function test_if_array_1_is_array()
    {
        $result = is_array($this->plants->getAllPlant()[1]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 2 AS AN ARRAY
    // ------------------------------------------
    public function test_if_array_2_is_array()
    {
        $result = is_array($this->plants->getAllPlant()[2]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 3 AS AN ARRAY
    // ------------------------------------------
    public function test_if_array_3_is_array()
    {
        $result = is_array($this->plants->getAllPlant()[3]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 4 AS AN ARRAY
    // ------------------------------------------
    public function test_if_array_4_is_array()
    {
        $result = is_array($this->plants->getAllPlant()[4]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 5 AS AN ARRAY
    // ------------------------------------------
    public function test_if_array_5_is_array()
    {
        $result = is_array($this->plants->getAllPlant()[5]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 6 AS AN ARRAY
    // ------------------------------------------
    public function test_if_array_6_is_array()
    {
        $result = is_array($this->plants->getAllPlant()[6]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 7 AS AN ARRAY
    // ------------------------------------------
    public function test_if_array_7_is_array()
    {
        $result = is_array($this->plants->getAllPlant()[7]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 8 AS AN ARRAY
    // ------------------------------------------
    public function test_if_array_8_is_array()
    {
        $result = is_array($this->plants->getAllPlant()[8]);

        $this->assertTrue($result);
    }

    // ------------------------------------------
    // TEST IF WE RECIEVE ARRAY NUMBER 9 AS AN ARRAY
    // ------------------------------------------
    public function test_if_array_9_is_array()
    {
        $result = is_array($this->plants->getAllPlant()[9]);

        $this->assertTrue($result);
    }
}
