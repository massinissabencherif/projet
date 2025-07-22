<?php

namespace JeffBisous\Mamazon\Payment;

interface PaymentStrategyInterface
{
    public function pay(float $amount, array $orderData): void;
}
