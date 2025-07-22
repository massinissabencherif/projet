<?php

namespace JeffBisous\Mamazon;

class Order
{
    private string $id;
    private string $customerEmail;
    private ?string $customerPhone;
    private float $total;

    public function __construct(string $id, string $customerEmail, float $total, ?string $customerPhone = null)
    {
        $this->id = $id;
        $this->customerEmail = $customerEmail;
        $this->total = $total;
        $this->customerPhone = $customerPhone;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    public function getCustomerPhone(): ?string
    {
        return $this->customerPhone;
    }

    public function getTotal(): float
    {
        return $this->total;
    }
}
