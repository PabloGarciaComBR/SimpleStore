<?php

namespace SimpleStore\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['order_id', 'value', 'status', 'payment_type_id'];
}
