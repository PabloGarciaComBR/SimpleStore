<?php

namespace SimpleStore\Models;

use Illuminate\Database\Eloquent\Model;

class Postalcode extends Model
{
    protected $fillable = ['city_id', 'code', 'place', 'neighborhood'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'postalcodes';
}
