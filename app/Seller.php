<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table = 'users';
    //relacion con producto
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
