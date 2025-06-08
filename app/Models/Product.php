<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'discounted_price',
        'stock',
        'category_id',
        'photopath'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
