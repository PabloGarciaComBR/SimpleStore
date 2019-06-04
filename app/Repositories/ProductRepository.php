<?php

namespace SimpleStore\Repositories;

use SimpleStore\Models\Product;

class ProductRepository extends BaseRepository
{
    protected $modelClass = Product::class;
}
