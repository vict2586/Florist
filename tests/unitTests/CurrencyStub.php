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
