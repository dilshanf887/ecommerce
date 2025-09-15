<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    protected $table = 'product';
    
    protected $fillable = ['title', 'description', 'price', 'product_category_id'];
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
    
    public function getDiscountedPrice()
    {
        $price = $this->price;
        
        // Category discount
        $discount = ProductCategoryDiscount::where('product_category_id', $this->product_category_id)
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
