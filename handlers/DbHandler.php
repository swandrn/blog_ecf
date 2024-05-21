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

    //Articles
    /**
     * Insert article data in DB
     * @param string $title
     * @param string $content
     * @param string $author
     * @param int $category
     */
    
    function insertArticle($userId, $categoryId, $title, $content, $author)
    {
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("INSERT INTO articles (utilisateur_id, categorie_id, titre, auteur, contenu)
            VALUES (:userId, :categoryId, :title, :author, :content)");
            $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
            $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_STR);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':author', $author, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
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
            $stmt = $conn->prepare("SELECT titre, contenu, auteur, date_creation, categorie_id FROM articles");
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $conn = null;
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
            $stmt = $conn->prepare("SELECT titre, contenu, auteur, date_creation, categorie_id FROM articles WHERE id_article=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            $conn = null;
            return $res;
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Delete the article of a given ID
     * @param int $id id of article to delete
     */
    function deleteArticle($id){
        try{
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("DELETE FROM articles WHERE id_article=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $conn = null;
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //Comments
    /**
     * Insert the comment in the DB
     * @param string $author
     * @param int $articleId
     * @param int $userId
     * @param string $content
     */
    function insertComment($author, $articleId, $userId, $content)
    {
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("INSERT INTO commentaires (auteur, article_id, utilisateur_id, contenu)
            VALUES (:author, :articleId, :userId, :content)");
            $stmt->bindParam(':author', $author, PDO::PARAM_STR);
            $stmt->bindParam(':articleId', $articleId, PDO::PARAM_INT);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->execute();
            $conn = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function deleteComment($commentId){
        try{
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("DELETE FROM commentaires WHERE id_commentaire=:id");
            $stmt->bindParam(':id', $commentId, PDO::PARAM_INT);
            $stmt->execute();
            $conn = null;
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>