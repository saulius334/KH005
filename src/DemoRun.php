<?php

declare(strict_types=1);

namespace App;

use App\Kata1\Discount;
use App\Kata1\Price;
use App\Kata1\Shipping;
use App\Kata2\PriceCalculatorInterface;
use App\Kata3\DiscountStrategy;
use App\Kata4\DpdShippingProvider;

class DemoRun
{
    private bool $isTuesday = false;

    public function kata1()
    {
        $shipping = 8;
        $discount = 20;
        $price = new Price(100);

        $kat1 = new Shipping($shipping, new Discount($discount, $price)); 
        // decorator
        return $kat1->cost();
    }

    public function kata2(PriceCalculatorInterface $calculator)
    {
        $shipping = 8;
        $discount = 20;
        $price = new Price(100);
        // command ??
        $answer = $calculator->calculate($price->cost(), $discount, $shipping);
        return $answer;
    }

    public function kata3()
    {
        $shipping = 8;
        $discount = 20;
        $price = new Price(100);
        $strategy = new DiscountStrategy($this->isTuesday());
        // strategy
        $answer = $strategy->calculator->calculate($price->cost(), $discount, $shipping);
        return $answer;
    }

    public function kata4()
    {
        $shipping = 8;
        $discount = 20;
        $price = new Price(100);

        $answer1 = (new Shipping((new DpdShippingProvider())->ourCost(), new Discount($discount, $price)))->cost();
        // return $answer1;
        $dpd = new DpdShippingProvider();
        $cheapest = $shipping < $dpd->ourCost() ? $shipping : $dpd->ourCost();
        $calculator = new DiscountStrategy($this->isTuesday());

        $answer2 = $calculator->calculator->calculate($price->cost(), $discount, $cheapest);
        //OMG ¯\_(ツ)_/¯ 
        return $answer2;
        // return $answer2;
    }

    /**
     * @return bool
     */
    public function isTuesday(): bool
    {
        return $this->isTuesday;
    }

    /**
     * @param bool $isTuesday
     */
    public function setIsTuesday(bool $isTuesday): void
    {
        $this->isTuesday = $isTuesday;
    }
}
