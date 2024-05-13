<?php
require_once 'Database.php';

$db = new Database('localhost', 'db_pbl_kel_1', 'root', '');
$db->connect();

$id = 18;

$sql = "DELETE FROM users WHERE user_id = :id";
$stmt = $db->prepareQuery($sql);
$params = [':id' => $id];
$db->executeQuery($stmt, $params);

$rows_affected = $db->rowCount($stmt);
if ($rows_affected > 0) {
    echo "User dengan user_id: $id berhasil dihapus.";
} else {
    echo "Tidak ada user yang terhapus.";
}

$db->disconnect();