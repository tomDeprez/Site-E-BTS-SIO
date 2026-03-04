<?php
session_start();
require_once 'php/config.php';

// Vérifier si on a un session_id de Stripe
$session_id = $_GET['session_id'] ?? null;

if (!$session_id) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Confirmée - MaBoutique</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @keyframes checkmark {
            0% {
                stroke-dashoffset: 100;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }
        @keyframes circle-fill {
            0% {
                opacity: 0;
                transform: scale(0);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        .checkmark-circle {
            animation: circle-fill 0.4s ease-out;
        }
        .checkmark-path {
            stroke-dasharray: 100;
            stroke-dashoffset: 100;
            animation: checkmark 0.6s ease-out 0.3s forwards;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Barre de Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <a href="index.php" class="text-2xl font-bold text-gray-800">MaBoutique</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <main class="container mx-auto px-6 py-12">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-2xl shadow-2xl p-12 text-center">
                <!-- Icône de succès animée -->
                <div class="flex justify-center mb-8">
                    <svg class="w-32 h-32" viewBox="0 0 100 100">
                        <circle class="checkmark-circle" cx="50" cy="50" r="45" fill="#10B981" opacity="0.2"/>
                        <circle cx="50" cy="50" r="45" fill="none" stroke="#10B981" stroke-width="3"/>
                        <path class="checkmark-path" fill="none" stroke="#10B981" stroke-width="5" stroke-linecap="round" d="M25 50 L40 65 L75 30"/>
                    </svg>
                </div>

                <h1 class="text-4xl font-bold text-gray-800 mb-4">Commande confirmée !</h1>
                <p class="text-xl text-gray-600 mb-8">Merci pour votre achat</p>

                <div class="bg-green-50 border-2 border-green-200 rounded-lg p-6 mb-8">
                    <div class="flex items-center justify-center text-green-700 mb-3">
                        <i class="fas fa-check-circle text-3xl mr-3"></i>
                        <span class="text-lg font-semibold">Paiement réussi</span>
                    </div>
                    <p class="text-gray-600">
                        Votre commande a été traitée avec succès. Vous allez recevoir un email de confirmation à l'adresse fournie.
                    </p>
                </div>

                <div class="bg-gray-50 rounded-lg p-6 mb-8 text-left">
                    <h2 class="text-2xl font-bold mb-4">Prochaines étapes</h2>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold mr-4 flex-shrink-0">1</div>
                            <div>
                                <h3 class="font-semibold text-lg">Confirmation par email</h3>
                                <p class="text-gray-600">Vous recevrez un email avec les détails de votre commande</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold mr-4 flex-shrink-0">2</div>
                            <div>
                                <h3 class="font-semibold text-lg">Préparation</h3>
                                <p class="text-gray-600">Nous préparons votre commande avec soin</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold mr-4 flex-shrink-0">3</div>
                            <div>
                                <h3 class="font-semibold text-lg">Expédition</h3>
                                <p class="text-gray-600">Livraison sous 3-5 jours ouvrés</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <a href="index.php" class="inline-block w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-4 px-8 rounded-lg text-lg font-bold hover:shadow-xl transform hover:scale-105 transition">
                        <i class="fas fa-home mr-2"></i> Retour à l'accueil
                    </a>
                    <a href="product.php" class="inline-block w-full bg-gray-200 text-gray-800 py-4 px-8 rounded-lg text-lg font-bold hover:bg-gray-300 transition">
                        <i class="fas fa-shopping-bag mr-2"></i> Continuer mes achats
                    </a>
                </div>
            </div>

            <div class="mt-8 text-center text-gray-600">
                <p>Des questions ? Contactez notre service client</p>
                <p class="mt-2">
                    <i class="fas fa-envelope mr-2"></i> support@maboutique.fr
                    <span class="mx-3">|</span>
                    <i class="fas fa-phone mr-2"></i> 01 23 45 67 89
                </p>
            </div>
        </div>
    </main>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Vider le panier après le paiement
        localStorage.removeItem('cart');
    </script>
</body>
</html>
