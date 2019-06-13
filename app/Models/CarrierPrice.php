<?php

namespace SimpleStore\Models;

use Illuminate\Database\Eloquent\Model;

class CarrierPrice extends Model
{
    protected $fillable = ['carrier_id', 'postalcode_id', 'price', 'delivery_time'];
    protected $guarded = ['id', 'created_at', 'update_at', 'deleted_at'];
    protected $table = 'carrier_prices';
}
