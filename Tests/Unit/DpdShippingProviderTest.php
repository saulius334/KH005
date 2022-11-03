<?php

declare(strict_types=1);

namespace Test\Unit;

use App\Kata4\DpdShippingProvider;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertSame;

class DpdShippingProviderTest extends TestCase
{
    public function testDpdShippingProviderReturnCorrectCost(): void
    {
        $dpd = new DpdShippingProvider();
        assertSame((float)4, $dpd->ourCost());
    }
}