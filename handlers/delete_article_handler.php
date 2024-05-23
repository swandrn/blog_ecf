<?php
require_once './DbHandler.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db = new DbHandler();

if(!empty($_GET)){
    $articleId = $_GET['id'] ?? null;
    if($articleId !== null){
        $article = $db->selectArticle($articleId);
        //Empêche n'importe qui de supprimer un article
        if($article['auteur'] == $_SESSION['username']){
            $db->deleteArticle($articleId);
        }
    }
}

header('Location: ../index.php');
exit;
?>