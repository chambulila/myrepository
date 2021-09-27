<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     protected $fillable = [
        'name', 'quantity', 'price', 'reoder', 'description', 'brand'
    ];

    public function saledetail()
    {
        return $this->hasMany('App\SaleDetail');
    }
}
