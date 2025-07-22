<?php

namespace JeffBisous\Mamazon\Validation;

abstract class AbstractValidator implements ValidatorInterface
{
    private ?ValidatorInterface $next = null;

    public function setNext(ValidatorInterface $next): ValidatorInterface
    {
        $this->next = $next;
        return $next;
    }

    public function validate(array $orderData): bool
    {
        try {
            $this->handle($orderData);
            if ($this->next) {
                return $this->next->validate($orderData);
            }
            return true;
        } catch (\Exception $e) {
            echo "❌ " . $e->getMessage() . "\n";
            return false;
        }
    }

    abstract protected function handle(array $orderData): void;
}
