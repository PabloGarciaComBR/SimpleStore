<?php

namespace SimpleStore\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use SimpleStore\Models\Order;
use SimpleStore\Models\OrderItem;
use SimpleStore\Models\UserAddress;
use SimpleStore\Models\Payment;
use SimpleStore\Repositories\CartRepository;

class OrderService
{
    /**
     * Process data and save a new order in database. Return the order ID.
     *
     * @param array $cartData The items in the cart data
     * @param array $shippingData The address and shipping data
     * @param array $paymentData The payment data
     *
     * @return int
     */
    public function putNewOrder(array $cartData, array $shippingData, array $paymentData)
    {
        $cartRepository = new CartRepository();

        DB::beginTransaction();

        try {
            $cartCounter = $cartRepository->getCartCounter();

            $userId  = Auth::user()->id;
            $address = $this->saveUserAddress($shippingData, $userId);
            $order   = $this->saveOrder($userId, $address['id'], $cartCounter);
            $item    = $this->saveOrderItems($order['id'], $cartData, $cartCounter);
            $pay     = $this->savePayment($order['id'], $cartCounter, $paymentData);

            DB::commit();
            return $order['id'];
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Save all the items in database
     *
     * @param int $orderId
     * @param array $cartData
     * @param array $cartCounter
     *
     * @return array
     */
    private function saveOrderItems(int $orderId, array $cartData, array $cartCounter)
    {
        $itemData = [];

        foreach ($cartData as $item) {
            $res = OrderItem::create([
                'order_id' => $orderId,
                'product_id' => $item['id'],
                'quantity' => $item['howMany'],
                'item_status_id' => 1,
                'product_value' => $cartCounter['items'][$item['id']]['product'],
                'tax_value' => $cartCounter['items'][$item['id']]['tax'],
                'other_value' => $cartCounter['items'][$item['id']]['other']
            ]);

            $itemData += is_object($res) ? $res->toArray() : [];
        }

        return $itemData;
    }

    /**
     * Save the payment data in database
     *
     * @param int $orderId
     * @param array $cartCounter
     * @param array $paymentData
     *
     * @return array
     */
    private function savePayment(int $orderId, array $cartCounter, array $paymentData)
    {
        $res = Payment::create([
            'order_id' => $orderId,
            'value' => $cartCounter['total'],
            'status' => 'pending',
            'payment_type_id' => $paymentData['paymentMethod']
        ]);

        return is_object($res) ? $res->toArray() : [];
    }

    /**
     * Save the user address in database
     *
     * @param array $shippingData
     * @param int $userId
     *
     * @return array
     */
    private function saveUserAddress(array $shippingData, int $userId)
    {
        $postalcodeService = new PostalcodeService();

        $postalcodeData = $postalcodeService->saveOrGet(
            $shippingData['postalcode'],
            $shippingData['city'],
            $shippingData['address'],
            ''
        );

        $res = UserAddress::create([
            'user_id' => $userId,
            'country_id' => $shippingData['country'],
            'state_id' => $shippingData['state'],
            'city_id' => $shippingData['city'],
            'postalcode_id' => $postalcodeData['id'],
            'address' => $shippingData['address'],
            'address_2' => $shippingData['address2']
        ]);

        return is_object($res) ? $res->toArray() : [];
    }

    /**
     * Save order data in database
     *
     * @param int $userId
     * @param int $userAddressId
     * @param array $cartCounter
     *
     * @return array
     */
    private function saveOrder(int $userId, int $userAddressId, array $cartCounter)
    {
        $res = Order::create([
            'user_id' => $userId,
            'user_address_id' => $userAddressId,
            'product_value' => $cartCounter['product'],
            'tax_value' => $cartCounter['tax'],
            'transport_value' => $cartCounter['transport'],
            'other_value' => $cartCounter['other'],
            'order_status_id' => 1
        ]);

        return is_object($res) ? $res->toArray() : [];
    }
}
