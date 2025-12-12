<?php
session_start();

$dsn = "mysql:host=localhost;dbname=site_e;charset=utf8";
$username = "root";
$password = "password";

$message = "";

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    // En production, logguer l'erreur plutôt que de l'afficher
    header('Location: http://localhost:8000/login.php?message=' . urlencode("Erreur de connexion au serveur."));
    exit();
}

$email = $_GET['email'] ?? '';
$mdp = $_GET['password'] ?? '';

if (empty($email) || empty($mdp)) {
    $message = "Erreur : tous les champs sont obligatoires.";
    header('Location: http://localhost:8000/login.php?message=' . urlencode($message));
    exit();
}

$stmt = $pdo->prepare("SELECT id, nom, email, mot_de_passe FROM utilisateurs WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($mdp, $user['mot_de_passe'])) {
    // Le mot de passe est correct, on démarre la session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_nom'] = $user['nom'];
    $_SESSION['user_email'] = $user['email'];

    // Redirection vers la page d'accueil ou un tableau de bord
    header('Location: http://localhost:8000/index.php?message=' . urlencode("Connexion réussie ! Bienvenue, " . $user['nom']));
    exit();
} else {
    // Email non trouvé ou mot de passe incorrect
    $message = "Email ou mot de passe incorrect.";
    header('Location: http://localhost:8000/login.php?message=' . urlencode($message));
    exit();
}
