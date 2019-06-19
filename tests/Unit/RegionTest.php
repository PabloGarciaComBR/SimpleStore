<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use SimpleStore\Repositories\CountryRepository;

class RegionTest extends TestCase
{
    protected $countryRepository;

    /**
     * Set Up the test enviroment
     *
     * @return void
     */
    protected function setUp() : void
    {
        parent::setUp();

        $this->countryRepository = new CountryRepository();
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
}
