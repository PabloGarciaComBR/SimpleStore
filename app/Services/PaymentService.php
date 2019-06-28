<?php

namespace SimpleStore\Services;

class PaymentService
{
    /**
     * Receive the payment data and select the correct method to process it
     *
     * @param array $paymentData
     *
     * @return boolean
     */
    public function processPayment(array $paymentData)
    {
        switch ($paymentData['paymentMethod']) {
            case 'debit':
                return $this->captureDebit($paymentData);
                break;
            case 'credit':
                return $this->captureCredit($paymentData);
                break;
        }
    }

    /**
     * Process the capture of a payment by debit card
     *
     * @param array $paymentData
     *
     * @return boolean
     */
    private function captureDebit(array $paymentData)
    {
        return true;
    }

    /**
     * Process the capture of a payment by credit card
     *
     * @param array $paymentData
     *
     * @return boolean
     */
    private function captureCredit(array $paymentData)
    {
        return true;
    }
}
