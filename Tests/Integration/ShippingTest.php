<?php

declare(strict_types=1);

namespace Test\Unit;

use App\Kata1\Price;
use App\Kata1\Shipping;
use Generator;
use PHPUnit\Framework\TestCase;

class ShippingTest extends TestCase
/**
 * @dataProvider additionProvider
 */
{
    public function testIfShippingReturnsCorrectCost(float $price,float $shipping,float $expected): void
    {   
        $shipping = new Shipping($shipping, new Price($price));
        $this->assertEquals($expected, $shipping->cost());
    }
    public function additionProvider(): Generator
    {
        yield 'FirstExample' => [
            'price' => 100,
            'shipping' => 100,
            'expected' => 200,
        ];
    }
}