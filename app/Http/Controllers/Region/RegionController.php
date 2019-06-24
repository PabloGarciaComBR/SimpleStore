<?php

namespace SimpleStore\Http\Controllers\Region;

use Illuminate\Http\Request;
use SimpleStore\Http\Controllers\Controller;
use SimpleStore\Repositories\CountryRepository;
use SimpleStore\Repositories\StateRepository;
use SimpleStore\Repositories\CityRepository;
use SimpleStore\Services\UtilService;

class RegionController extends Controller
{
    protected $countryRepository;
    protected $stateRepository;
    protected $cityRepository;

    /**
     * The constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->countryRepository = new CountryRepository();
        $this->stateRepository = new StateRepository();
        $this->cityRepository = new CityRepository();
    }

    public function findCountry()
    {
        $countries = $this->countryRepository->getCountriesPairs();
        $countries = UtilService::formatArrayToSelectReact($countries);
        return response()->json($countries);
    }

    public function findState($country)
    {
        $states = $this->stateRepository->getStatesPairs($country);
        $states = UtilService::formatArrayToSelectReact($states);
        return response()->json($states);
    }

    public function findCity($state)
    {
        $cities = $this->cityRepository->getCitiesPairs($state);
        $cities = UtilService::formatArrayToSelectReact($cities);
        return response()->json($cities);
    }
}
