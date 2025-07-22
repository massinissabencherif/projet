<?php

namespace JeffBisous\Mamazon;

use JeffBisous\Mamazon\Validation\EmailValidator;
use JeffBisous\Mamazon\Validation\ItemsValidator;
use JeffBisous\Mamazon\Validation\AddressValidator;
use JeffBisous\Mamazon\Validation\DiscountValidator;
use JeffBisous\Mamazon\Validation\DeliveryMethodValidator;
use JeffBisous\Mamazon\Payment\PaymentMethodValidator;
use JeffBisous\Mamazon\Payment\PaymentStrategyFactory;
use JeffBisous\Mamazon\Notification\OrderNotifier;
use JeffBisous\Mamazon\Notification\EmailObserver;
use JeffBisous\Mamazon\Notification\SmsObserver;
use JeffBisous\Mamazon\Notification\PushObserver;

class OrderManager
{
    private OrderNotifier $notifier;

    public function __construct()
    {
        $this->notifier = new OrderNotifier();
        $this->notifier->attach(new EmailObserver());
        $this->notifier->attach(new SmsObserver());
        $this->notifier->attach(new PushObserver());
    }

    public function processOrder(array $orderData): void
    {
        echo "🛒 Commande: {$orderData['id']}\n";
        echo "🔍 Validation de la commande...\n";

        if (!$this->validateOrder($orderData)) {
            return;
        }

        echo "✓ Commande valide\n";

        $total = $this->calculateTotal($orderData);
        $total = $this->applyDiscount($total, $orderData);

        $orderData['order_id'] = $orderData['id'] ?? 'N/A';

        $this->processPayment($orderData['payment_method'], $total, $orderData);
        $this->handleDelivery($orderData);
        $this->sendNotifications($orderData, $total);
        $this->saveOrder($orderData['id']);

        echo "✅ ✅ Commande {$orderData['id']} traitée avec succès - Total: {$total}€\n";
        echo "------------------------------\n\n";
    }

    private function validateOrder(array $orderData): bool
    {
        $emailValidator     = new EmailValidator();
        $itemsValidator     = new ItemsValidator();
        $addressValidator   = new AddressValidator();
        $paymentValidator   = new PaymentMethodValidator();
        $deliveryValidator  = new DeliveryMethodValidator();

        // Chaînage des validateurs (Chain of Responsibility)
        $emailValidator->setNext($itemsValidator)
                       ->setNext($addressValidator)
                       ->setNext($paymentValidator)
                       ->setNext($deliveryValidator);

        try {
            $emailValidator->validate($orderData);
            return true;
        } catch (\Exception $e) {
            echo "❌ Commande invalide : " . $e->getMessage() . "\n";
            return false;
        }
    }

    private function calculateTotal(array $orderData): float
    {
        echo "💰 Calcul du total...\n";
        $total = 0.0;
        foreach ($orderData['items'] as $item) {
            $lineTotal = $item['price'] * $item['quantity'];
            echo "  • {$item['name']} x{$item['quantity']} = {$lineTotal}€\n";
            $total += $lineTotal;
        }
        echo "✓ Total: {$total}€\n";
        return $total;
    }

    private function applyDiscount(float $total, array $orderData): float
    {
        echo "🎫 Application des remises...\n";

        $validator = new DiscountValidator();
        if (!$validator->validate($orderData)) {
            echo "✓ Aucune remise appliquée\n";
            return $total;
        }

        $discountCode = $orderData['discount_code'];
        $discounts = [
            'WELCOME10' => 0.10,
            'STUDENT20' => 0.20,
        ];

        $rate = $discounts[$discountCode] ?? 0.0;

        $discountAmount = $total * $rate;
        $newTotal = $total - $discountAmount;

        echo "✓ Remise {$discountCode}: -" . ($rate * 100) . "% = -{$discountAmount}€\n";

        return $newTotal;
    }

    private function processPayment(string $method, float $amount, array $orderData): void
    {
        echo "💳 Traitement du paiement ({$amount}€)...\n";
        $strategy = PaymentStrategyFactory::create($method);
        $strategy->pay($amount, $orderData);
    }

    private function handleDelivery(array $orderData): void
    {
        echo "📦 Gestion de la livraison...\n";
        $delivery = $orderData['delivery'];

        switch ($delivery['type']) {
            case 'express':
                echo "  • Livraison express (24h)\n";
                echo "  • {$delivery['carrier']}\n";
                echo "  • Frais: {$delivery['price']}€\n";
                echo "✓ Livraison express programmée\n";
                break;
            case 'standard':
                echo "  • Livraison standard (3-5 jours)\n";
                echo "  • {$delivery['carrier']}\n";
                echo "  • Frais: {$delivery['price']}€\n";
                echo "✓ Livraison standard programmée\n";
                break;
            case 'pickup':
                echo "  • Retrait en magasin\n";
                echo "  • Magasin: {$delivery['store_address']}\n";
                echo "  • Gratuit\n";
                echo "✓ Retrait en magasin configuré\n";
                break;
            default:
                echo "❌ Type de livraison inconnu\n";
        }
    }

    private function sendNotifications(array $orderData, float $total): void
    {
        echo "📧 Envoi des notifications...\n";
        $order = new Order(
            $orderData['id'],
            $orderData['customer_email'],
            $total,
            $orderData['customer_phone'] ?? ''
        );
        $this->notifier->notify($order);
    }

    private function saveOrder(string $orderId): void
    {
        echo "💾 Sauvegarde de la commande...\n";
        echo "✓ Commande sauvegardée (ID: {$orderId})\n";
    }
}
