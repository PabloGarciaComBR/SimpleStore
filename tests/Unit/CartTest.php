<?php

namespace Tests\Unit;

use Tests\TestCase;
use SimpleStore\Repositories\CartRepository;
use SimpleStore\Models\Order;

class CartTest extends TestCase
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
            "paymentMethod" => "debit",
            "cc-name" => "Paul A. Traz",
            "cc-number" => "4356895632658945",
            "cc-expiration" => "11/2023",
            "cc-cvv" => "456"
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
        $this->cartRepository->addToCart($session, $this->dataProduct[1]);

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
        $this->cartRepository->addToCart($session, $this->dataProduct[1]);
        $this->cartRepository->addToCart($session, $this->dataProduct[3]);
        $counter   = $this->cartRepository->getCartCounter();

        // ... and then, I'll make my asserts
        $this->assertEquals(320, $counter['product']);
        $this->assertEquals(22.9, $counter['items'][1]['unitPrice']);
        $this->assertEquals(251.3, $counter['items'][3]['product']);
    }

    /**
     * Checks if method getCartStepInfo can get data correctly
     *
     * @return void
     */
    public function testGetStep()
    {
        $session = session();

        $session->put('cart-ship', $this->dataShipping);
        $sessionContent = $this->cartRepository->getCartStepInfo($session, 'ship');

        $this->assertNotEmpty($sessionContent);
        $this->assertArrayHasKey('firstName', $sessionContent);
        $this->assertEquals($this->dataShipping["firstName"], $sessionContent['firstName']);
    }

    /**
     * Checks that data is correctly saved in session using the saveCartStepInfo method
     *
     * @return void
     */
    public function testSaveStep()
    {
        $session = session();

        $this->cartRepository->saveCartStepInfo($session, 'ship', $this->dataShipping);
        $info = $this->cartRepository->getCartStepInfo($session, 'ship');

        $this->assertNotEmpty($info);
        $this->assertEquals($this->dataShipping["firstName"], $info['firstName']);
    }
}
