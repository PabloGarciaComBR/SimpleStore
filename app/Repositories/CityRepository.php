<?php

namespace SimpleStore\Repositories;

use SimpleStore\Models\City;

class CityRepository extends BaseRepository
{
    protected $modelClass = City::class;

    /**
     * Get cities list in id => name format
     *
     * @param int $state
     *
     * @return array
     */
    public function getCitiesPairs(int $state)
    {
        $query = $this->newQuery()
                      ->select(['id', 'name'])
                      ->where('state_id', $state);

        $res = $this->doQuery($query, false, false);

        if (is_object($res)) {
            $res = $res->toArray();

            foreach ($res as &$value) {
                if (!isset($cities)) {
                    $cities = [];
                }
                $cities[$value['id']] = $value['name'];
            }
        }

        return isset($cities) ? $cities : [];
    }
}
