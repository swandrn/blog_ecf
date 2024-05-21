<?php
require_once './handlers/DbHandler.php';

$db = new DbHandler();

$articles = $db->selectAllArticles();
?>