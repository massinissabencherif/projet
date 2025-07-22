<?php

namespace JeffBisous\Mamazon\Payment;

require_once __DIR__ . '/PaymentStrategyInterface.php'; // TEMPORAIRE pour debug

class CreditCardPayment implements PaymentStrategyInterface
{
    public function pay(float $amount, array $orderData): void
    {
        echo "  • Connexion à l'API Stripe...\n";
        echo "  • Vérification de la carte bancaire...\n";
        echo "  • Débit de {$amount}€ effectué\n";
        echo "✓ Paiement CB traité avec succès\n";
    }
}
