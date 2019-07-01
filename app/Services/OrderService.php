<?php

namespace SimpleStore\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use SimpleStore\Models\Order;
use SimpleStore\Models\OrderItem;
use SimpleStore\Models\UserAddress;
use SimpleStore\Services\PostalcodeService;

class OrderService
{

    protected $postalcodeService;

    /**
     * The constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->postalcodeService = new PostalcodeService();
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

            $userId        = Auth::user()->id;
            $userAddressId = $this->saveUserAddress($shippingData, $userId);
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

        dd($userAddressData);
    }

    private function saveOrder()
    {
        //
    }
}
