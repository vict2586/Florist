<?php

require_once __DIR__. '/../../src/currency.php';

use PHPUnit\Framework\TestCase;

//$printCurrency = new Currency;
//print_r($printCurrency->getCurrencies());

class currencyTest extends TestCase {

    private Currency $currency;
    
    public function setUp(): void {
        $this->currency = $this->createStub(Currency::class);
        $this->currency->method('getCurrencies')->willReturn([
/*      
        Array (
            '39' => Array (
                    '0' => 'DKK',
                    '1' => 'Danish Krone'
                ),
            '45' => Array (
                    [0] => 'EUR',
                    [1] => 'Euro'
                ),
            '148' => Array (
                    [0] => 'USD',
                    [1] => 'US Dollar'
                ),
          ) 
*/
        ]);
    }

    public function tearDown(): void {
        unset($this->currency);
    }

    public function testFake() {
        $result = 2 + 2;
        $expected = 4;
        
        $this->assertEquals($expected, $result);
    }

}