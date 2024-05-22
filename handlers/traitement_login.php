<?php
require_once 'DbHandler.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new DbHandler();
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Récupérer l'utilisateur par email
    $user = $db->getUserByEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        // Connexion réussie
        echo "Connexion réussie !";
        // Commence la session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['username'] = $user['pseudo'];
        header('Location: ../index.php'); // Redirection vers la page d'accueil
        exit;
    } else {
        // Erreur de connexion
        echo "Adresse e-mail ou mot de passe incorrect.";
        header('Location: ../login.php'); // Redirection vers la page de connexion
        exit;
    }
}
?>
