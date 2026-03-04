# 🚀 Démarrage Rapide

## ✅ Installation terminée !

Toutes les dépendances ont été installées avec succès :
- ✅ Stripe PHP SDK (v13.18.0)
- ✅ Autoload Composer configuré
- ✅ Configuration Stripe en place

## 🎯 Lancer le site

### Option 1 : Serveur PHP intégré (recommandé)

```bash
cd /home/tom/tools/site-e
php -S localhost:8000
```

Puis ouvrez : **http://localhost:8000**

### Option 2 : Serveur sur un autre port

```bash
php -S localhost:3000
```

⚠️ **Important** : Si vous changez le port, mettez à jour `BASE_URL` dans `php/config.php`

## 🧪 Tester le panier

1. **Accédez à la page produit** : http://localhost:8000/product.php

2. **Ajoutez un produit au panier** : Cliquez sur "Ajouter au Panier"
   - Une popup stylée apparaîtra
   - Le compteur du panier se met à jour

3. **Consultez votre panier** : Cliquez sur l'icône panier 🛒 ou allez sur http://localhost:8000/panier.php
   - Modifiez les quantités avec +/-
   - Supprimez des produits si nécessaire

4. **Passez commande** : Cliquez sur "Passer commande"
   - Remplissez le formulaire de livraison
   - Cliquez sur "Payer avec Stripe"

5. **Testez le paiement** avec une carte de test :
   - **Numéro** : `4242 4242 4242 4242`
   - **Date** : `12/30` (n'importe quelle date future)
   - **CVC** : `123` (n'importe quel 3 chiffres)
   - **Nom** : Votre nom
   - **Code postal** : `75001` (n'importe lequel)

6. **Confirmation** : Vous serez redirigé vers la page de succès

## 🔑 Configuration actuelle

- ✅ **Clé Stripe** : Configurée (mode test)
- ✅ **URL de base** : http://localhost:8000
- ✅ **Vendor** : Installé dans /vendor/
- ✅ **Autoload** : Fonctionnel

## 🎨 Pages disponibles

| Page | URL | Description |
|------|-----|-------------|
| Accueil | http://localhost:8000/ | Page d'accueil |
| Produit | http://localhost:8000/product.php | Détails du produit |
| Panier | http://localhost:8000/panier.php | Gestion du panier |
| Checkout | http://localhost:8000/checkout.php | Formulaire de paiement |
| Succès | http://localhost:8000/success.php | Confirmation |

## 🐛 Résolution de problèmes

### Le site ne démarre pas
```bash
# Vérifiez que le port n'est pas déjà utilisé
lsof -i :8000

# Utilisez un autre port
php -S localhost:8001
```

### Erreur "vendor/autoload.php not found"
```bash
# Réinstallez les dépendances
composer install
```

### Erreur Stripe
- Vérifiez votre clé dans `php/config.php`
- Testez avec la carte `4242 4242 4242 4242`

### Le panier ne fonctionne pas
- Ouvrez la console du navigateur (F12)
- Vérifiez que JavaScript est activé
- Videz le localStorage si nécessaire : `localStorage.clear()`

## 📊 Surveiller les paiements

Connectez-vous au dashboard Stripe pour voir les paiements tests :
- https://dashboard.stripe.com/test/payments

## 🎓 Prochaines étapes

Pour activer le mode production :
1. Récupérez vos clés **Live** sur Stripe
2. Remplacez les clés dans `php/config.php`
3. Mettez à jour `BASE_URL` avec votre domaine
4. Testez avec de vraies cartes bancaires

---

**Tout est prêt ! Lancez le serveur et commencez à tester le panier. 🎉**
