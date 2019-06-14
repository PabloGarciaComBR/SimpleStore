<?php

namespace SimpleStore\Http\Controllers\Cart;

use SimpleStore\Http\Controllers\Controller;
use SimpleStore\Repositories\CartRepository;

class IndexController extends Controller
{
    protected $cartRepository;

    /**
     * The constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->cartRepository = new CartRepository();
    }

    /**
     * The action that show all products in the cart
     *
     * @return Illuminate\View\View | Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $cart = $this->cartRepository->getCart();
        $counter = $this->cartRepository->getCartCounter();
        return view('cart.index', ['cart' => $cart, 'counter' => $counter]);
    }
}
