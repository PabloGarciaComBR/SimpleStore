<?php

namespace SimpleStore\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use SimpleStore\Models\Order;
use SimpleStore\Models\OrderItem;
use SimpleStore\Models\UserAddress;
use SimpleStore\Services\PostalcodeService;
use SimpleStore\Repositories\CartRepository;

class OrderService
{

    protected $postalcodeService;
    protected $cartRepository;

    /**
     * The constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->postalcodeService = new PostalcodeService();
        $this->cartRepository = new CartRepository();
    }

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

            $userId          = Auth::user()->id;
            $userAddressData = $this->saveUserAddress($shippingData, $userId);
            $orderData       = $this->saveOrder($userId, $userAddressData['id'], $this->cartRepository->getCartCounter());
            $this->saveOrderItems($cartData);

            dd($orderData);

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

        $postalcodeData = $this->postalcodeService->saveOrGet(
            $shippingData['postalcode'],
            $shippingData['city'],
            $shippingData['address'],
            ''
        );

        $userAddressData = UserAddress::create([
            'user_id' => $userId,
            'country_id' => $shippingData['country'],
            'state_id' => $shippingData['state'],
            'city_id' => $shippingData['city'],
            'postalcode_id' => $postalcodeData['id'],
            'address' => $shippingData['address'],
            'address_2' => $shippingData['address2']
        ]);

        return is_object($userAddressData) ? $userAddressData->toArray() : [];
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
        $orderData = Order::create([
            'user_id' => $userId,
            'user_address_id' => $userAddressId,
            'product_value' => $cartCounter['product'],
            'tax_value' => $cartCounter['tax'],
            'transport_value' => $cartCounter['transport'],
            'other_value' => $cartCounter['other'],
            'order_status_id' => 1
        ]);

        return is_object($orderData) ? $orderData->toArray() : [];
    }
}
