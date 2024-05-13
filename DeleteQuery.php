<?php
// Menghubungkan file ini dengan file Database.php
require_once 'Database.php';

// Membuat objek baru dari class Database dengan parameter koneksi database
$db = new Database('localhost', 'db_pbl_kel_1', 'root', '');
// Membuka koneksi ke database
$db->connect();

// Menyimpan ID user yang akan dihapus
$id = 18;

// Menyimpan query SQL untuk menghapus user dari tabel users
$sql = "DELETE FROM users WHERE user_id = :id";
// Menyiapkan query SQL untuk dieksekusi
$stmt = $db->prepareQuery($sql);
// Membuat array $params untuk menyimpan placeholder dan nilai yang sesuai
$params = [':id' => $id];
// Menjalankan query SQL yang telah disiapkan dengan parameter yang telah ditentukan
$db->executeQuery($stmt, $params);

// Mengambil jumlah baris yang terpengaruh oleh query SQL
$rows_affected = $db->rowCount($stmt);
// Jika ada baris yang terpengaruh (yaitu, user berhasil dihapus)
if ($rows_affected > 0) {
    // Menampilkan pesan bahwa user berhasil dihapus
    echo "User dengan user_id: $id berhasil dihapus.";
} else {
    // Menampilkan pesan bahwa tidak ada user yang terhapus
    echo "Tidak ada user yang terhapus.";
}

// Menutup koneksi ke database
$db->disconnect();