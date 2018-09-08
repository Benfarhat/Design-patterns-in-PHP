<?php
require 'vendor/autoload.php';

use Zend\Config\Factory;

echo '<pre>';

$config = Factory::fromFile('config.json',true);
var_dump($config);

echo '-------------------------------------------\n';

$config = Factory::fromFile('config.php',true);
var_dump($config);

echo '-------------------------------------------\n';

$config = Factory::fromFile('config.xml',true);
var_dump($config);

echo '-------------------------------------------\n';

/*
$config = Factory::fromFile('config.yaml',true);
var_dump($config);

echo '-------------------------------------------\n';

$config = Factory::fromFile('./config.ini', true);
var_dump($config);
*/