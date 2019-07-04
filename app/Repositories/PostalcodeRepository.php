<?php

namespace SimpleStore\Repositories;

use SimpleStore\Models\Postalcode;

class PostalcodeRepository extends BaseRepository
{
    protected $modelClass = Postalcode::class;

    /**
     * Get data fetching by postal code
     *
     * @param string $postalcode
     *
     * @return array
     */
    public function getByPostalcode(string $postalcode)
    {
        $query = $this->newQuery()
                      ->where('code', '=', $postalcode);

        $res = $this->doQuery($query, false, false);

        return is_object($res) && count($res) > 0 ? $res->first()->toArray() : [];
    }
}
