<?php

namespace App\Services;

use App\Models\Product;
use App\Models\User;

class DiscountService {
    
    public function getDiscountedPrice(Product $product, User $customer): float
    {
        $finalPrice = $product->price;
        
        // Apply product discounts
        foreach ($product->discounts as $discount) {
            $finalPrice = $this->applyDiscount($finalPrice, $discount);
        }
        
        // Apply category discounts
        foreach ($product->category->discounts as $discount) {
            $finalPrice = $this->applyDiscount($finalPrice, $discount);
        }
        
        // Apply customer discounts
        foreach ($customer->discounts as $discount) {
            $finalPrice = $this->applyDiscount($finalPrice, $discount);
        }
        
        return $finalPrice;
    }
    
    private function applyDiscount(float $price, $discount): float
    {
        $price -= $price * ($discount->percentage / 100);
        
        return $price;
    }
}