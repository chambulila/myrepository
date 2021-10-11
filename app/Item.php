<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     protected $fillable = [
        'name', 'quantity', 'buy_price', 'price', 'reoder', 'description', 'brand'
    ];

    public function sales()
    {
        return $this->belongsTo('App\Sale');
    }
}
