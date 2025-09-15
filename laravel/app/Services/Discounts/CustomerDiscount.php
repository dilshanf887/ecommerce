<?php

namespace App\Services\Discounts;

use App\Models\User;

class CustomerDiscount implements Discountable {
    private User $customer;

    public function __construct(User $customer) {
        $this->customer = $customer;
    }

    public function getDiscountPercentage(): float {
        return $this->customer->is_special_customer ? 10 : 0;
    }
}