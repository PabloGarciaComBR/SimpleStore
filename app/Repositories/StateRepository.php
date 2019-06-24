<?php

namespace SimpleStore\Repositories;

use SimpleStore\Models\State;

class StateRepository extends BaseRepository
{
    protected $modelClass = State::class;

    /**
     * Get states list in id => name format
     *
     * @param int $country
     *
     * @return array
     */
    public function getStatesPairs(int $country)
    {
        $query = $this->newQuery()
                      ->select(['id', 'name'])
                      ->where('country_id', $country);

        $res = $this->doQuery($query, false, false);

        if (is_object($res)) {
            $res = $res->toArray();

            foreach ($res as &$value) {
                if (!isset($states)) {
                    $states = [];
                }
                $states[$value['id']] = $value['name'];
            }
        }

        return isset($states) ? $states : [];
    }
}
