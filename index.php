<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Ma Boutique</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Barre de Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <a href="index.php" class="text-2xl font-bold text-gray-800">MaBoutique</a>
                </div>
                <div class="hidden md:flex items-center space-x-6">
                    <a href="index.php" class="text-gray-600 hover:text-blue-500 transition">Accueil</a>
                    <a href="product.php" class="text-gray-600 hover:text-blue-500 transition">Produits</a>
                    <a href="#" class="text-gray-600 hover:text-blue-500 transition">Contact</a>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <span class="text-gray-700">Bonjour, <?php echo htmlspecialchars($_SESSION['user_nom']); ?></span>
                        <a href="php/logout.php" class="bg-red-500 text-white py-2 px-4 rounded-full hover:bg-red-600 transition">Déconnexion</a>
                    <?php else: ?>
                        <a href="login.php" class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600 transition">Connexion</a>
                    <?php endif; ?>
                </div>
                <div class="md:hidden">
                    <button class="text-gray-800 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-4">
        <?php if (isset($_GET['message'])): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative my-4" role="alert">
                <span class="block sm:inline"><?php echo htmlspecialchars($_GET['message']); ?></span>
            </div>
        <?php endif; ?>
    </div>

    <!-- Section Héros -->
    <header class="bg-white">
        <div class="container mx-auto px-6 py-16 text-center">
            <div class="mx-auto max-w-2xl animate-fade-in-down">
                <h1 class="text-4xl font-bold text-gray-800 md:text-5xl">Bienvenue chez MaBoutique</h1>
                <p class="mt-4 text-lg text-gray-600">Votre destination pour les meilleurs produits, au meilleur prix.</p>
                <a href="inscription.php" class="mt-8 inline-block bg-blue-500 text-white py-3 px-6 rounded-full hover:bg-blue-600 transition transform hover:scale-105">Inscrivez-vous maintenant</a>
            </div>
        </div>
    </header>

    <!-- Section Produits Mis en Avant -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Nos Meilleurs Produits</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Produit 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                    <img src="https://via.placeholder.com/400x300/000000/FFFFFF?text=Xiaomi+Pro+4" alt="Écouteurs Xiaomi Pro 4" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Xiaomi Pro 4 Écouteurs</h3>
                        <p class="text-gray-600 mb-4">Casque d'écoute sans fil Bluetooth avec réduction de bruit active.</p>
                        <a href="product.php" class="text-blue-500 font-semibold hover:underline">Voir le produit &rarr;</a>
                    </div>
                </div>
                <!-- Produit 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                    <img src="https://via.placeholder.com/400x300" alt="Produit 2" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Article Superbe</h3>
                        <p class="text-gray-600 mb-4">Ne manquez pas cet article qui va changer votre quotidien.</p>
                        <a href="#" class="text-blue-500 font-semibold hover:underline">Voir le produit &rarr;</a>
                    </div>
                </div>
                <!-- Produit 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                    <img src="https://via.placeholder.com/400x300" alt="Produit 3" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Gadget Ultime</h3>
                        <p class="text-gray-600 mb-4">Le gadget que tout le monde s'arrache. Soyez le premier à l'avoir.</p>
                        <a href="#" class="text-blue-500 font-semibold hover:underline">Voir le produit &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pied de page -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2025 MaBoutique. Tous droits réservés.</p>
        </div>
    </footer>

    <style>
        @keyframes fade-in-down {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-down {
            animation: fade-in-down 0.8s ease-out forwards;
        }
    </style>

</body>
</html>