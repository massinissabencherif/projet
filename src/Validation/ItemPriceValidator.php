<?php

namespace JeffBisous\Mamazon\Validation;

class ItemPriceValidator extends AbstractValidator
{
    protected function handle(array $orderData): void
    {
        foreach ($orderData['items'] as $item) {
            if ($item['price'] <= 0) {
                throw new \Exception("Prix invalide pour l'article : " . $item['name']);
            }
        }
    }
}
