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

    /**
     * Insert article data in DB
     * @param string $title
     * @param string $content
     * @param string $author
     * @param int $category
     */
    
    function insertArticle($title, $content, $author, $categoryId)
    {
        $currentDate = date("Y-m-d");
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("INSERT INTO articles (titre, contenu, auteur, dateCreation, categorieId)
            VALUES (:title, :content, :author, :currentDate, :categoryId)");
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':author', $author, PDO::PARAM_STR);
            $stmt->bindParam(':currentDate', $currentDate, PDO::PARAM_STR);
            $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
            $stmt->execute();
            $conn = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Get all the existing articles in DB
     * @return array array of all articles
     */
    function selectAllArticles(){
        try{
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("SELECT titre, contenu, auteur, dateCreation, categorieId FROM articles");
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Select the article of a given ID
     * @param int $id id of article to select
     * @return array array of key value where key is column name
     */
    function selectArticle($id){
        try{
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("SELECT titre, contenu, auteur, dateCreation, categorieId FROM articles WHERE id_article=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return $res;
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>