<?php

require 'vendor/autoload.php';

use JeffBisous\Mamazon\Validation\EmailValidator;
use JeffBisous\Mamazon\Validation\ItemsValidator;
use JeffBisous\Mamazon\Validation\AddressValidator;
use JeffBisous\Mamazon\Payment\PaymentMethodValidator;
use JeffBisous\Mamazon\Validation\DeliveryMethodValidator;
use JeffBisous\Mamazon\Validation\DiscountValidator;

// Création de la chaîne de validateurs
$emailValidator = new EmailValidator();
$emailValidator
    ->setNext(new ItemsValidator())
    ->setNext(new AddressValidator())
    ->setNext(new PaymentMethodValidator())
    ->setNext(new DeliveryMethodValidator())
    ->setNext(new DiscountValidator());

// Données valides (à adapter selon les champs obligatoires)
$orderData = [
    'id' => 'CMD001',
    'customer_email' => 'client@example.com',
    'items' => [
        ['name' => 'Produit A', 'price' => 10.0, 'quantity' => 2],
        ['name' => 'Produit B', 'price' => 15.0, 'quantity' => 1]
    ],
    'shipping_address' => '123 Rue de Paris',
    'payment_method' => 'credit_card',
    'delivery' => ['type' => 'express'],
    'discount_code' => 'WELCOME10'
];

// Test de validation
echo "🔍 Test de validation...\n";
$isValid = $emailValidator->validate($orderData);

if ($isValid) {
    echo "✅ Commande valide\n";
} else {
    echo "❌ Commande invalide\n";
}
