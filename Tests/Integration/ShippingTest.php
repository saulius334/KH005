<?php

declare(strict_types=1);

namespace Test\Unit;

use App\Kata1\Price;
use App\Kata1\Shipping;
use PHPUnit\Framework\MockObject\MockClass;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertSame;

class ShippingTest extends TestCase
{

    
    public function testIfReturnCorrectCost(): void
    {
        $price = new Price(5);
        $shipping = new Shipping(100,$price);
        assertSame($shipping->cost(),105.0);
    }
}