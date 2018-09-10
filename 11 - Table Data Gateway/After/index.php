<?php

include_once 'user.php';

$gateway = new UserGateway();

$users = $gateway->loadAll();


foreach($users as $user){
    echo $user['user_first_name'] . '<br>';
}

echo '<hr>';

// $user = $gateway->loadBy<fieldName>(<value>)
$user = $gateway->loadByUser_id(2);
echo $user['user_first_name'] . '<br>';

$user = $gateway->loadByUser_first_name('Willa');
echo $user['user_last_name'] . '<br>';
