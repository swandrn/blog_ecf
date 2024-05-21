<?php
require_once './DbHandler.php';

$title = $_POST['title'] ?? null;
$content = $_POST['content'] ?? null;
$categoryId = $_POST['categoryId'] ?? null;
$author = $_SESSION['username'] ?? 'tata';
$userId = 1;

$db = new DbHandler();

$db->insertArticle($userId, $categoryId, $title, $content, $author);

header('Location: ../index.php');
exit;
?>