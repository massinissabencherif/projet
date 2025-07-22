<?php

namespace JeffBisous\Mamazon\Validation;

class EmailFormatValidator extends AbstractValidator
{
    protected function handle(array $orderData): void
    {
        if (!preg_match('/^[^@]+@[^@]+\.[^@]+$/', $orderData['customer_email'])) {
            throw new \Exception("Format d'email incorrect.");
        }
    }
}
