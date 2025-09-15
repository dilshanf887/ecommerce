<?php

namespace App\Services\Discounts;

use App\Models\ProductCategoryDiscount;

class CategoryDiscount implements Discountable {
    private int $category;

    public function __construct(int $category) {
        $this->category = $category;
    }

    public function getDiscountPercentage(): float {

        $discount = ProductCategoryDiscount::where('product_category_id', $this->category)
        ->whereDate('start_date', '<=', now())
        ->whereDate('end_date', '>=', now())
        ->value('discount');
        
        return ($discount) ? $discount * 100 : 0;
    }
}