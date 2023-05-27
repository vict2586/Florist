<?php
require_once __DIR__. '/../../src/currency.php';

use PHPUnit\Framework\MockObject\Stub;

class CurrencyStub extends Currency
{
    public function convert(float $amount, string $baseCurrency = 'DKK', string $destinationCurrency = 'EUR'): float
    {
        $rateDKKtoEUR = 0.13;
        $rateEURtoDKK = 7.45;
        $result = 0;

        if ($baseCurrency == 'DKK' && $destinationCurrency == 'EUR') {
            $result = round($amount * $rateDKKtoEUR, 2);
        } elseif ($baseCurrency == 'EUR' && $destinationCurrency == 'DKK') {
            $result = round($amount * $rateEURtoDKK, 2);
        } 

        return $result;
    }
}

use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    private $currency;
    
    protected function setUp(): void
    {
        $this->currency = $this->getMockBuilder(Currency::class)->getMock();
    }

    public function tearDown(): void
    {
        unset($this->currency);
    }

    public function testOutputIsFloat()
    {
        $this->currency->expects($this->any())
        ->method('convert')
        ->willReturnCallback(function ($amount, $baseCurrency, $destinationCurrency) {
            $stub = new CurrencyStub();
            return $stub->convert($amount, $baseCurrency, $destinationCurrency);
        });

        $output = $this->currency->convert(30);
        $this->assertIsFloat($output, 'Assert that output is a float');
    }
    
    /**
    * @dataProvider currencyQueries
    */
    public function testCurrencyInputsDefault($amount, $expected, $baseCurrency = 'DKK', $destinationCurrency = 'EUR', $testMessage = 'test currency')
    {
        $this->currency->expects($this->any())
        ->method('convert')
        ->willReturnCallback(function ($amount, $baseCurrency, $destinationCurrency) {
            $stub = new CurrencyStub();
            return $stub->convert($amount, $baseCurrency, $destinationCurrency);
        });

        $result = $this->currency->convert($amount, $baseCurrency, $destinationCurrency);
        $this->assertEquals($expected, $result, $testMessage);
    }

    public function currencyQueries()
    {
        return [
            [
                $amount = 30,
                $expected = 3.9,
                $baseCurrency = 'DKK',
                $destinationCurrency = 'EUR',
                $testMessage = 'to and from default input provided'
            ],
            [
                $amount = 30,
                $expected = 3.9,
                $baseCurrency,
                $destinationCurrency,
                $testMessage = 'to and from currency uses default input'
            ],
        ];
    }

    public function testCurrencyInputsEURtoDKK()
    {
        $this->currency->expects($this->any())
            ->method('convert')
            ->willReturnCallback(function ($amount, $baseCurrency, $destinationCurrency) {
                $stub = new CurrencyStub();
                return $stub->convert($amount, $baseCurrency, $destinationCurrency);
        });

        $result = $this->currency->convert(2, 'EUR', 'DKK');
        $this->assertEquals(14.90, $result, "Assert that convert also works with other currencies");
    }

    /**
    * @dataProvider currencyOutputsForDecimalTest
    */
    public function testOutputFloatHasTwoDecimals($expected, $bool)
    {
        $output = preg_match('/^\d+\.\d{2}$/', $expected) === 1;
        $this->assertEquals($bool, $output);
    }

    public function currencyOutputsForDecimalTest()
    {
        return [
            [
                $expected = 4.03,
                $bool = true,
            ],
            [
                $expected = 3.51,
                $bool = true,
            ],
            [
                $expected = 4,
                $bool = false,
            ],
            [
                $expected = 4.001,
                $bool = false,
            ],
            [
                $expected = 4.1,
                $bool = false,
            ],
        ];
    }

    /**
    * @dataProvider currencyCodes
    */
    public function testCurrencyCodesFollowREGEXPattern($currencyCode, $expected)
    {
        $result = preg_match('/^(?!([A-Z])\1\1$)[A-Z]{3}$/', $currencyCode) === 1;
        $this->assertEquals($expected, $result);
    }

    public function currencyCodes()
    {
        return [
            ['DKK', true],
            ['USD', true],
            ['EUR', true],
            ['DK.', false],
            ['dk', false],
            ['DK', false],
            ['DKKK', false],
            ['$$$', false],
        ];
    }
}
