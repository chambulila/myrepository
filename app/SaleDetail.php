<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $table="Sale_details";
    protected $fillable = [
        'item_id', 'amount', 'unitprice', 'sale_id', 'quantity', 'discount'
    ];

    public function items()
    {
        return $this->belongsTo('App\Item');
    }

    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }
    public function Transaction()
    {
        return $this->hasMany('App\Transaction');
    }
}
