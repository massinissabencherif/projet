<?php

namespace JeffBisous\Mamazon\Payment;

use InvalidArgumentException;

class PaymentProcessor
{
    public function process(string $paymentMethod, float $amount, array $orderData): void
    {
        $strategy = $this->resolveStrategy($paymentMethod);
        $strategy->pay($amount, $orderData);
    }

    private function resolveStrategy(string $method): PaymentStrategyInterface
    {
        return match ($method) {
            'credit_card'   => new CreditCardPayment(),
            'paypal'        => new PaypalPayment(),
            'bank_transfer' => new BankTransferPayment(),
            'crypto'        => new CryptoPayment(),
            default         => throw new InvalidArgumentException("Méthode de paiement non supportée: {$method}")
        };
    }
}
