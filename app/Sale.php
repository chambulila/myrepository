<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table="sales";
    public function saledetail()
    {
        return $this->hasMany('App\SaleDetail');
    }
    public function Transaction()
    {
        return $this->hasMany('App\Transaction');
    }
}
