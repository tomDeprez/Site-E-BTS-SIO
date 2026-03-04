<?php
session_start();
require_once 'php/config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement - MaBoutique</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Barre de Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <a href="index.php" class="text-2xl font-bold text-gray-800">MaBoutique</a>
                </div>
                <div class="flex items-center space-x-4">
                    <i class="fas fa-lock text-green-500"></i>
                    <span class="text-gray-600">Paiement sécurisé</span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <main class="container mx-auto px-6 py-12">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl font-bold mb-8">Finaliser votre commande</h1>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Formulaire de commande -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-md p-8">
                        <h2 class="text-2xl font-bold mb-6">Informations de livraison</h2>

                        <form id="checkout-form" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Prénom *</label>
                                    <input type="text" id="prenom" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Nom *</label>
                                    <input type="text" id="nom" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Email *</label>
                                <input type="email" id="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Téléphone *</label>
                                <input type="tel" id="telephone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Adresse *</label>
                                <input type="text" id="adresse" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Code postal *</label>
                                    <input type="text" id="code_postal" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-gray-700 font-semibold mb-2">Ville *</label>
                                    <input type="text" id="ville" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Pays *</label>
                                <select id="pays" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="FR">France</option>
                                    <option value="BE">Belgique</option>
                                    <option value="CH">Suisse</option>
                                    <option value="LU">Luxembourg</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Résumé de la commande -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                        <h2 class="text-2xl font-bold mb-6">Résumé</h2>

                        <div id="orderItems" class="space-y-3 mb-6 max-h-64 overflow-y-auto">
                            <!-- Les produits seront ajoutés ici par JavaScript -->
                        </div>

                        <div class="border-t pt-4 space-y-3 mb-6">
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

                        <button onclick="handleCheckout()" id="payBtn" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-4 px-6 rounded-lg text-lg font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                            <i class="fas fa-credit-card mr-2"></i> Payer avec Stripe
                        </button>

                        <div class="mt-4 flex items-center justify-center space-x-3 text-gray-500">
                            <i class="fab fa-cc-visa text-2xl"></i>
                            <i class="fab fa-cc-mastercard text-2xl"></i>
                            <i class="fab fa-cc-amex text-2xl"></i>
                            <i class="fas fa-lock text-sm"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/panier.js"></script>
    <script>
        // Charger le résumé de commande
        function loadOrderSummary() {
            const cart = JSON.parse(localStorage.getItem("cart")) || [];
            const orderItemsDiv = document.getElementById('orderItems');

            if (cart.length === 0) {
                window.location.href = 'panier.php';
                return;
            }

            let html = '';
            let subtotal = 0;

            cart.forEach(item => {
                const itemTotal = item.prix * item.qty;
                subtotal += itemTotal;

                html += `
                <div class="flex items-center space-x-3">
                    <img src="${item.image}" alt="${item.nom}" class="w-16 h-16 object-cover rounded">
                    <div class="flex-1">
                        <p class="font-semibold text-sm">${item.nom}</p>
                        <p class="text-gray-600 text-sm">Qté: ${item.qty}</p>
                    </div>
                    <p class="font-bold">${itemTotal.toFixed(2)}€</p>
                </div>
                `;
            });

            orderItemsDiv.innerHTML = html;
            document.getElementById('subtotal').textContent = subtotal.toFixed(2) + '€';
            document.getElementById('total').textContent = subtotal.toFixed(2) + '€';
        }

        async function handleCheckout() {
            const form = document.getElementById('checkout-form');

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const cart = JSON.parse(localStorage.getItem("cart")) || [];
            const payBtn = document.getElementById('payBtn');

            payBtn.disabled = true;
            payBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Traitement...';

            const orderData = {
                prenom: document.getElementById('prenom').value,
                nom: document.getElementById('nom').value,
                email: document.getElementById('email').value,
                telephone: document.getElementById('telephone').value,
                adresse: document.getElementById('adresse').value,
                code_postal: document.getElementById('code_postal').value,
                ville: document.getElementById('ville').value,
                pays: document.getElementById('pays').value,
                cart: cart
            };

            try {
                const response = await fetch('php/create-checkout-session.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(orderData)
                });

                const data = await response.json();

                if (data.error) {
                    alert('Erreur: ' + data.error);
                    payBtn.disabled = false;
                    payBtn.innerHTML = '<i class="fas fa-credit-card mr-2"></i> Payer avec Stripe';
                    return;
                }

                // Rediriger vers Stripe Checkout
                window.location.href = data.url;

            } catch (error) {
                console.error('Erreur:', error);
                alert('Une erreur est survenue. Veuillez réessayer.');
                payBtn.disabled = false;
                payBtn.innerHTML = '<i class="fas fa-credit-card mr-2"></i> Payer avec Stripe';
            }
        }

        loadOrderSummary();
    </script>
</body>
</html>
