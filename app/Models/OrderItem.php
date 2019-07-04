<?php

namespace SimpleStore\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'item_status_id',
        'product_value',
        'tax_value',
        'other_value'
    ];
}
