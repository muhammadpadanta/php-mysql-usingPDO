<?php

class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $connection;

    public function __construct($host, $db_name, $username, $password) {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect() {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Koneksi gagal: " . $e->getMessage();
            die();
        }
    }

    public function disconnect() {
        if ($this->connection) {
            $this->connection = null;
        }
    }

    public function prepareQuery($sql) {
        return $this->connection->prepare($sql);
    }

    public function executeQuery($stmt, $params = []) {
        $stmt->execute($params);
        return $stmt;
    }

    public function fetchAll($stmt) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchRow($stmt) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount($stmt) {
        return $stmt->rowCount();
    }

    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }
}
