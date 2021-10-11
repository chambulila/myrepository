<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table="purchases";
    protected $fillable=[
        'Item_name', 'Price', 'Supplier_contact',
         'Supplier_name', 'other_Cost'
    ];
}
