<?php

require_once __DIR__. '/../../src/currency.php';

use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    private Currency $currency;

    protected function setUp(): void
    {
        $this->currency = $this->createStub(Currency::class);
    }

    public function tearDown(): void
    {
        unset($this->currency);
    }

    /**
    * @dataProvider currencyQueries
    */
    public function testCurrencyInputsDefault($amount, $expected, $from = 'DKK', $to = 'EUR', $testMessage = 'test currency')
    {
        $this->currency->method('convert')
        ->with(30, 'DKK', 'EUR')
        ->willReturn(4.03);

        $result = $this->currency->convert($amount, $from, $to);
        $this->assertEquals($expected, $result, $testMessage);
    }

    public function currencyQueries()
    {
        return [
            [
                $amount = 30,
                $from = 'DKK',
                $to = 'EUR',
                $expected = 4.03,
                $testMessage = 'to and from default input provided'
            ],
            [
                $amount = 30,
                $from,
                $to,
                $expected = 4.03,
                $testMessage = 'to and from currency uses default input'
            ],
        ];
    }

    public function testCurrencyInputsEURtoDKK()
    {
        $this->currency->method('convert')
        ->with(2, 'EUR', 'DKK')
        ->willReturn(14.90);

        $result = $this->currency->convert(2, 'EUR', 'DKK');
        $this->assertEquals(14.90, $result, "Assert that convert also works with other currencies");
    }

    public function testOutputIsFloat()
    {
        $this->currency->method('convert')
        ->with(30, 'DKK', 'EUR')
        ->willReturn(4.03);

        $output = $this->currency->convert(30);
        $this->assertIsFloat($output, 'Assert that output is a float');
    }

    /**
    * @dataProvider currencyOutputsForDecimalTest
    */
    public function testOutputFloatHasTwoDecimals($expected, $bool)
    {
        $this->currency->method('convert')
        ->with(30, 'DKK', 'EUR')
        ->willReturn($expected);
        
        $output = $this->currency->convert(30, 'DKK', 'EUR');
        $result = preg_match('/^\d+\.\d{2}$/', $output) === 1;
        $this->assertEquals($bool, $result);
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
