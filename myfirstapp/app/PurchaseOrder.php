<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'items_purchased',
        'total',
        'gst',
        'amount', 
        'created_at',
        'updated_at',     
    ];
}
