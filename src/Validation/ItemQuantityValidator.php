<?php

namespace JeffBisous\Mamazon\Validation;

class ItemQuantityValidator extends AbstractValidator
{
    protected function handle(array $orderData): void
    {
        foreach ($orderData['items'] as $item) {
            if ($item['quantity'] <= 0) {
                throw new \Exception("Quantité invalide pour l'article : " . $item['name']);
            }
        }
    }
}
