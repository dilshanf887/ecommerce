<?php

namespace App\Services;

use App\Models\Product;
use App\Services\Discounts\CategoryDiscount;
use App\Services\Discounts\CustomerDiscount;
use App\Services\Discounts\Discountable;
use Illuminate\Support\Facades\Auth;

class DiscountService {

    public function getDiscountedPrice(Product $product): float {
       
        // Dynamically determine applicable discounts
        $discountables = [
            new CategoryDiscount($product->product_category_id),
            new CustomerDiscount(Auth::user()),
        ];

        // $totalDiscountPercent = 0;

        $price = $product->price;

        foreach ($discountables as $discountable) {
            $discountPercentage = $discountable->getDiscountPercentage();
            // $totalDiscountPercent += $discountPercentage;

            // Cumulative discount calculation
            $price -= $price * $discountPercentage / 100;
        }

        // // Not used - Combined discount calculation
        // $discountedPrice = $product->price * (1 - $totalDiscountPercent / 100);
        return round($price, 2);

    }
}