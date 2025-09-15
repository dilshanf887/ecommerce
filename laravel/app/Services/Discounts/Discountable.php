<?php

namespace App\Services\Discounts;

interface Discountable {
    public function getDiscountPercentage(): float;
}