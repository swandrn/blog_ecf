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
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
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
            $stmt = $conn->prepare("SELECT id_article, titre, contenu, auteur, date_creation, categorie_id FROM articles");
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

    function selectArticlesOfUser($userId)
    {
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("SELECT id_article, titre, contenu, auteur, date_creation, categorie_id FROM articles WHERE utilisateur_id=:userId");
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    function selectCommentsOfArticle($articleId)
    {
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("SELECT id_commentaire, auteur, contenu, date_creation FROM commentaires WHERE article_id=:articleId");
            $stmt->bindParam(':articleId', $articleId, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $conn = null;
            return $res;
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

    /**
     * Select the ID of a given user
     * @param string $username
     * @return array array of key value where key is column name
     */
    function selectUserId($username)
    {
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("SELECT id_utilisateur FROM utilisateurs WHERE pseudo=:username");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            $conn = null;
            return $res['id_utilisateur'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Select the user with a given email
     * @param string $email
     * @return array|false returns the user id, username, and password on success and false on failure
     */
    function getUserByEmail($email)
    {
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("SELECT id_utilisateur, pseudo, password FROM utilisateurs WHERE email = :email");
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

    //FONCTION UPDATE A VERIFIER
    function updateArticle($articleId, $categoryId, $title, $content)
    {
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("UPDATE articles SET categorie_id = :categoryId, titre = :title, contenu = :content WHERE id_article = :articleId");
            $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':articleId', $articleId, PDO::PARAM_INT);
            $stmt->execute();
            $conn = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getCategoryName($id){
        try {
            $conn = $this->openDbConnection();
            $stmt = $conn->prepare("SELECT nom_categorie FROM categories WHERE id_categorie = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            $conn = null;
            return $res['nom_categorie'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
