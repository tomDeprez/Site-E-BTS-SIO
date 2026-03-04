# Installation du système de panier et paiement Stripe

## 📦 Fichiers créés

- `panier.php` - Page d'affichage du panier
- `checkout.php` - Page de paiement
- `success.php` - Page de confirmation après paiement
- `cancel.php` - Page si paiement annulé
- `php/config.php` - Configuration Stripe
- `php/create-checkout-session.php` - Backend pour créer la session Stripe
- `js/panier.js` - Fonctions JavaScript du panier (mis à jour)

## 🚀 Installation

### 1. Installer Composer (si pas déjà installé)

```bash
# Sur Linux/Mac
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Sur Windows
# Téléchargez et installez depuis https://getcomposer.org/download/
```

### 2. Installer le SDK Stripe PHP

Dans le dossier du projet (`/home/tom/tools/site-e/`), exécutez :

```bash
composer require stripe/stripe-php
```

Cela va créer un dossier `vendor/` avec la bibliothèque Stripe.

### 3. Configurer Stripe

#### a) Créer un compte Stripe

1. Allez sur https://stripe.com
2. Créez un compte (gratuit en mode test)
3. Accédez au dashboard : https://dashboard.stripe.com

#### b) Récupérer les clés API

1. Dans le dashboard Stripe, allez dans **Developers** > **API keys**
2. Vous verrez deux clés en mode **Test** :
   - **Publishable key** (commence par `pk_test_...`)
   - **Secret key** (commence par `sk_test_...` - cliquez sur "Reveal" pour la voir)

#### c) Configurer le fichier config.php

Ouvrez `php/config.php` et remplacez :

```php
define('STRIPE_SECRET_KEY', 'sk_test_VOTRE_CLE_SECRETE_ICI');
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_VOTRE_CLE_PUBLIQUE_ICI');
```

Par vos vraies clés Stripe.

**Également, mettez à jour l'URL de base** :

```php
define('BASE_URL', 'http://localhost/site-e');
// ou votre URL réelle, par exemple : 'http://localhost:8000'
```

### 4. Tester le système

#### a) Démarrer un serveur local

```bash
# Dans le dossier du projet
php -S localhost:8000
```

#### b) Accéder au site

- Page produit : http://localhost:8000/product.php
- Page panier : http://localhost:8000/panier.php

#### c) Cartes de test Stripe

En mode test, utilisez ces numéros de carte :

- **Paiement réussi** : `4242 4242 4242 4242`
- **Paiement refusé** : `4000 0000 0000 0002`
- **Authentification requise** : `4000 0025 0000 3155`

- **Date d'expiration** : N'importe quelle date future (ex: 12/25)
- **CVC** : N'importe quel 3 chiffres (ex: 123)
- **Code postal** : N'importe lequel (ex: 75001)

## 🎨 Fonctionnalités

### Panier
- ✅ Ajout de produits avec popup stylée
- ✅ Gestion des quantités
- ✅ Suppression de produits
- ✅ Calcul du total
- ✅ Stockage dans localStorage

### Checkout
- ✅ Formulaire de livraison complet
- ✅ Validation des champs
- ✅ Résumé de commande
- ✅ Intégration Stripe Checkout

### Paiement
- ✅ Paiement sécurisé par Stripe
- ✅ Support carte bancaire
- ✅ Page de confirmation
- ✅ Page d'annulation
- ✅ Nettoyage du panier après paiement

## 🔒 Sécurité

**IMPORTANT** : Ne commitez JAMAIS vos clés Stripe dans Git !

Ajoutez dans votre `.gitignore` :

```
php/config.php
vendor/
```

## 📱 Mode Production

Pour passer en production :

1. Dans le dashboard Stripe, activez votre compte
2. Récupérez vos clés **Live** (commencent par `pk_live_` et `sk_live_`)
3. Remplacez les clés dans `php/config.php`
4. Mettez à jour `BASE_URL` avec votre URL de production

## 🐛 Dépannage

### Erreur "Class 'Stripe\Stripe' not found"
→ Installez le SDK : `composer require stripe/stripe-php`

### Erreur "Cannot find vendor/autoload.php"
→ Exécutez `composer install` dans le dossier du projet

### Le paiement ne fonctionne pas
→ Vérifiez que vos clés Stripe sont correctes dans `php/config.php`
→ Vérifiez que `BASE_URL` est correcte

### Le panier est vide
→ Vérifiez que JavaScript est activé
→ Ouvrez la console du navigateur (F12) pour voir les erreurs

## 📞 Support

En cas de problème :
- Documentation Stripe : https://stripe.com/docs
- Testez vos paiements : https://dashboard.stripe.com/test/payments
