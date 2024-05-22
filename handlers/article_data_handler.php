<?php
require_once './handlers/DbHandler.php';

$db = new DbHandler();

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    //On est dans le cas ou on a cliquer sur un article
    $id = $_GET['id'] ?? null;
    if($id !== null){
        $article = $db->selectArticle($id);
    }
} else{
    //On est sur la page d'accueil
    $articles = $db->selectAllArticles();
}

?>