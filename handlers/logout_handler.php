<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//Ecrase toutes les variables de session
$_SESSION = array();

//Ecrase tous les cookies
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

//Detruit la session
session_destroy();
header("Location: ../index.php"); //Renvoi vers la page d'accueil
exit;
?>