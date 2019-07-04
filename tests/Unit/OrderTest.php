<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use SimpleStore\Repositories\CartRepository;
use SimpleStore\Models\User;
use SimpleStore\Models\Order;

class OrderTest extends TestCase
{
    protected $cartRepository;
    protected $dataProduct;
    protected $dataShipping;
    protected $paymentData;

    /**
     * Set Up the test enviroment
     *
     * @return void
     */
    protected function setUp() : void
    {
        parent::setUp();

        $this->cartRepository = new CartRepository();

        $this->dataProduct = [
            ['id' => 1, 'howMany' => 1],
            ['id' => 1, 'howMany' => 3],
            ['id' => 3, 'howMany' => 1],
            ['id' => 3, 'howMany' => 7]
        ];

        $this->dataShipping = [
            "firstName" => "Pablo",
            "lastName" => "Garcia",
            "address" => "Rua das Couves",
            "address2" => "1234",
            "country" => "2",
            "state" => "1",
            "city" => "1",
            "postalcode" => "81580130"
        ];

        $this->paymentData = [
            "paymentMethod" => 1,
            "cc-name" => "Paul A. Traz",
            "cc-number" => "4356895632658945",
            "cc-expiration" => "11/2023",
            "cc-cvv" => "456"
        ];
    }

    /**
     * Checks if order will be write correctly in database
     *
     * @return void
     */
    public function testSaveOrder()
    {
        $session = session();

        $user = factory(User::class)->create();
        Auth::loginUsingId($user->id, true);

        $this->cartRepository->addToCart($session, $this->dataProduct[1]);
        $this->cartRepository->saveCartStepInfo($session, 'ship', $this->dataShipping);
        $this->cartRepository->saveOrder($session, $this->paymentData);

        $userA = Order::find(1);

        $this->assertNotEmpty($userA);
        //$this->assertEquals(1, 1);
    }
}
