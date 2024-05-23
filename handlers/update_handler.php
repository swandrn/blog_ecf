<?php
// j'ai fait plein de tests, et ça veut pas...
require_once './DbHandler.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db = new DbHandler();

if (!empty($_POST)) {
    $articleId = $_POST['articleId'];
    $categoryId = $_POST['categoryId'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $db->updateArticle($articleId, $categoryId, $title, $content);

    header('Location: ../index.php');
    exit;
}
?>
