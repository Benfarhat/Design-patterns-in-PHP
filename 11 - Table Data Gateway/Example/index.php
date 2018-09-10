<?php
require 'vendor/autoload.php';
include_once 'user.php';

$gateway = new UserGateway();

$users = $gateway->select();
foreach ($users as $user) {
    echo $user['user_first_name'] . '<br />';
}

echo '<hr />';

$users = $gateway->select(array('user_id' => 2));
foreach ($users as $user) {
    echo $user['user_first_name'] . '<br />';
}