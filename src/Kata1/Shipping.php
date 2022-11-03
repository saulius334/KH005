<?php

declare(strict_types=1);

namespace App\Kata1;

class Shipping implements CostInterface
{
    public function __construct(float $shipping, private CostInterface $costInterface)
    {
        $this->shipping = $shipping;
    }
    public function cost()
    {
        return $this->costInterface->cost() + $this->shipping;
    }
}
