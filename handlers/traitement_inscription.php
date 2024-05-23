<?php
require_once './DbHandler.php';

if (isset($_POST['ok'])) {
    $db = new DbHandler();

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hachage du mot de passe
    $email = $_POST['email'];

    $userInsertionSucceeded = $db->insertUser($nom, $prenom, $pseudo, $hashedPassword, $email);

    if ($userInsertionSucceeded) {
        echo "Inscription réussie !";
        header('Location: ../login.php'); //Renvoi à la page d'accueil
        exit;
    } else {
        echo "Erreur lors de l'inscription.";
        header('Location: ../register.php'); //Renvoi à la page d'inscription
        exit;
    }
}
?>
