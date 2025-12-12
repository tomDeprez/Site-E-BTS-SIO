<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Ma Boutique</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">

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
                    <a href="login.php" class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600 transition">Connexion</a>
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

    <!-- Contenu Principal -->
    <main class="flex-grow flex items-center justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-2xl rounded-xl p-8 animate-fade-in">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-700">Connectez-vous</h2>
                    <p class="text-gray-500">Heureux de vous revoir !</p>
                </div>

                <?php if (isset($_GET['message'])): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline"><?php echo htmlspecialchars($_GET['message']); ?></span>
                    </div>
                <?php endif; ?>

                <form action="php/login.php" method="GET">
                    <div class="mb-5">
                        <label for="email" class="block text-gray-700 font-semibold mb-2">Adresse e-mail</label>
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 font-semibold mb-2">Mot de passe</label>
                        <input type="password" id="password" name="password" required
                               class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    </div>
                    <button type="submit"
                            class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Se connecter
                    </button>
                </form>

                <div class="text-center mt-6">
                    <p class="text-gray-600">Aucun compte ? <a href="inscription.php" class="text-blue-500 hover:underline font-semibold">Créez-en un ici</a></p>
                </div>
            </div>
        </div>
    </main>

    <style>
        @keyframes fade-in {
            0% { opacity: 0; transform: translateY(10px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 0.5s ease-out forwards;
        }
    </style>

</body>
</html>