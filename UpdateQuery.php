<?php
// Menghubungkan file ini dengan file Database.php
require_once 'Database.php';

// Membuat objek baru dari class Database dengan parameter koneksi database
$db = new Database('localhost', 'db_pbl_kel_1', 'root', '');
// Membuka koneksi ke database
$db->connect();

// Menyimpan data yang akan diperbarui dalam database
$data = [
    'id' => 19,
    'name' => 'Nama Baru aja',
    'email' => 'email_baru1@contoh.com',
    'username' => 'anjay123' ,
];

// Menyimpan ID user yang akan diperbarui
$id = $data['id'];
// Menghapus ID dari array $data
unset($data['id']);  

// Membuat array untuk menyimpan klausa SET dalam query SQL
$setClauses = [];
// Melakukan loop pada setiap item dalam array $data
foreach ($data as $key => $value) {
    // Menambahkan klausa SET untuk setiap item
    $setClauses[] = "$key = :$key";
}
// Menggabungkan semua klausa SET menjadi satu string
$setClause = implode(', ', $setClauses);

// Menyimpan query SQL untuk memperbarui data dalam tabel users
$sql = "UPDATE users SET $setClause WHERE user_id = :id";
// Menyiapkan query SQL untuk dieksekusi
$stmt = $db->prepareQuery($sql);

// Membuat array $params untuk menyimpan placeholder dan nilai yang sesuai
$params = [':id' => $id];
foreach ($data as $key => $value) {
    $params[":$key"] = $value;
}

// Menjalankan query SQL yang telah disiapkan dengan parameter yang telah ditentukan
$db->executeQuery($stmt, $params);
// Menutup koneksi ke database
$db->disconnect();

// Menampilkan pesan bahwa data user telah berhasil diperbarui
echo "Data User dengan user_id $id berhasil diperbarui.";