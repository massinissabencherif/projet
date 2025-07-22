<?php

namespace JeffBisous\Mamazon\Notification;

use JeffBisous\Mamazon\Order;

class SMSObserver implements OrderObserverInterface
{
    public function update(Order $order): void
    {
        if (empty($order->getCustomerPhone())) {
            return;
        }

        echo "  • SMS au {$order->getCustomerPhone()}\n";
        echo "    Message: Votre commande {$order->getId()} est confirmée\n";
        echo "✓ SMS envoyé\n";
    }
}
