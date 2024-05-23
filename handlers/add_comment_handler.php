<?php
require_once './DbHandler.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db = new DbHandler();

if (!empty($_POST)){
    $author = $_SESSION['username'];
    $articleId = (int)$_POST['articleId'];
    $userId = $db->selectUserId($author);
    $content = $_POST['comment'];

    $db->insertComment($author, $articleId, $userId, $content);

    header('Location: ../details_article.php?id=' . $articleId);
    exit;

}elseif (isset($_POST['action']) && $_POST['action'] === 'delete') {

    // Gestion de la suppression de commentaire
    $commentId = (int)$_POST['commentId'];
    $articleId = (int)$_POST['articleId'];

    $comment = $db->selectUserId($commentId);

        if ($comment && $comment['author'] === $_SESSION['username']) {
            $db->deleteComment($commentId);
        }
    header('Location: ../details_article.php?id=' . $articleId);
    exit;
}
?>