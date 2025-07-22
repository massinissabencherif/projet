<?php

namespace JeffBisous\Mamazon\Payment;

class PaypalPayment implements PaymentStrategyInterface
{
    public function pay(float $amount, array $orderData): void
    {
        echo "  • Connexion à l'API PayPal...\n";
        echo "  • Redirection vers PayPal...\n";
        echo "  • Paiement PayPal de {$amount}€ confirmé\n";
        echo "✓ Paiement PayPal traité avec succès\n";
    }
}
