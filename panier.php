<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier - MaBoutique</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Barre de Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <a href="index.php" class="text-2xl font-bold text-gray-800">MaBoutique</a>
                </div>
                <div class="hidden md:flex items-center space-x-6">
                    <a href="index.php" class="text-gray-600 hover:text-blue-500 transition">Accueil</a>
                    <a href="product.php" class="text-gray-600 hover:text-blue-500 transition">Produits</a>
                    <a href="panier.php" class="text-blue-500 font-semibold border-b-2 border-blue-500">Panier</a>
                    <a href="#" class="text-gray-600 hover:text-blue-500 transition">Contact</a>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <span class="text-gray-700">Bonjour, <?php echo htmlspecialchars($_SESSION['user_nom']); ?></span>
                        <a href="php/logout.php" class="bg-red-500 text-white py-2 px-4 rounded-full hover:bg-red-600 transition">Déconnexion</a>
                    <?php else: ?>
                        <a href="login.php" class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600 transition">Connexion</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <main class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-bold mb-8">Mon Panier</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Liste des produits -->
            <div class="lg:col-span-2">
                <div id="cartItems" class="space-y-4">
                    <!-- Les produits seront ajoutés ici par JavaScript -->
                </div>
                <div id="emptyCart" class="hidden bg-white rounded-lg shadow-md p-12 text-center">
                    <i class="fas fa-shopping-cart text-gray-300 text-6xl mb-4"></i>
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">Votre panier est vide</h2>
                    <p class="text-gray-500 mb-6">Ajoutez des produits pour commencer vos achats</p>
                    <a href="product.php" class="inline-block bg-blue-500 text-white py-3 px-8 rounded-lg hover:bg-blue-600 transition">
                        Découvrir nos produits
                    </a>
                </div>
            </div>

            <!-- Résumé de la commande -->
            <div class="lg:col-span-1">
                <div id="cartSummary" class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                    <h2 class="text-2xl font-bold mb-6">Résumé</h2>

                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-gray-600">
                            <span>Sous-total</span>
                            <span id="subtotal">0,00€</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Livraison</span>
                            <span class="text-green-500 font-semibold">Gratuite</span>
                        </div>
                        <div class="border-t pt-3 flex justify-between text-xl font-bold">
                            <span>Total</span>
                            <span id="total" class="text-blue-600">0,00€</span>
                        </div>
                    </div>

                    <button id="checkoutBtn" onclick="proceedToCheckout()" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-4 px-6 rounded-lg text-lg font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                        <i class="fas fa-lock mr-2"></i> Passer commande
                    </button>

                    <div class="mt-4 text-center text-sm text-gray-500">
                        <i class="fas fa-shield-alt mr-1"></i> Paiement sécurisé par Stripe
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Pied de page -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2025 MaBoutique. Tous droits réservés.</p>
        </div>
    </footer>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/panier.js"></script>
    <script>
        // Charger et afficher le panier
        function loadCart() {
            const cart = JSON.parse(localStorage.getItem("cart")) || [];
            const cartItemsDiv = document.getElementById('cartItems');
            const emptyCartDiv = document.getElementById('emptyCart');
            const cartSummary = document.getElementById('cartSummary');

            if (cart.length === 0) {
                cartItemsDiv.innerHTML = '';
                emptyCartDiv.classList.remove('hidden');
                cartSummary.classList.add('hidden');
                return;
            }

            emptyCartDiv.classList.add('hidden');
            cartSummary.classList.remove('hidden');

            let html = '';
            let subtotal = 0;

            cart.forEach(item => {
                const itemTotal = item.prix * item.qty;
                subtotal += itemTotal;

                html += `
                <div class="bg-white rounded-lg shadow-md p-6 flex items-center space-x-4">
                    <img src="${item.image}" alt="${item.nom}" class="w-24 h-24 object-cover rounded-lg">
                    <div class="flex-1">
                        <h3 class="font-semibold text-lg text-gray-800">${item.nom}</h3>
                        <p class="text-blue-600 font-bold text-xl mt-1">${item.prix.toFixed(2)}€</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <button onclick="updateQuantity('${item.id}', ${item.qty - 1})" class="bg-gray-200 hover:bg-gray-300 text-gray-800 w-8 h-8 rounded-full transition">
                            <i class="fas fa-minus"></i>
                        </button>
                        <span class="font-semibold text-lg w-8 text-center">${item.qty}</span>
                        <button onclick="updateQuantity('${item.id}', ${item.qty + 1})" class="bg-gray-200 hover:bg-gray-300 text-gray-800 w-8 h-8 rounded-full transition">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-xl text-gray-800">${itemTotal.toFixed(2)}€</p>
                        <button onclick="removeFromCart('${item.id}')" class="text-red-500 hover:text-red-700 mt-2 transition">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </div>
                </div>
                `;
            });

            cartItemsDiv.innerHTML = html;
            document.getElementById('subtotal').textContent = subtotal.toFixed(2) + '€';
            document.getElementById('total').textContent = subtotal.toFixed(2) + '€';
        }

        function proceedToCheckout() {
            const cart = JSON.parse(localStorage.getItem("cart")) || [];
            if (cart.length === 0) {
                alert("Votre panier est vide");
                return;
            }
            window.location.href = 'checkout.php';
        }

        // Charger le panier au chargement de la page
        loadCart();
    </script>
</body>
</html>
