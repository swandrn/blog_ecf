<?php
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
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $mdp = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hachage du mot de passe
    $email = $_POST['email'];

    $requete = $bdd->prepare("INSERT INTO utilisateurs (nom, prenom, pseudo, password, email) VALUES (:nom, :prenom, :pseudo, :password, :email)");
    $requete->execute(
        array(
            "nom" => $nom,
            "prenom" => $prenom,
            "pseudo" => $pseudo,
            "password" => $mdp,
            "email" => $email,
        )
    );

    if ($requete->rowCount() > 0) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>
