<?php

namespace SimpleStore\Services;

class PaymentService
{
    /**
     *
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
     *
     */
    private function captureDebit(array $paymentData)
    {
        return true;
    }

    /**
     *
     */
    private function captureCredit(array $paymentData)
    {
        return true;
    }
}
