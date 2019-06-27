<?php

namespace SimpleStore\Http\Controllers\Cart;

use SimpleStore\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * The main action in cart payment
     *
     * @return Illuminate\View\View | Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('cart.pay');
    }
}
