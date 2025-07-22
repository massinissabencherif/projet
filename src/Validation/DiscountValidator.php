<?php

namespace JeffBisous\Mamazon\Validation;

class DiscountValidator extends AbstractValidator
{
    protected function handle(array $orderData): void
    {
        if (!isset($orderData['discount_code'])) {
            throw new \Exception("Code de remise manquant.");
        }

        $validCodes = ['WELCOME10', 'STUDENT20'];
        if (!in_array($orderData['discount_code'], $validCodes, true)) {
            throw new \Exception("Code de remise invalide.");
        }
    }
}
