# Site-E-BTS-SIO - MaBoutique 🛒

Site e-commerce moderne avec système de panier et paiement Stripe intégré.

## 🚀 Fonctionnalités

### 🛍️ Boutique
- Page produit avec galerie d'images
- Système d'avis clients
- Détails techniques des produits
- Design responsive et moderne (Tailwind CSS)

### 🛒 Panier
- Ajout de produits avec popup animée
- Gestion des quantités (augmenter/diminuer)
- Suppression de produits
- Calcul automatique du total
- Stockage persistant (localStorage)
- Compteur de panier dans la navigation

### 💳 Paiement
- Intégration Stripe Checkout
- Formulaire de livraison complet
- Paiement sécurisé par carte bancaire
- Page de confirmation après paiement
- Gestion des paiements annulés

### 👤 Authentification
- Système de connexion/inscription
- Gestion des sessions PHP
- Protection des pages

## 📦 Installation

### 1. Prérequis
- PHP 7.4 ou supérieur
- Composer
- Serveur web (Apache/Nginx) ou PHP built-in server

### 2. Installation des dépendances

```bash
# Installer Composer si nécessaire
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Installer les dépendances du projet
composer install
```

### 3. Configuration Stripe

1. Créez un compte sur [Stripe](https://stripe.com)
2. Récupérez vos clés API (mode test) depuis le [dashboard](https://dashboard.stripe.com/apikeys)
3. Copiez le fichier de configuration et ajoutez vos clés :

```php
// Dans php/config.php
define('STRIPE_SECRET_KEY', 'sk_test_VOTRE_CLE_SECRETE');
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_VOTRE_CLE_PUBLIQUE');
define('BASE_URL', 'http://localhost:8000');
```

### 4. Lancement du serveur

```bash
# Démarrer le serveur PHP
php -S localhost:8000

# Accéder au site
# http://localhost:8000
```

## 📁 Structure du projet

```
site-e/
├── index.php                  # Page d'accueil
├── product.php                # Page produit
├── panier.php                 # Page panier
├── checkout.php               # Page de paiement
├── success.php                # Page de confirmation
├── cancel.php                 # Page d'annulation
├── login.php                  # Page de connexion
├── inscription.php            # Page d'inscription
├── js/
│   └── panier.js             # Logique du panier
├── php/
│   ├── config.php            # Configuration (Stripe, DB)
│   ├── create-checkout-session.php  # Backend Stripe
│   ├── login.php             # Traitement connexion
│   ├── logout.php            # Déconnexion
│   └── inscription.php       # Traitement inscription
├── css/                      # Styles personnalisés
├── vendor/                   # Dépendances Composer
├── composer.json             # Configuration Composer
└── INSTALLATION_STRIPE.md    # Guide détaillé Stripe
```

## 🧪 Tests

### Cartes de test Stripe

En mode test, utilisez ces numéros de carte :

| Type | Numéro | Résultat |
|------|--------|----------|
| Succès | `4242 4242 4242 4242` | Paiement accepté |
| Échec | `4000 0000 0000 0002` | Paiement refusé |
| 3D Secure | `4000 0025 0000 3155` | Authentification requise |

- **Date d'expiration** : N'importe quelle date future (ex: 12/30)
- **CVC** : N'importe quel 3 chiffres (ex: 123)

## 🔒 Sécurité

⚠️ **IMPORTANT** : Ne commitez JAMAIS vos clés Stripe dans Git !

Le fichier `.gitignore` est configuré pour exclure :
- `php/config.php` (contient les clés API)
- `vendor/` (dépendances)

## 📚 Documentation

Pour plus de détails sur l'intégration Stripe, consultez :
- [INSTALLATION_STRIPE.md](INSTALLATION_STRIPE.md) - Guide complet d'installation
- [Documentation Stripe](https://stripe.com/docs)

## 🛠️ Technologies utilisées

- **Frontend** : HTML5, CSS3, JavaScript, Tailwind CSS
- **Backend** : PHP 7.4+
- **Paiement** : Stripe API
- **Stockage** : localStorage (panier), Sessions PHP (auth)
- **Gestion des dépendances** : Composer

## 📞 Support

En cas de problème :
- Vérifiez le fichier `INSTALLATION_STRIPE.md`
- Consultez la console du navigateur (F12) pour les erreurs JavaScript
- Vérifiez les logs PHP du serveur

## 📄 Licence

Projet éducatif - BTS SIO
