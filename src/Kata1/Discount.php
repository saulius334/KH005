<?php

declare(strict_types=1);

namespace App\Kata1;

class Discount implements CostInterface
{
    public function __construct($discount, private CostInterface $costInterface)
    {
        $this->discount = $discount;
    }
    public function cost()
    {
        return 100 * (1 - $this->discount / $this->costInterface->cost());
    }
}
