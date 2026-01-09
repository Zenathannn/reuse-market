<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'details',
        'price',
        'image_01',
        'image_02',
        'image_03',
    ];

    public function cartItems()
    {
        return $this->hasMany(Cart::class, 'pid');
    }

    public function wishlistItems()
    {
        return $this->hasMany(Wishlist::class, 'pid');
    }

    public function getPriceFormatted()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}
