<?php

namespace Tests\Unit;

use Tests\TestCase;

class OrderTest extends TestCase
{
    protected $cartRepository;

    /**
     * Set Up the test enviroment
     *
     * @return void
     */
    protected function setUp() : void
    {
        parent::setUp();

        $this->cartRepository = new CartRepository();
    }

    /**
     *
     */
    public function testSaveOrder()
    {
        $session = session();

        $this->cartRepository->saveOrder($session, $this->paymentData);

        $userA = Order::find(1);

        $this->assertNotEmpty($userA);
    }
}
