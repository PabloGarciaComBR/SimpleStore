<?php

namespace SimpleStore\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    public $timestamps = true;
    protected $fillable = ['user_id', 'country_id', 'state_id', 'city_id', 'postalcode_id', 'address', 'address_2'];
}
