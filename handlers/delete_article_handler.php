<?php
require_once './DbHandler.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db = new DbHandler();

if (!empty($_GET)) {
    $articleId = $_GET['id'] ?? null;
    if ($articleId !== null) {
        $article = $db->selectArticle($articleId);
        // Empêche n'importe qui de supprimer un article
        if ($article !== null && $article['auteur'] == $_SESSION['username']) {
            $db->deleteArticle($articleId);
        }
    }
}

$user = $_SESSION['username'] ?? '';

// Redirection vers la page avec le paramètre user
header('Location: ../user_articles.php?user=' . urlencode($user));
exit;
?>