<?php

namespace JeffBisous\Mamazon\Notification;

use JeffBisous\Mamazon\Order;

class OrderNotifier
{
    /**
     * @var OrderObserverInterface[]
     */
    private array $observers = [];

    public function attach(OrderObserverInterface $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(OrderObserverInterface $observer): void
    {
        $this->observers = array_filter(
            $this->observers,
            fn ($obs) => $obs !== $observer
        );
    }

    public function notify(Order $order): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($order);
        }
    }
}
