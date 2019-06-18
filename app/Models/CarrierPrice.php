<?php

namespace SimpleStore\Models;

use Illuminate\Database\Eloquent\Model;

class CarrierPrice extends Model
{
    protected $guarded = ['created_at', 'update_at', 'deleted_at'];
    protected $table = 'carrier_prices';
}
