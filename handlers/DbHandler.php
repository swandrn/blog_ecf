<?php
class DbHandler
{
    private $username = 'root';
    private $password = '';

    function openDbConnection()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=ecf4_blog_groupe1", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function insertArticle($userId, $categoryId, $title, $content, $author)
    {
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("INSERT INTO articles (utilisateur_id, categorie_id, titre, auteur, contenu) VALUES (:userId, :categoryId, :title, :author, :content)");
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

    function selectAllArticles()
    {
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("SELECT titre, contenu, auteur, date_creation, categorie_id FROM articles");
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $conn = null;
            return $res;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function selectArticle($id)
    {
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("SELECT titre, contenu, auteur, date_creation, categorie_id FROM articles WHERE id_article=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            $conn = null;
            return $res;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function deleteArticle($id)
    {
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("DELETE FROM articles WHERE id_article=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $conn = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function insertComment($author, $articleId, $userId, $content)
    {
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("INSERT INTO commentaires (auteur, article_id, utilisateur_id, contenu) VALUES (:author, :articleId, :userId, :content)");
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

    function deleteComment($commentId)
    {
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("DELETE FROM commentaires WHERE id_commentaire=:id");
            $stmt->bindParam(':id', $commentId, PDO::PARAM_INT);
            $stmt->execute();
            $conn = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function insertUser($lname, $fname, $username, $password, $email)
    {
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, prenom, pseudo, password, email) VALUES (:nom, :prenom, :pseudo, :password, :email)");
            $stmt->bindParam(':nom', $lname, PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $fname, PDO::PARAM_STR);
            $stmt->bindParam(':pseudo', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $res = $stmt->execute();
            $conn = null;
            return $res;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getUserByEmail($email)
    {
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("SELECT id, pseudo, password FROM utilisateurs WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            $conn = null;
            return $res;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>
