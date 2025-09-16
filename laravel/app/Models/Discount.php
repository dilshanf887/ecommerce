<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount';

    protected $fillable = ['percentage', 'discountable_id', 'discountable_type'];
    
    public function discountable()
    {
        return $this->morphTo();
    }
}
