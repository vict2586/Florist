<?php

use PHPUnit\Framework\TestCase;

class testTest extends TestCase {
    
    public function testTheTest() {
        $a = 2 + 2;
        $result = 4;

        $this->assertEquals($result, $a);
    }

}