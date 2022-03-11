<?php
class payment
{
    public function pay(int $amount, string $paymentType)
    {
        if ($paymentType == 'CacheOn')
            echo "Pay $amount through CacheOn";
        if ($paymentType == 'Online')
            echo "Pay $amount through Online";
    }
}

$payment = new payment;
$payment->pay(10000, 'Online');
