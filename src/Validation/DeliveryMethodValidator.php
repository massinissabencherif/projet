<?php

namespace JeffBisous\Mamazon\Validation;

class DeliveryMethodValidator extends AbstractValidator
{
    protected function handle(array $orderData): void
    {
        if (empty($orderData['delivery']['type'])) {
            throw new \Exception("Type de livraison manquant.");
        }

        $validMethods = ['express', 'standard', 'pickup'];
        if (!in_array($orderData['delivery']['type'], $validMethods, true)) {
            throw new \Exception("Type de livraison invalide.");
        }
    }
}
