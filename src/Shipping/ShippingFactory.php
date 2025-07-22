<?php

namespace JeffBisous\Mamazon\Shipping;

use InvalidArgumentException;

class ShippingFactory
{
    public static function create(string $method): ShippingMethodInterface
    {
        return match ($method) {
            'standard' => new StandardShipping(),
            'express'  => new ExpressShipping(),
            'pickup'   => new PickupShipping(),
            default    => throw new InvalidArgumentException("Méthode de livraison non supportée: {$method}")
        };
    }
}
