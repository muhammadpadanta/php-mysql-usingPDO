<?php
// Menghubungkan file ini dengan file Database.php
require_once 'Database.php';

// Membuat objek baru dari class Database dengan parameter koneksi database
$db = new Database('localhost', 'db_pbl_kel_1', 'root', '');
// Membuka koneksi ke database
$db->connect();

// Menyimpan query SQL untuk mengambil semua data dari tabel users
$sql = "SELECT * FROM users";
// Menyiapkan query SQL untuk dieksekusi
$stmt = $db->prepareQuery($sql);
// Menjalankan query SQL yang telah disiapkan
$db->executeQuery($stmt);

// Mengambil semua baris hasil dari query SQL dan menyimpannya dalam variabel $data
$data = $db->fetchAll($stmt);
// Menutup koneksi ke database
$db->disconnect();


foreach ($data as $user) {
    // Menampilkan data user 
    echo "ID: " . $user['user_id'] . "\n";
    echo "Name: " . $user['name'] . "\n";
    echo "Email: " . $user['email'] . "\n";
    echo "Username: " . $user['username'] . "\n";
    echo "\n";
}