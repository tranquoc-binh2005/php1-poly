<?php
class Database {
    public $conn;
    public $servername = "localhost";
    public $username = "root";
    public $password = "";

    function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=adamstore", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getAll($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getOne($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function insert($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            foreach ($params as $param => $value) {
                $stmt->bindValue($param, $value);
            }
            $stmt->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function execute($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params); 
            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw $e; 
        }
    }

}

$db = new Database();