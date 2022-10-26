<?php

declare(strict_types=1);

namespace App;

use App\Kata1\Discount;
use App\Kata1\Price;
use App\Kata1\Shipping;
use App\Kata2\PriceCalculatorInterface;
use App\Kata3\DiscountStrategy;

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
        $this->calculator = $calculator;
        // command ??
        $answer = $this->calculator->calculate($price->cost(), $discount, $shipping);
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
        // shipping = 8;
        // discount = 20;
        // new Price(100);

        //OMG ¯\_(ツ)_/¯ , don't be lazy, change me
        return 84;
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
