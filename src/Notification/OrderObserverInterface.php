<?php

namespace JeffBisous\Mamazon\Notification;

use JeffBisous\Mamazon\Order;

interface OrderObserverInterface
{
    public function update(Order $order): void;
}
