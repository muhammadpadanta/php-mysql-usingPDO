<?php
// Menghubungkan file ini dengan file Database.php
require_once 'Database.php';

// Membuat objek baru dari class Database dengan parameter koneksi database
$db = new Database('localhost', 'db_pbl_kel_1', 'root', '');
// Membuka koneksi ke database
$db->connect();

// Menyimpan data yang akan dimasukkan ke dalam database
$data = [
    'name' => 'tesInsertQuery',
    'email' => 'email@contoh.com',
    'username' => 'anjay' ,
    'password' => 'anjay' ,
];

// Mengambil nama kolom dari array $data dan menggabungkannya menjadi string
$columns = implode(", ", array_keys($data));
// Membuat placeholder untuk setiap nilai dalam array $data
$placeholders = ":" . implode(", :", array_keys($data));

// Menyimpan query SQL untuk memasukkan data ke dalam tabel users
$sql = "INSERT INTO users ($columns) VALUES ($placeholders)";
// Menyiapkan query SQL untuk dieksekusi
$stmt = $db->prepareQuery($sql);

// Membuat array $params untuk menyimpan placeholder dan nilai yang sesuai
$params = [];
foreach ($data as $key => $value) {
    $params[":$key"] = $value;
}

// Menjalankan query SQL yang telah disiapkan dengan parameter yang telah ditentukan
$db->executeQuery($stmt, $params);

// Mengambil ID dari baris yang baru saja dimasukkan ke dalam database
$last_id = $db->lastInsertId();
// Menutup koneksi ke database
$db->disconnect();

// Menampilkan pesan bahwa user baru telah berhasil ditambahkan
echo "User baru berhasil ditambahkan dengan user_id: $last_id";