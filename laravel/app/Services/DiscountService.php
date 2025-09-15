<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductCategoryDiscount;
use Illuminate\Support\Facades\Auth;

class DiscountService {

    public function getDiscountedPrice(Product $product): float {
       
        $price = $product->price;
        
        // Category discount
        $discount = ProductCategoryDiscount::where('product_category_id', $product->product_category_id)
        ->whereDate('start_date', '<=', now())
        ->whereDate('end_date', '>=', now())
        ->value('discount');
        
        if ($discount) {
            $price -= $price * $discount;
        }
        
        // Special discount
        if (Auth::user()->is_special_customer) {
            // The 10% can be added to the database as in case of a discount amount change, it can be changed by an admin user
            $price -= $price * 0.10;
        }
        
        return round($price, 2);

    }
}