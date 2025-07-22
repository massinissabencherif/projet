<?php

namespace JeffBisous\Mamazon\Payment;

class BankTransferPayment implements PaymentStrategyInterface
{
    public function pay(float $amount, array $orderData): void
    {
        echo "  • Génération des informations de virement...\n";
        echo "  • RIB: FR76 1234 5678 9012 3456 789\n";

        // Vérifie si 'order_id' existe dans les données
        $reference = $orderData['order_id'] ?? 'N/A';
        echo "  • Référence: {$reference}\n";

        echo "✓ Instructions de virement envoyées\n";
    }
}
