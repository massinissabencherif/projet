<?php

namespace JeffBisous\Mamazon\Validation;

class ItemsValidator extends AbstractValidator
{
    protected function handle(array $orderData): void
    {
        if (empty($orderData['items']) || !is_array($orderData['items'])) {
            throw new \Exception("Aucun article dans la commande.");
        }
    }
}
