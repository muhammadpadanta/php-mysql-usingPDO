<?php
require_once 'Database.php';

$db = new Database('localhost', 'db_pbl_kel_1', 'root', '');
$db->connect();

$data = [
    'name' => 'tesInsertQuery',
    'email' => 'email@contoh.com',
    'username' => 'anjay' ,
    'password' => 'anjay' ,
];

$columns = implode(", ", array_keys($data));
$placeholders = ":" . implode(", :", array_keys($data));

$sql = "INSERT INTO users ($columns) VALUES ($placeholders)";
$stmt = $db->prepareQuery($sql);

$params = [];
foreach ($data as $key => $value) {
    $params[":$key"] = $value;
}

$db->executeQuery($stmt, $params);

$last_id = $db->lastInsertId();
$db->disconnect();

echo "User baru berhasil ditambahkan dengan user_id: $last_id";