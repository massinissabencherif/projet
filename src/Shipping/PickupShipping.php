<?php

namespace JeffBisous\Mamazon\Shipping;

class PickupShipping implements ShippingMethodInterface
{
    public function ship(array $orderData): void
    {
        echo "  • Retrait en magasin\n";
        echo "  • Magasin: 123 Rue de la Paix, Paris\n";
        echo "  • Gratuit\n";
        echo "✓ Retrait en magasin configuré\n";
    }
}
