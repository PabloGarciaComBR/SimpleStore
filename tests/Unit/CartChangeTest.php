<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use SimpleStore\Repositories\CartRepository;

class CartChangeTest extends TestCase
{

    protected $cartRepository;
    protected $dataProduct;

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
    }

    /**
     * Add a product to cart.
     *
     * @return void
     */
    public function testCanAddToCartTest()
    {
        // Creating the session instance
        $session = session();

        // Call the addToCart method
        $response = $this->cartRepository->addToCart($session, $this->dataProduct[1]);

        // Check the response, it MUST be true
        $this->assertTrue($response);

        // Check if key "cart" exists
        $this->assertTrue($session->has('cart'));
    }
}
