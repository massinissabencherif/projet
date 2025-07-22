<?php

require_once __DIR__ . '/vendor/autoload.php';

use JeffBisous\Mamazon\OrderManager;

echo "=== Système de Gestion de Commandes E-commerce ===\n\n";

$orderManager = new OrderManager();

$orders = [
    [
        'id' => 'CMD001',
        'customer_email' => 'jean@example.com',
        'customer_phone' => '+33123456789',
        'items' => [
            ['name' => 'Laptop', 'price' => 999.99, 'quantity' => 1],
            ['name' => 'Mouse', 'price' => 29.99, 'quantity' => 2]
        ],
        'payment_method' => 'credit_card',
        'shipping_address' => '123 rue de Paris, 75001 Paris',
        'delivery' => [
            'type' => 'express',
            'carrier' => 'Chronopost',
            'price' => 9.99
        ],
        'discount_code' => 'WELCOME10'
    ],
    [
        'id' => 'CMD002',
        'customer_email' => 'marie@example.com',
        'customer_phone' => '',
        'items' => [
            ['name' => 'Keyboard', 'price' => 79.99, 'quantity' => 1]
        ],
        'payment_method' => 'paypal',
        'shipping_address' => '42 avenue de Lyon, 69000 Lyon',
        'delivery' => [
            'type' => 'standard',
            'carrier' => 'Colissimo',
            'price' => 5.99
        ],
        'discount_code' => ''
    ],
    [
        'id' => 'CMD003',
        'customer_email' => 'pierre@example.com',
        'customer_phone' => '+33987654321',
        'items' => [
            ['name' => 'Monitor', 'price' => 299.99, 'quantity' => 1],
            ['name' => 'Cable HDMI', 'price' => 19.99, 'quantity' => 3]
        ],
        'payment_method' => 'bank_transfer',
        'shipping_address' => '87 boulevard Haussmann, 75008 Paris',
        'delivery' => [
            'type' => 'pickup',
            'store_address' => 'Magasin Fnac République'
        ],
        'discount_code' => 'STUDENT20'
    ]
];

echo "Traitement des commandes...\n";
echo str_repeat("-", 50) . "\n";

foreach ($orders as $orderData) {
    try {
        echo "\n🛒 Commande: " . $orderData['id'] . "\n";
        $result = $orderManager->processOrder($orderData);
        echo "✅ " . $result . "\n";
    } catch (Exception $e) {
        echo "❌ Erreur: " . $e->getMessage() . "\n";
    }
    echo str_repeat("-", 30) . "\n";
}

echo "\n=== Fin du traitement ===\n";
