<?php

namespace SimpleStore\Repositories;

use Illuminate\Session\SessionManager;
use SimpleStore\Services\UtilService;
use SimpleStore\Services\OrderService;

class CartRepository extends BaseRepository
{
    protected $steps;
    protected $orderService;
    protected $productRepository;

    public function __construct()
    {
        $this->orderService = new OrderService();
        $this->productRepository = new ProductRepository();

        $this->steps = [
            'cart' => 'cart',
            'ship' => 'cart-ship',
            'pay'  => 'cart-pay'
        ];
    }

    /**
     * Add a product to cart.
     *
     * @param SessionManager $session Inject the current request session
     * @param Array $data The data array, with product id and how many
     *
     * @return Boolean
     */
    public function addToCart(SessionManager $session, Array $data)
    {
        $cartContent = [
            'id' => $data['id'],
            'howMany' => $data['howMany']
        ];

        return $session->push($this->steps['cart'], $cartContent);
    }

    /**
     * Get all items in the cart and yours data
     * (id, howMany, name, description, price, quantity and total)
     *
     * @return mixed $cart
     */
    public function getCart()
    {
        $cart = session($this->steps['cart']);

        if (!empty($cart)) {
            foreach ($cart as &$item) {
                $info = $this->productRepository->findByID($item['id']);

                // Pushing product info into cart item array
                $item += [
                    'name' => $info['name'],
                    'description' => $info['description'],
                    'price' => $info['price'],
                    'quantity' => $info['quantity'],
                    'total' => UtilService::formatCurrency($info['price'] * $item['howMany'])
                ];
            }

            return $cart;
        }

        return [];
    }

    /**
     * Get the cart totals values
     *
     * @return mixed $counter
     */
    public function getCartCounter()
    {
        $cart = session($this->steps['cart']);

        $counter = [
            'product'   => 0,
            'tax'       => 0,
            'transport' => 0,
            'other'     => 0,
            'total'     => 0,
            'items'     => []
        ];

        if (!empty($cart)) {
            foreach ($cart as &$item) {

                $info = $this->productRepository->findByID($item['id']);

                $counter['product'] += $info['price'] * $item['howMany'];

                $counter['items'][$item['id']] = [
                    'unitPrice' => (float) $info['price'],
                    'howMany'   => $item['howMany'],
                    'product'   => $info['price'] * $item['howMany'],
                    'tax'       => 0,
                    'other'     => 0
                ];
            }
        }

        return $counter;
    }

    /**
     * Return the stored data of an specific cart step
     *
     * @param SessionManager $session Inject the current request session
     * @param string $step The step name, like in $this->steps
     *
     * @return array
     */
    public function getCartStepInfo(SessionManager $session, string $step)
    {
        return $session->get($this->steps[$step], []);
    }

    /**
     * Save the step data in the session
     *
     * @param SessionManager $session Inject the current request session
     * @param string $step The step name, like in $this->steps
     * @param array $data The data that will be stored
     *
     * @return void
     */
    public function saveCartStepInfo(SessionManager $session, string $step, array $data)
    {
        return $session->put($this->steps[$step], $data);
    }

    /**
     * Save the order in database
     *
     * @param SessionManager $session Inject the current request session
     * @param array $paymentData Payment step data
     */
    public function saveOrder(SessionManager $session, array $paymentData)
    {
        $cartData = $session->get($this->steps['cart'], []);
        $shippingData = $session->get($this->steps['ship'], []);

        $this->orderService->putNewOrder($cartData, $shippingData, $paymentData);
    }
}
