<?php

namespace SimpleStore\Http\Controllers\Cart;

use SimpleStore\Http\Controllers\Controller;
use SimpleStore\Repositories\PaymentTypeRepository;

class PaymentController extends Controller
{
    /**
     * The main action in cart payment
     *
     * @return Illuminate\View\View | Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $paymentTypeRepository = new PaymentTypeRepository();

        $types = $paymentTypeRepository->getPaymentTypes();
        return view('cart.pay', ['paymentTypes' => $types]);
    }
}
