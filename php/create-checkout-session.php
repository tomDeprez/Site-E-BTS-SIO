<?php
session_start();
require_once 'config.php';

// Installation de Stripe: composer require stripe/stripe-php
// Si vous n'avez pas Composer, téléchargez: https://getcomposer.org/
require_once __DIR__ . '/../vendor/autoload.php';

header('Content-Type: application/json');

try {
    // Récupérer les données POST
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if (!$data || !isset($data['cart']) || empty($data['cart'])) {
        throw new Exception('Panier vide ou données invalides');
    }

    // Configurer Stripe
    \Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

    // Préparer les items pour Stripe
    $lineItems = [];
    foreach ($data['cart'] as $item) {
        $lineItems[] = [
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => $item['nom'],
                    'images' => [$item['image']],
                ],
                'unit_amount' => intval($item['prix'] * 100), // Stripe utilise les centimes
            ],
            'quantity' => $item['qty'],
        ];
    }

    // Sauvegarder les infos de livraison en session
    $_SESSION['shipping_info'] = [
        'prenom' => $data['prenom'],
        'nom' => $data['nom'],
        'email' => $data['email'],
        'telephone' => $data['telephone'],
        'adresse' => $data['adresse'],
        'code_postal' => $data['code_postal'],
        'ville' => $data['ville'],
        'pays' => $data['pays'],
    ];

    // Créer la session Stripe Checkout
    $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => $lineItems,
        'mode' => 'payment',
        'success_url' => BASE_URL . '/success.php?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => BASE_URL . '/cancel.php',
        'customer_email' => $data['email'],
        'billing_address_collection' => 'auto',
        'shipping_address_collection' => [
            'allowed_countries' => ['FR', 'BE', 'CH', 'LU'],
        ],
    ]);

    echo json_encode(['url' => $checkout_session->url]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
