

function addToCard() {

    let card;

    card = `
    {
          "produits": {
            "id": "",
            "nom": "",
            "prix": "",
            "image": "",
            "qty": ""
        }
    }`;

    localStorage.setItem("card", card);


    alert("Produit ajouté au panier !" + localStorage.getItem("produit"))
}