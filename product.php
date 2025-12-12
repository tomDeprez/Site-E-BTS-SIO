<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xiaomi Pro 4 - Écouteurs sans fil</title>
    
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
                    <a href="#" class="text-blue-500 font-semibold border-b-2 border-blue-500">Produits</a>
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

    <!-- Contenu Principal -->
    <main class="container mx-auto px-6 py-12">
        <div class="bg-white rounded-lg shadow-xl p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Colonne des Images -->
                <div>
                    <div class="mb-4">
                        <img src="https://ae-pic-a1.aliexpress-media.com/kf/S1af3745f87c94ae0b90ddf824d0110d8c.jpg_960x960q75.jpg_.avif" alt="Xiaomi Pro 4 Black" class="w-full rounded-lg shadow-md">
                    </div>
                    <div class="grid grid-cols-4 gap-2">
                        <img src="https://via.placeholder.com/150x150/FFFFFF/000000?text=Pro+4" alt="Thumbnail 1" class="cursor-pointer rounded-md border-2 border-blue-500">
                        <img src="https://via.placeholder.com/150x150/EEEEEE/000000?text=Angle+2" alt="Thumbnail 2" class="cursor-pointer rounded-md border-2 border-transparent hover:border-blue-500">
                        <img src="https://via.placeholder.com/150x150/DDDDDD/000000?text=Case" alt="Thumbnail 3" class="cursor-pointer rounded-md border-2 border-transparent hover:border-blue-500">
                        <img src="https://via.placeholder.com/150x150/CCCCCC/000000?text=In-ear" alt="Thumbnail 4" class="cursor-pointer rounded-md border-2 border-transparent hover:border-blue-500">
                    </div>
                </div>

                <!-- Colonne des Détails -->
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-2">Xiaomi Pro 4 - Casque d'écoute sans fil Bluetooth</h1>
                    <p class="text-gray-500 mb-4">Design élégant, qualité sonore supérieure, longue durée de vie.</p>
                    
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="text-gray-600 ml-2">4.3 (5692 Avis)</span>
                        <span class="text-gray-400 mx-2">|</span>
                        <span class="text-green-500 font-semibold">+10 000 vendus</span>
                    </div>

                    <div class="mb-6">
                        <span class="text-4xl font-bold text-blue-600">0,88€</span>
                        <span class="text-xl text-gray-500 line-through ml-2">3,11€</span>
                        <span class="bg-red-100 text-red-600 text-sm font-semibold py-1 px-2 rounded-md ml-2">- Nouveau client</span>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Couleur: <span class="font-normal">Black</span></h3>
                        <div class="flex space-x-2">
                            <button class="w-10 h-10 rounded-full bg-black border-4 border-blue-500" style="background-image: url('https://ae-pic-a1.aliexpress-media.com/kf/S1af3745f87c94ae0b90ddf824d0110d8c.jpg_960x960q75.jpg_.avif'); background-size: cover; background-position: center;"></button>
                            <button class="w-10 h-10 rounded-full bg-white border-2 border-gray-300" style="background-image: url('https://ae-pic-a1.aliexpress-media.com/kf/Sf3c73419ad934b8ea1525432f7d0279c0.jpg_960x960q75.jpg_.avif'); background-size: cover; background-position: center;"></button>
                        </div>
                    </div>

                    <div class="mb-8">
                        <button onclick="addToCard();" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-4 px-6 rounded-lg text-lg font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                            <i class="fas fa-shopping-cart mr-2"></i> Ajouter au Panier
                        </button>
                    </div>

                    <div>
                        <h3 class="text-xl font-bold mb-3 border-b pb-2">Points forts</h3>
                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start"><i class="fas fa-music text-blue-500 w-5 mt-1 mr-2"></i><span><strong class="font-semibold">Qualité audio supérieure :</strong> Expérience sonore riche et équilibrée.</span></li>
                            <li class="flex items-start"><i class="fas fa-headphones text-blue-500 w-5 mt-1 mr-2"></i><span><strong class="font-semibold">Réduction active du bruit :</strong> Plongez dans une écoute immersive.</span></li>
                            <li class="flex items-start"><i class="fas fa-battery-full text-blue-500 w-5 mt-1 mr-2"></i><span><strong class="font-semibold">Longue durée de vie :</strong> Profitez de longues sessions d'écoute sans interruption.</span></li>
                            <li class="flex items-start"><i class="fas fa-paint-brush text-blue-500 w-5 mt-1 mr-2"></i><span><strong class="font-semibold">Design élégant et ergonomique :</strong> Confort optimal pour une utilisation quotidienne.</span></li>
                            <li class="flex items-start"><i class="fab fa-bluetooth-b text-blue-500 w-5 mt-1 mr-2"></i><span><strong class="font-semibold">Compatibilité universelle :</strong> Connectez-vous facilement à Apple ou Android.</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Présentation & Avis -->
        <div class="mt-12 grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 bg-white rounded-lg shadow-xl p-8">
                <h2 class="text-2xl font-bold mb-4">Présentation</h2>
                <div class="prose max-w-none text-gray-700">
                    <p class="lead">Améliorez votre expérience audio avec le casque Bluetooth sans fil Xiaomi Pro 4!</p>
                    <p>Dites bonjour à la nouvelle génération d'audio sans fil. Conçu pour ceux qui exigent un son supérieur, un confort inégalé et une technologie de pointe, ce casque est votre compagnon idéal pour le travail, les voyages ou les loisirs. Que vous soyez un utilisateur Apple ou Android, le Pro 4 s'intègre parfaitement à vos appareils.</p>
                    <h3 class="font-semibold">Principales caractéristiques :</h3>
                    <ul>
                        <li><strong>Très longue durée de vie de la batterie :</strong> Profitez d'heures de musique, d'appels et de divertissement ininterrompus.</li>
                        <li><strong>Réduction avancée du bruit :</strong> Plongez dans un son cristallin grâce à une suppression du bruit de qualité professionnelle.</li>
                        <li><strong>Compatibilité universelle :</strong> Parfaitement compatible avec les appareils Apple et Android.</li>
                        <li><strong>Design élégant et ergonomique :</strong> Léger et confortable, le Pro 4 est conçu pour être porté toute la journée.</li>
                        <li><strong>Audio de haute qualité :</strong> Faites l'expérience d'un son riche et équilibré avec des basses profondes et des aigus nets.</li>
                    </ul>
                    <p>Passez au casque Bluetooth sans fil Xiaomi Pro 4 et découvrez un monde de son, de confort et de commodité supérieurs. Votre compagnon audio idéal est là !</p>
                </div>
                <hr class="my-8">
                <h2 class="text-2xl font-bold mb-4">Détails Techniques</h2>
                <div class="grid grid-cols-2 gap-4 text-gray-700">
                    <div><strong class="font-semibold">Matériau:</strong> ABS</div>
                    <div><strong class="font-semibold">Catégorie:</strong> Écouteurs</div>
                    <div><strong class="font-semibold">Méthode de charge:</strong> Étui de recharge</div>
                    <div><strong class="font-semibold">Gamme d’impédance:</strong> jusqu’à 32 Ω</div>
                    <div><strong class="font-semibold">Type sans fil:</strong> Bluetooth</div>
                    <div><strong class="font-semibold">Annulation de bruit:</strong> Active</div>
                    <div><strong class="font-semibold">Communication:</strong> True Wireless</div>
                    <div><strong class="font-semibold">Étanche:</strong> Oui</div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-xl p-8">
                <h2 class="text-2xl font-bold mb-4">Avis des clients</h2>
                <div class="space-y-6">
                    <div class="border-b pb-4">
                        <div class="flex items-center mb-1">
                            <span class="font-semibold">Acheteur AliExpress</span>
                            <div class="flex text-yellow-400 ml-auto"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        </div>
                        <p class="text-gray-600">"très bons écouteurs pour le prix"</p>
                        <span class="text-sm text-gray-400">04 nov. 2025</span>
                    </div>
                    <div class="border-b pb-4">
                        <div class="flex items-center mb-1">
                            <span class="font-semibold">W***a</span>
                            <div class="flex text-yellow-400 ml-auto"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>
                        </div>
                        <p class="text-gray-600">"Belle apparence, son parfait, mais quand je parle à quelqu'un, ma voix est coupée..."</p>
                        <span class="text-sm text-gray-400">21 oct. 2025</span>
                    </div>
                    <div class="border-b pb-4">
                        <div class="flex items-center mb-1">
                            <span class="font-semibold">p***o</span>
                            <div class="flex text-yellow-400 ml-auto"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        </div>
                        <p class="text-gray-600">"Tout est parfait"</p>
                        <span class="text-sm text-gray-400">26 oct. 2025</span>
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

</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="js/panier.js"></script>
</html>