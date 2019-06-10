<?php

namespace SimpleStore\Http\Controllers\Cart;

use Illuminate\Http\Request;
use SimpleStore\Http\Controllers\Controller;
use SimpleStore\Repositories\CartRepository;

class ChangeController extends Controller
{
    protected $cartRepository;

    public function __construct()
    {
        $this->cartRepository = new CartRepository();
    }

    /**
     * ------------------------- #$#$#$# The product list action
     *
     * @return Illuminate\View\View | Illuminate\Contracts\View\Factory
     */
    public function add(Request $request)
    {
        $requestData = $request->all();

        $this->cartRepository->addToCart(session(), $requestData);

        //$products = $this->productRepository->getAll();
        //return view('products.index', ['products' => $products]);

    }

    /*
    public function show($id)
    {
        $product = $this->productRepository->findByID($id);
        return view('products.show', ['product' => $product]);
    }
    */
}
