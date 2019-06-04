<?php

namespace SimpleStore\Http\Controllers;

use Illuminate\Http\Request;
use SimpleStore\Repositories\ProductRepository;


class ProductController extends Controller
{
    protected $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function index()
    {
        $products = $this->productRepository->getAll();
        return view('products.index', ['products' => $products]);
    }

    public function show($id)
    {
        $product = $this->productRepository->findByID($id);
        return view('products.show', ['product' => $product]);
    }
}
