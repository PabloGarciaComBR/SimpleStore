<?php

namespace SimpleStore\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
use SimpleStore\Models\Order;
use SimpleStore\Models\OrderItem;
use SimpleStore\Models\UserAddress;

class OrderService
{
    /**
     * Process data and save a new order in database
     *
     * @param array $cartData The items in the cart data
     * @param array $shippingData The address and shipping data
     * @param array $paymentData The payment data
     *
     * @return boolean
     */
    public function putNewOrder(array $cartData, array $shippingData, array $paymentData)
    {
        DB::beginTransaction();

        try {

            $userId        = $id = Auth::user()->id;
            dd($userId);
            $userAddressId = $this->saveUserAddress();
            $orderId       = $this->saveOrder();
            $this->saveOrderItems($cartData);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        //payments
        //user_addresses
        //orders

        // FK user_address >> order
    }

    /**
     *
     */
    private function saveOrderItems(array $cartData)
    {
        dd($cartData);
    }

    private function savePayment()
    {
        //
    }

    private function saveUserAddress()
    {
        //
    }

    private function saveOrder()
    {
        //
    }
}
