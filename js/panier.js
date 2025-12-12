

function addToCard(id, nom, prix, image, qty) {

    let card;

    card = `
    {
          "produits": {
            "id": "`+ id + `",
            "nom": "`+ nom + `",
            "prix": `+ prix + `,
            "image": "`+ image + `",
            "qty": `+ qty + `*
        }
    }`;

    localStorage.setItem("card", card);


    alert("Produit ajouté au panier !" + localStorage.getItem("produit"))
}