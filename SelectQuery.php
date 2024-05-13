<?php
require_once 'Database.php';

$db = new Database('localhost', 'db_pbl_kel_1', 'root', '');
$db->connect();

$sql = "SELECT * FROM users";
$stmt = $db->prepareQuery($sql);
$db->executeQuery($stmt);

$data = $db->fetchAll($stmt);
$db->disconnect();

foreach ($data as $user) {
    echo "ID: " . $user['user_id'] . "\n";
    echo "Name: " . $user['name'] . "\n";
    echo "Email: " . $user['email'] . "\n";
    echo "Username: " . $user['username'] . "\n";
    echo "\n";
}