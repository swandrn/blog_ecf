<?php
class DbHandler{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';

    //Connection
    function openDbConnection(){
        try{
            $conn = new PDO("mysql:host=$this->servername;dbname=blogecf", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>