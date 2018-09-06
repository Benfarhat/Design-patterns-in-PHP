<?php
include_once 'user.php';

$connection = new PDO("mysql:host=localhost;dbname=design_patterns", "root", "");

$sql = 'SELECT * from users WHERE user_id = 2';

$result = $connection->query($sql);

$row = $result->fetch(PDO::FETCH_ASSOC);

$user = new User();

$user->user_id = $row['user_id'];
$user->user_first_name = $row['user_first_name'];
$user->user_last_name = $row['user_last_name'];
$user->user_company = $row['user_company'];
$user->user_email = $row['user_email'];

echo '<pre>';
print_r($user);
echo '</pre>';