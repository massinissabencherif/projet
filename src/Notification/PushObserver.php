<?php

namespace JeffBisous\Mamazon\Notification;

use JeffBisous\Mamazon\Order;

class PushObserver implements OrderObserverInterface
{
    public function update(Order $order): void
    {
        echo "  • Notification push envoyée\n";
    }
}
