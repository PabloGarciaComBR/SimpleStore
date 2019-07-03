<?php

namespace SimpleStore\Services;

class PaymentService
{
    /**
     * Receive the payment data and select the correct method to process it
     *
     * @param float $amount
     * @param array $paymentData
     *
     * @return boolean
     */
    public function processPayment(float $amount, array $paymentData)
    {
        switch ($paymentData['paymentMethod']) {
            case 1:
                return $this->captureCredit($paymentData, $amount);
            case 3:
                return $this->capturePrepaid($paymentData, $amount);
            case 2:
            case 4:
            case 5:
            case 6:
                return $this->capturePostpaid($paymentData, $amount);
            default:
                return false;
        }
    }

    /**
     * Process the capture of a payment by prepaid method
     *
     * @param array $paymentData
     * @param float $amount
     *
     * @return boolean
     */
    private function capturePrepaid(array $paymentData, float $amount)
    {
        return true;
    }

    /**
     * Process the capture of a payment by credit card
     *
     * @param array $paymentData
     * @param float $amount
     *
     * @return boolean
     */
    private function captureCredit(array $paymentData, float $amount)
    {
        return true;
    }

    /**
     * Process the capture of a payment by postpaid methods
     *
     * @param array $paymentData
     * @param float $amount
     *
     * @return boolean
     */
    private function capturePostpaid(array $paymentData, float $amount)
    {
        return false;
    }
}
