<?php

namespace SimpleStore\Http\Controllers\Region;

use Illuminate\Http\Request;
use SimpleStore\Http\Controllers\Controller;
use SimpleStore\Repositories\CountryRepository;
use SimpleStore\Services\UtilService;

class RegionController extends Controller
{
    protected $countryRepository;

    /**
     * The constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->countryRepository = new CountryRepository();
    }

    public function findCountry()
    {
        $countries = $this->countryRepository->getCountriesPairs();
        $countries = UtilService::formatArrayToSelectReact($countries);
        return response()->json($countries);
    }
}
