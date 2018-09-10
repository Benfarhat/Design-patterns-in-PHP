<?php

include 'connection.php';

for($i = 0; $i < 50; $i++)
    $conn[] = new Connection();

echo '<pre>';
print_r($conn);
/* Or more easy
$con1 = new Connection();
$con2 = new Connection();
$con3 = new Connection();
*/