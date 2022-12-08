<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'share_price',
        'share_lot_price',
        'password',
        'buttons_value',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function luckyNumbers()
    {
        return $this->hasMany(LuckyNumber::class, 'product_id');
    }
}
