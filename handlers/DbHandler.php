<?php
class DbHandler
{
    private $username = 'root';
    private $password = '';

    //Connect to DB
    function openDbConnection()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=blogecf", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //Insert article data in DB
    function insertArticle($title, $content, $author, $category)
    {
        $currentDate = date("Y-m-d");
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("INSERT INTO articles (titre, contenu, auteur, dateCreation, categorieId)
            VALUES (:title, :content, :author, :currentDate, :category)");
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':author', $author, PDO::PARAM_STR);
            $stmt->bindParam(':currentDate', $currentDate, PDO::PARAM_STR);
            $stmt->bindParam(':category', $category, PDO::PARAM_INT);
            $stmt->execute();
            $conn = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>