<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_category';
    
    protected $fillable = ['title'];

    public function discounts()
    {
        return $this->morphMany(Discount::class, 'discountable');
    }
}
