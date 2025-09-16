<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'product';
    
    protected $fillable = ['title', 'description', 'price', 'product_category_id'];
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function discounts()
    {
        return $this->morphMany(Discount::class, 'discountable');
    }
}
