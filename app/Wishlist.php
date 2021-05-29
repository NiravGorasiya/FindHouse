<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table ='whishlist';
    protected $fillables=[
        'user_id',
        'property_id',
        'image',
        'price',
        'address'
    ];
}
