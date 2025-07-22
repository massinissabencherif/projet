<?php

namespace JeffBisous\Mamazon\Shipping;

interface ShippingMethodInterface
{
    public function ship(array $orderData): void;
}
