<?php

declare(strict_types=1);

namespace App\Kata3;

use App\Kata2\FreeShippingCalculator;
use App\Kata2\PriceCalculator;

class DiscountStrategy
{
public function __construct(bool $chewsday)
{
    if ($chewsday === true) {
        $this->calculator = new FreeShippingCalculator();
    } else {
        $this->calculator = new PriceCalculator();
    }
}
}
