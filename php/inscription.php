<?php
$dsn = "mysql:host=localhost;dbname=site_e;charset=utf8";
$username = "root";
$password = "password";

$message = "";

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

$nom = $_GET['nom'] ?? '';
$email = $_GET['email'] ?? '';
$mdp = $_GET['password'] ?? '';
$confirm = $_GET['confirm_password'] ?? '';
$role = 'utilisateur';

if ($mdp !== $confirm) {
    $message = "Erreur : les mots de passe ne correspondent pas.";
} elseif (strlen($mdp) < 8) {
    $message = "Erreur : le mot de passe doit contenir au moins 8 caractères.";
} elseif (empty($nom) || empty($email) || empty($mdp)) {
    $message = "Erreur : tous les champs sont obligatoires.";
} else {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    $exists = $stmt->fetchColumn();

    if ($exists) {
        $message = "Erreur : un utilisateur avec cet email existe déjà.";
    } else {
        $hash = password_hash($mdp, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, mot_de_passe, email, role) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$nom, $hash, $email, $role])) {
            $message = "Inscription réussie !";
        } else {
            $message = "Erreur lors de l'inscription.";
        }
    }
}

header('Location: http://localhost:8000/inscription.php?message=' . urlencode($message));
exit();
