<?php

var_dump($_GET);
var_dump($_POST);
// echo "<h1>".$_GET['nom']."</h1>";
// echo "<br>";
// echo $_GET['email'];
// echo "<br>";
// echo $_GET['password'];
// echo "<br>";
// echo $_GET['confirm_password'];

if ($_GET['password'] != $_GET['confirm_password']) {
    echo "Erreur merci de vérifier la confirmation du mot de passe !!!";
}else if ($_GET['password'] > 7) {
    echo "Erreur donner un meilleur mot de passe plus de 7 caractères !!!";
}