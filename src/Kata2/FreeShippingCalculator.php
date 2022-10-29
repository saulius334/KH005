<?php

declare(strict_types=1);

namespace App\Kata2;

class FreeShippingCalculator implements PriceCalculatorInterface
{
    public function calculate(float $price, float $discount, float $tax)
    {
        return 100 * (1 - $discount / $price);
    }
}
