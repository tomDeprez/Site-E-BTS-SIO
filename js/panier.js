

function addToCard(id, nom, prix, image, qty) {
    // Récupérer le panier existant ou créer un nouveau
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Vérifier si le produit existe déjà
    const existingProductIndex = cart.findIndex(item => item.id === id);

    if (existingProductIndex > -1) {
        // Si le produit existe, augmenter la quantité
        cart[existingProductIndex].qty += qty;
    } else {
        // Sinon, ajouter le nouveau produit
        cart.push({
            id: id,
            nom: nom,
            prix: parseFloat(prix),
            image: image,
            qty: qty
        });
    }

    // Sauvegarder dans localStorage
    localStorage.setItem("cart", JSON.stringify(cart));

    // Afficher la popup
    showPopup(nom, prix, image);

    // Mettre à jour le compteur du panier si il existe
    updateCartCount();
}

function showPopup(nom, prix, image) {
    const popup = document.getElementById('cartPopup');
    const popupNom = document.getElementById('popupNom');
    const popupPrix = document.getElementById('popupPrix');
    const popupImage = document.getElementById('popupImage');

    popupNom.textContent = nom;
    popupPrix.textContent = prix + '€';
    popupImage.src = image;

    popup.classList.remove('hidden');
    popup.classList.add('flex');

    // Fermer automatiquement après 3 secondes
    setTimeout(() => {
        closePopup();
    }, 3000);
}

function closePopup() {
    const popup = document.getElementById('cartPopup');
    popup.classList.add('hidden');
    popup.classList.remove('flex');
}

// Fonction pour mettre à jour le compteur du panier
function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
    const cartCountElement = document.getElementById('cartCount');
    if (cartCountElement) {
        cartCountElement.textContent = totalItems;
        if (totalItems > 0) {
            cartCountElement.classList.remove('hidden');
        }
    }
}

// Fonction pour obtenir le total du panier
function getCartTotal() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    return cart.reduce((sum, item) => sum + (item.prix * item.qty), 0);
}

// Fonction pour supprimer un produit du panier
function removeFromCart(id) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart = cart.filter(item => item.id !== id);
    localStorage.setItem("cart", JSON.stringify(cart));
    location.reload();
}

// Fonction pour mettre à jour la quantité
function updateQuantity(id, newQty) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    const productIndex = cart.findIndex(item => item.id === id);

    if (productIndex > -1) {
        if (newQty <= 0) {
            removeFromCart(id);
        } else {
            cart[productIndex].qty = parseInt(newQty);
            localStorage.setItem("cart", JSON.stringify(cart));
            location.reload();
        }
    }
}

// Initialiser le compteur au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    updateCartCount();
});