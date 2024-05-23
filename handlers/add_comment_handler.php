<?php
require_once './DbHandler.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db = new DbHandler();

if (!empty($_POST)){
    //commentId n'est POSTé que si on supprime un commentaire
    if(isset($_POST['commentId'])){
        $commentId = (int)$_POST['commentId'];
        $articleId = (int)$_POST['articleId'];
        $db->deleteComment($commentId);
    } else{
        $author = $_SESSION['username'];
        $articleId = (int)$_POST['articleId'];
        $userId = $db->selectUserId($author);
        $content = $_POST['comment'];
    
        $db->insertComment($author, $articleId, $userId, $content);
    }
    header('Location: ../details_article.php?id=' . $articleId);
    exit;
}
?>