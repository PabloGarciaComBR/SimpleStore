<?php

namespace Tests\Unit;

use Tests\TestCase;
use SimpleStore\Repositories\CountryRepository;
use SimpleStore\Repositories\StateRepository;
use SimpleStore\Repositories\CityRepository;

class RegionTest extends TestCase
{
    protected $countryRepository;
    protected $stateRepository;
    protected $cityRepository;

    /**
     * Set Up the test enviroment
     *
     * @return void
     */
    protected function setUp() : void
    {
        parent::setUp();

        $this->countryRepository = new CountryRepository();
        $this->stateRepository = new StateRepository();
        $this->cityRepository = new CityRepository();
    }

    /**
     * Check if getCountries method return an array
     *
     * @return void
     */
    public function testFindCountries() {
        $countries = $this->countryRepository->getCountriesPairs();

        $this->assertNotEmpty($countries);
        $this->assertIsArray($countries);
    }

    /**
     * Check if getStates method return an array with the expected format
     *
     * @return void
     */
    public function testFindStates() {
        $states1 = $this->stateRepository->getStatesPairs(1);
        $states2 = $this->stateRepository->getStatesPairs(2);
        $states3 = $this->stateRepository->getStatesPairs(3);

        $this->assertNotEmpty($states1);
        $this->assertIsArray($states1);
        $this->assertCount(4, $states1);

        $this->assertNotEmpty($states2);
        $this->assertIsArray($states2);
        $this->assertCount(5, $states2);

        $this->assertEmpty($states3);
        $this->assertIsArray($states3);
        $this->assertCount(0, $states3);
    }

    /**
     * Checks that getCities method return an array (count > 0) if find results
     * Checks that getCities method return an array (count = 0) if no encountred cities
     *
     * @return void
     */
    public function testFindCities() {
        $cities1 = $this->cityRepository->getCitiesPairs(1);
        $cities2 = $this->cityRepository->getCitiesPairs(2);

        $this->assertNotEmpty($cities1);
        $this->assertIsArray($cities1);
        $this->assertCount(1, $cities1);
        $this->assertCount(0, $cities2);
    }
}
