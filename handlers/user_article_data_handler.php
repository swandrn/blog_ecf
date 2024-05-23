<?php
require_once './handlers/DbHandler.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db = new DbHandler();

if (!empty($_GET)){
    $userId = $db->selectUserId($_GET['user']);
    $userArticles = $db->selectArticlesOfUser($userId);
}
?>