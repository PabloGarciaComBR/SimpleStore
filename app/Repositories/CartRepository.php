<?php

namespace SimpleStore\Repositories;

use Illuminate\Session\SessionManager;

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

            $currentSessionContent = $session->get('cart', function(){ return []; });

            $cartContent = array_push($currentSessionContent, [
                'id' => $data['id'],
                'howMany' => $data['howMany']
            ]);

            $session->push('cart', $cartContent);

            return true;

        } catch(Exception $e) {

            $message = "An exception was found in addToCart method. See details: " . $e->getMessage();
            Log::alert($message);

            return false;

        }
    }
}
