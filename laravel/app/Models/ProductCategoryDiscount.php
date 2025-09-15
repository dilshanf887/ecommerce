<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryDiscount extends Model
{
    protected $table = 'product_category_discount';

    protected $fillable = ['product_category_id', 'start_date', 'end_date', 'discount'];
}
