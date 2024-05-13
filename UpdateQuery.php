<?php
require_once 'Database.php';

$db = new Database('localhost', 'db_pbl_kel_1', 'root', '');
$db->connect();



$data = [
    'id' => 17,
    'name' => 'Nama Baru aja',
    'email' => 'email_baru1@contoh.com',
    'username' => 'anjay123' ,
];

$id = $data['id'];
unset($data['id']);  

$setClauses = [];
foreach ($data as $key => $value) {
    $setClauses[] = "$key = :$key";
}
$setClause = implode(', ', $setClauses);

$sql = "UPDATE users SET $setClause WHERE user_id = :id";
$stmt = $db->prepareQuery($sql);

$params = [':id' => $id];
foreach ($data as $key => $value) {
    $params[":$key"] = $value;
}

$db->executeQuery($stmt, $params);
$db->disconnect();

echo "Data User dengan user_id $id berhasil diperbarui.";