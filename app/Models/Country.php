<?php

namespace SimpleStore\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = ['callcode', 'iso_2', 'iso_3'];
}
