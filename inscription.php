<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Ma Boutique</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen py-12">

    <div class="w-full max-w-md">
        <div class="bg-white shadow-2xl rounded-xl p-8 animate-fade-in">
            <div class="text-center mb-8">
                <a href="index.php" class="text-3xl font-bold text-gray-800">MaBoutique</a>
                <h2 class="text-2xl font-bold text-gray-700 mt-4">Créez votre compte</h2>
                <p class="text-gray-500">Rejoignez-nous dès aujourd'hui !</p>
            </div>

            <?php if (isset($_GET['message'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline"><?php echo htmlspecialchars($_GET['message']); ?></span>
                </div>
            <?php endif; ?>

            <form action="php/inscription.php" method="GET">
                <div class="mb-4">
                    <label for="nom" class="block text-gray-700 font-semibold mb-2">Nom complet</label>
                    <input type="text" id="nom" name="nom" required
                           class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Adresse e-mail</label>
                    <input type="email" id="email" name="email" required
                           class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Mot de passe</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                </div>
                <div class="mb-6">
                    <label for="confirm_password" class="block text-gray-700 font-semibold mb-2">Confirmer le mot de passe</label>
                    <input type="password" id="confirm_password" name="confirm_password" required
                           class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                </div>
                <button type="submit"
                        class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Créer mon compte
                </button>
            </form>

            <div class="text-center mt-6">
                <p class="text-gray-600">Déjà un compte ? <a href="login.php" class="text-blue-500 hover:underline font-semibold">Connectez-vous ici</a></p>
            </div>
        </div>
    </div>

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