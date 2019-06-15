<?php

namespace SimpleStore\Repositories;

use SimpleStore\Models\Product;
use Hamcrest\Type\IsObject;

class ProductRepository extends BaseRepository
{
    protected $modelClass = Product::class;

    /**
     * Get the cheapest products
     *
     * @param int $limit How many result you want
     *
     * @return mixed
     */
    public function getCheapestPrice(int $limit = 1)
    {
        $query = $this->newQuery()
                      ->orderBy('price')
                      ->limit($limit);

        $res = $this->doQuery($query, false, false);

        return is_object($res) ? $res->toArray() : [];
    }
}
