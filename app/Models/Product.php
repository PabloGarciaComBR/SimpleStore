<?php

namespace SimpleStore\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['created_at', 'update_at', 'deleted_at'];
}
