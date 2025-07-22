<?php

namespace JeffBisous\Mamazon\Validation;

interface ValidatorInterface
{
    public function setNext(ValidatorInterface $next): ValidatorInterface;
    public function validate(array $orderData): bool;
}
