<?php

namespace SimpleStore\Http\Controllers\Cart;

use Illuminate\Http\Request;
use SimpleStore\Http\Controllers\Controller;
use SimpleStore\Repositories\CartRepository;

class ChangeController extends Controller
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
     * The action that adds a product to the cart
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Routing\Redirector
     */
    public function add(Request $request)
    {
        $requestData = $request->all();

        $this->cartRepository->addToCart(session(), $requestData);

        return redirect()->route("cart-index");
    }

    /**
     * The action that removes a product of the cart
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Routing\Redirector
     */
    public function remove(Request $request)
    {
        $requestData = $request->all();
        dd($requestData);
    }
}
