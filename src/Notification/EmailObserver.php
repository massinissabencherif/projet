<?php

namespace JeffBisous\Mamazon\Notification;

use JeffBisous\Mamazon\Order;

class EmailObserver implements OrderObserverInterface
{
    public function update(Order $order): void
    {
        echo "  • Email à {$order->getCustomerEmail()}\n";
        echo "    Sujet: Confirmation de commande {$order->getId()}\n";
        echo "    Montant: {$order->getTotal()}€\n";
        echo "✓ Email envoyé\n";
    }
}
