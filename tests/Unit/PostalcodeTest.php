<?php

namespace Tests\Unit;

use Tests\TestCase;
use SimpleStore\Repositories\PostalcodeRepository;
use SimpleStore\Services\PostalcodeService;

class PostalcodeTest extends TestCase
{

    protected $postalcodeRepository;

    /**
     * Set Up the test enviroment
     *
     * @return void
     */
    protected function setUp() : void
    {
        parent::setUp();

        $this->postalcodeRepository = new PostalcodeRepository();
    }

    /**
     * Checks if repository can get a postalcode data by code correctly.
     *
     * @return void
     */
    public function testIfCanGetAPostalcode()
    {
        $res1 = $this->postalcodeRepository->getByPostalcode('82530230');
        $res2 = $this->postalcodeRepository->getByPostalcode('01350400');

        $this->assertNotEmpty($res1);
        $this->assertArrayHasKey('neighborhood', $res1);
        $this->assertEmpty($res2);
    }
}
