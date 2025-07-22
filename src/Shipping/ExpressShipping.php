<?php

namespace JeffBisous\Mamazon\Shipping;

class ExpressShipping implements ShippingMethodInterface
{
    public function ship(array $orderData): void
    {
        echo "  • Livraison express (24h)\n";
        echo "  • Chronopost\n";
        echo "  • Frais: 12.99€\n";
        echo "✓ Livraison express programmée\n";
    }
}
