<?php

namespace JeffBisous\Mamazon\Payment;

use JeffBisous\Mamazon\Validation\AbstractValidator;

class PaymentMethodValidator extends AbstractValidator
{
    protected function handle(array $orderData): void
    {
        if (empty($orderData['payment_method'])) {
            throw new \Exception("Méthode de paiement manquante.");
        }

        $validMethods = ['credit_card', 'paypal', 'bank_transfer'];

        if (!in_array($orderData['payment_method'], $validMethods, true)) {
            throw new \Exception("Méthode de paiement invalide.");
        }
    }
}
