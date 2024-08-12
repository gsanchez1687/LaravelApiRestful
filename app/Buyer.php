<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $table = 'users';
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
