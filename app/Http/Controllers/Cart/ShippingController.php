<?php

namespace SimpleStore\Http\Controllers\Cart;

use SimpleStore\Http\Controllers\Controller;

class ShippingController extends Controller
{
    /**
     * The main action in cart shipping
     *
     * @return Illuminate\View\View | Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('cart.ship');
    }
}
