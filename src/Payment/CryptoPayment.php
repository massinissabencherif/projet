<?php

namespace JeffBisous\Mamazon\Payment;

class CryptoPayment implements PaymentStrategyInterface
{
    public function pay(float $amount, array $orderData): void
    {
        $btcAmount = $amount / 45000;
        echo "  • Génération de l'adresse Bitcoin...\n";
        echo "  • Montant: {$btcAmount} BTC\n";
        echo "✓ Paiement crypto initié\n";
    }
}
