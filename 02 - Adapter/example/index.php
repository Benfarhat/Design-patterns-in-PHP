<?php

require 'vendor/autoload.php';

use Zend\Db\Adapter\Adapter;

$configArray = [
    'driver'   => 'Pdo_Mysql',
    'database' => 'design_patterns',
    'username' => 'root',
    'password' => '',
    'hostname' => 'localhost',
    'charset'  => 'utf8'
];

$adapter = new Adapter($configArray);
$sql = "SELECT * FROM `posts` WHERE `id` = :id";    
$statement = $adapter->query($sql);
$result = $statement->execute(array("id" => "4"));

echo '<pre>';
var_dump($result->current());
