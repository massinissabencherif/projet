<?php

namespace JeffBisous\Mamazon\Validation;

class AddressValidator extends AbstractValidator
{
    protected function handle(array $orderData): void
    {
        if (empty($orderData['shipping_address'])) {
            throw new \Exception("Adresse de livraison manquante.");
        }
    }
}
