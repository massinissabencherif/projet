<?php

namespace JeffBisous\Mamazon\Payment;

use InvalidArgumentException;

class PaymentStrategyFactory
{
    public static function create(string $method): PaymentStrategyInterface
    {
        return match ($method) {
            'credit_card' => new CreditCardPayment(),
            'paypal' => new PayPalPayment(),
            'bank_transfer' => new BankTransferPayment(),
            default => throw new InvalidArgumentException("Méthode de paiement inconnue: $method")
        };
    }
}
