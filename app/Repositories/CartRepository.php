<?php

namespace SimpleStore\Repositories;

use Illuminate\Session\SessionManager;
use SimpleStore\Services\UtilService;

class CartRepository extends BaseRepository
{
    /**
     * Add a product to cart.
     *
     * @param Store $session Inject the current request session
     * @param Array $data The data array, with product id and how many
     *
     * @return Boolean
     */
    public function addToCart(SessionManager $session, Array $data)
    {
        try {
            $currentSessionContent = $session->get('cart', function () {
                return [];
            });

            $cartContent = [
                'id' => $data['id'],
                'howMany' => $data['howMany']
            ];

            $session->push('cart', $cartContent);

            return true;
        } catch (Exception $e) {
            $message = "An exception was found in addToCart method. See details: " . $e->getMessage();
            Log::alert($message);

            return false;
        }
    }

    /**
     * Get all items in the cart and yours data
     * (id, howMany, name, description, price, quantity and total)
     *
     * @return mixed $cart
     */
    public function getCart()
    {
        $product = new ProductRepository();

        $cart = session('cart');

        if (!empty($cart)) {
            foreach ($cart as &$item) {
                $info = $product->findByID($item['id']);

                // Pushing product info into cart item array
                $item += [
                    'name' => $info['name'],
                    'description' => $info['description'],
                    'price' => $info['price'],
                    'quantity' => $info['quantity'],
                    'total' => UtilService::formatCurrency($info['price'] * $item['howMany'])
                ];
            }
        } else {
            $cart = [];
        }

        return $cart;
    }

    /**
     * Get the all items cart total price
     *
     * @return mixed $counter
     */
    public function getCartCounter()
    {
        $product = new ProductRepository();
        $cart = session('cart');
        $counter = ['total' => 0];

        if (!empty($cart)) {
            foreach ($cart as &$item) {
                $info = $product->findByID($item['id']);
                $counter['total'] += $info['price'] * $item['howMany'];
            }
        }

        // Set the cart total to human format
        $counter['total'] = UtilService::formatCurrency($counter['total']);

        return $counter;
    }
}
