<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $table="Sale_details";
    protected $fillable = [
        'item_id', 'amount', 'unitprice', 'sale_id', 'quantity', 'discount'
    ];

    protected $with =['item'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
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
