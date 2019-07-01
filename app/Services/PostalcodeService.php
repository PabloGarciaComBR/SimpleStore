<?php

namespace SimpleStore\Services;

use SimpleStore\Repositories\PostalcodeRepository;
use SimpleStore\Models\Postalcode;

class PostalcodeService
{
    protected $postalcodeRepository;

    /**
     * The constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->postalcodeRepository = new PostalcodeRepository();
    }

    /**
     * If postal code already exists in database, get it
     * Else, insert to database and return it
     *
     * @param string $code
     * @param int $city
     * @param string $place
     * @param string $neighborhood
     *
     * @return array
     */
    public function saveOrGet(string $code, int $city, string $place, string $neighborhood)
    {
        $res = $this->postalcodeRepository->getByPostalcode($code);

        if (empty($res)) {
            $create = Postalcode::create([
                'city_id' => $city,
                'code' => $code,
                'place' => $place,
                'neighborhood' => $neighborhood
            ]);

            return is_object($create) ? $create->toArray() : [];
        }

        return $res;
    }
}
