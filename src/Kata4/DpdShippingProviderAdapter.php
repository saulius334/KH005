<?php

declare(strict_types=1);

namespace App\Kata4;

use App\Kata1\CostInterface;

class DpdShippingProviderAdapter implements CostInterface
{
    public function __construct(DpdShippingProvider $dpdShipping)
    {
        $this->adaptee = $dpdShipping;
    }
    public function cost(): float
    {
        return $this->adaptee->ourCost();
    }
}
