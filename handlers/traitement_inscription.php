<?php
require_once './DbHandler.php';

$hostname = 'localhost'; 
$dbname = 'ecf4_blog_groupe1'; // Nom de la base de données
$username = 'root'; 
$password = ''; 

try {
    $bdd = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

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
        header('Location: ../index.php'); //Renvoi à la page d'accueil
        exit;
    } else {
        echo "Erreur lors de l'inscription.";
        header('Location: ../register.php'); //Renvoi à la page d'inscription
        exit;
    }
}
?>
