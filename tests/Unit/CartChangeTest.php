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
    public function testCanAddToCart()
    {
        $session = session();
        $response = $this->cartRepository->addToCart($session, $this->dataProduct[1]);

        // Check the response, it MUST be true
        $this->assertTrue($response);

        // Check if key "cart" exists
        $this->assertTrue($session->has('cart'));

        // Check if data was correctly wrote
        $cart = $session->get('cart');
        $this->assertEquals(1, $cart[0]['id'], "Item is not OK");
        $this->assertEquals(3, $cart[0]['howMany'], "How many of this item is not OK");
    }

    /**
     * Check if data is correctly read
     *
     * @return void
     */
    public function testReadTheCart()
    {
        // I'll set the test data mass to the cart...
        $session = session();
        $response = $this->cartRepository->addToCart($session, $this->dataProduct[1]);
        $cart = $this->cartRepository->getCart();

        // ... and then, I'll make my asserts
        $this->assertNotEmpty($cart);
        $this->assertIsArray($cart);
        $this->assertEquals([
            'id' => 1,
            'howMany' => 3,
            'name' => 'Business Card',
            'description' => 'Couchê 250g 4x0',
            'price' => 22.9,
            'quantity' => 1000,
            'total' => 68.7
        ], $cart[0]);
    }

    /**
     * This will test the cart counter method
     *
     * @return void
     */
    public function testCartCounter()
    {
        // I'll set the test data mass to the cart...
        $session = session();
        $response = $this->cartRepository->addToCart($session, $this->dataProduct[1]);
        $response = $this->cartRepository->addToCart($session, $this->dataProduct[3]);
        $counter = $this->cartRepository->getCartCounter();

        // ... and then, I'll make my asserts
        $this->assertEquals(320, $counter['total']);
    }
}
