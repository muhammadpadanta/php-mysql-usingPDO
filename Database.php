<?php

class Database {
    // Properti untuk menyimpan informasi koneksi ke database
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $connection; // Properti untuk objek koneksi PDO

    // Constructor untuk inisialisasi nilai properti
    public function __construct($host, $db_name, $username, $password) {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }

    //  untuk membuat koneksi ke database
    public function connect() {
        try {
            // Membuat objek koneksi PDO
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            // Mengatur mode error untuk koneksi PDO
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Menampilkan pesan jika koneksi gagal
            echo "Koneksi gagal: " . $e->getMessage();
            die(); // Menghentikan eksekusi skrip jika terjadi error
        }
    }

    // Method untuk memutus koneksi dari database
    public function disconnect() {
        // Memeriksa apakah koneksi sudah dibuat sebelumnya
        if ($this->connection) {
            $this->connection = null; // Menutup koneksi jika sudah dibuat sebelumnya
        }
    }

    // Method untuk menyiapkan pernyataan SQL sebelum dieksekusi
    public function prepareQuery($sql) {
        // Mengembalikan objek pernyataan PDO yang sudah disiapkan
        return $this->connection->prepare($sql);
    }

    // Method untuk mengeksekusi pernyataan SQL
    public function executeQuery($stmt, $params = []) {
        // Mengeksekusi pernyataan SQL dengan parameter opsional
        $stmt->execute($params);
        return $stmt; // Mengembalikan objek pernyataan PDO yang sudah dieksekusi
    }

    //  untuk mengambil semua baris hasil query dan menampilkan datanya
    public function fetchAll($stmt) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //  untuk mengambil satu baris hasil query dan menampilkan datanya
    public function fetchRow($stmt) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //  untuk mengambil jumlah baris yang terpengaruh oleh SELECT, INSERT, UPDATE, atau DELETE
    public function rowCount($stmt) {
        return $stmt->rowCount();
    }

    //  untuk mendapatkan ID terakhir yang dimasukkan ke dalam kolom dengan sifat auto-increment
    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }
}
