<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    //relacion con producto
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
