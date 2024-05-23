<?php
require_once './DbHandler.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db = new DbHandler();

$title = $_POST['title'] ?? null;
$content = $_POST['content'] ?? null;
$categoryId = (int)$_POST['categoryId'] ?? null;
$author = $_SESSION['username'];
$userId = $db->selectUserId($author);

$db->insertArticle($userId, $categoryId, $title, $content, $author);

header('Location: ../index.php');
exit;
?>