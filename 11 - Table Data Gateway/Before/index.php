<?php
$connection = new PDO("mysql:host=localhost;dbname=design_patterns", "root", "");


$sql = 'SELECT * from users';

$result = $connection->query($sql);

$rows = $result->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row){
    echo $row['user_first_name'] . '<br>';
}

echo '<hr>';


$sql = 'SELECT * from users WHERE user_id = 2';

$result = $connection->query($sql);

$row = $result->fetch(PDO::FETCH_ASSOC);

echo $row['user_first_name'] . '<br>';