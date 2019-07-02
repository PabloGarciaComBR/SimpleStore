<?php

namespace SimpleStore\Http\Controllers\Cart;

use Illuminate\Http\Request;
use SimpleStore\Http\Controllers\Controller;
use SimpleStore\Repositories\CartRepository;
use SimpleStore\Services\UtilService;

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
        return view('cart.index', [
            'cart' => $cart,
            'total' => UtilService::formatCurrency($counter['product'])
        ]);
    }

    /**
     * This actions saves the date of shipment step
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Routing\Redirector
     */
    public function saveShipping(Request $request)
    {
        $requestData = $request->all();
        array_pull($requestData, "_token");

        $this->cartRepository->saveCartStepInfo(session(), "ship", $requestData);

        return redirect()->route("cart-pay");
    }

    /**
     * This actions saves the order
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Routing\Redirector
     */
    public function saveOrder(Request $request)
    {
        $session = session();
        $requestData = $request->all();
        array_pull($requestData, "_token");

        $this->cartRepository->saveOrder($session, $requestData);

        dd($requestData);
    }
}
