<?php

namespace JeffBisous\Mamazon\Shipping;

class StandardShipping implements ShippingMethodInterface
{
    public function ship(array $orderData): void
    {
        echo "  • Livraison standard (3-5 jours)\n";
        echo "  • Colissimo suivi\n";
        echo "  • Frais: 5.99€\n";
        echo "✓ Livraison standard programmée\n";
    }
}
