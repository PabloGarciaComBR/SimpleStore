<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use SimpleStore\Repositories\ProductRepository;

class ProductTest extends TestCase
{
    protected $productRepository;

    /**
     * Set Up the test enviroment
     *
     * @return void
     */
    protected function setUp() : void
    {
        parent::setUp();

        $this->productRepository = new ProductRepository();
    }

    /**
     * Test if I can get the cheapest products.
     *
     * @return void
     */
    public function testGetCheapestProduct()
    {
        $res1 = $this->productRepository->getCheapestPrice(1);
        $res3 = $this->productRepository->getCheapestPrice(3);

        $this->assertNotEmpty($res1);
        $this->assertNotEmpty($res3);
        $this->assertCount(1, $res1);
        $this->assertCount(3, $res3);
    }

    /**
     * Test if I can get a list with all products
     *
     * @return void
     */
    public function testGetAll()
    {
        $resA = $this->productRepository->getAll();
        $resB = $this->productRepository->getAll(15, false);

        $this->assertNotEmpty($resA);
        $this->assertNotEmpty($resB);
    }

    /**
     * Test if I can get a list with key / value
     *
     * @return void
     */
    public function testGetList()
    {
        $res = $this->productRepository->pluck('name', 'id');

        $this->assertNotEmpty($res);
    }

    /**
     * Test if I can get a product by ID
     *
     * @return void
     */
    public function testGetById()
    {
        $resA = $this->productRepository->findByID(1);
        $resB = $this->productRepository->findByID(1, false);

        $this->assertNotEmpty($resA);
        $this->assertNotEmpty($resB);
    }
}
