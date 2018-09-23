<?php

/*
$conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
$sql = 'SELECT * from users';

$result = $conn->query($sql);

$row = $result->fetchAll(PDO::FETCH_ASSOC);
print_r($row);



print_r($conn);

die();
*/

require 'vendor/autoload.php';

use App\UserTable;
$user = new UserTable(); 
print '<style>body{background-color:#212121;color:white;font-family:Courier,monospace;font-size:0.88em;}</style>';
//print_r($user->findAll());

$result = $user->findByRole('role1');

print("<pre>".print_r($result,true)."</pre>");