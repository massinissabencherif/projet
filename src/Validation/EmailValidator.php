<?php

namespace JeffBisous\Mamazon\Validation;

class EmailValidator extends AbstractValidator
{
    protected function handle(array $orderData): void
    {
        if (empty($orderData['customer_email'])) {
            throw new \Exception("Adresse email manquante.");
        }

        if (!filter_var($orderData['customer_email'], FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Adresse email invalide.");
        }
    }
}
