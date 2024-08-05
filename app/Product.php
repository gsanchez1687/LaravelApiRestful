<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    const AVAILABLE_PRODUCT = 'Disponible';
    const UNAVAILABLE_PRODUCT = 'No disponible';

    protected $fillable = [
        'seller_id',
        'name',
        'description',
        'quantity',
        'status',
        'image',
    ];

    public function isAvailable()
    {
        return $this->status == Product::AVAILABLE_PRODUCT;
    }

    public function Unavailable()
    {
        return $this->status == Product::UNAVAILABLE_PRODUCT;
    }
    
    //relacion con Seller
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    //relacion con transacciones
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    //relacion con categoria
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
