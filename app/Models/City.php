<?php

namespace SimpleStore\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = ['callcode', 'IATA_3'];
}
