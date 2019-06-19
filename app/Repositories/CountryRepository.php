<?php

namespace SimpleStore\Repositories;

use SimpleStore\Models\Country;

class CountryRepository extends BaseRepository
{
    protected $modelClass = Country::class;

    /**
     * Get countries list in id => name format
     */
    public function getCountriesPairs()
    {
        $countries = $this->pluck('name', 'id');
        return is_object($countries) ? $countries->toArray() : [];
    }
}
