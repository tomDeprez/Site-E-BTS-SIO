<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Annulé - MaBoutique</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-2xl shadow-2xl p-12 text-center">
                <!-- Icône d'annulation -->
                <div class="flex justify-center mb-8">
                    <div class="bg-yellow-100 rounded-full p-8">
                        <i class="fas fa-exclamation-triangle text-6xl text-yellow-500"></i>
                    </div>
                </div>

                <h1 class="text-4xl font-bold text-gray-800 mb-4">Paiement annulé</h1>
                <p class="text-xl text-gray-600 mb-8">Votre commande n'a pas été finalisée</p>

                <div class="bg-yellow-50 border-2 border-yellow-200 rounded-lg p-6 mb-8">
                    <p class="text-gray-700">
                        Le paiement a été annulé. Aucun montant n'a été débité de votre compte.
                        Vos articles sont toujours dans votre panier.
                    </p>
                </div>

                <div class="space-y-4">
                    <a href="panier.php" class="inline-block w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-4 px-8 rounded-lg text-lg font-bold hover:shadow-xl transform hover:scale-105 transition">
                        <i class="fas fa-shopping-cart mr-2"></i> Retour au panier
                    </a>
                    <a href="index.php" class="inline-block w-full bg-gray-200 text-gray-800 py-4 px-8 rounded-lg text-lg font-bold hover:bg-gray-300 transition">
                        <i class="fas fa-home mr-2"></i> Retour à l'accueil
                    </a>
                </div>

                <div class="mt-8 text-gray-600">
                    <p>Besoin d'aide ?</p>
                    <p class="mt-2">
                        <i class="fas fa-envelope mr-2"></i> support@maboutique.fr
                        <span class="mx-3">|</span>
                        <i class="fas fa-phone mr-2"></i> 01 23 45 67 89
                    </p>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
