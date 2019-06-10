<?php

namespace SimpleStore\Http\Controllers\Product;

use Illuminate\Http\Request;
use SimpleStore\Http\Controllers\Controller;
use SimpleStore\Repositories\ProductRepository;


class ProductController extends Controller
{
    protected $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    /**
     * The product list action
     *
     * @return Illuminate\View\View | Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $products = $this->productRepository->getAll();
        return view('products.index', ['products' => $products]);
    }

    /**
     * The product details action
     *
     * @return Illuminate\View\View | Illuminate\Contracts\View\Factory
     */
    public function show($id)
    {
        $product = $this->productRepository->findByID($id);
        return view('products.show', ['product' => $product]);
    }
}
