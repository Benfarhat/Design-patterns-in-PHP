<?php

include_once 'vehicle.php';


$car = Vehicle::create('car', 4);
echo $car->getType();

echo '<br>';

$truck = Vehicle::create('truck', 18);
echo $truck->getType();

echo '<br>';

$boat = Vehicle::create('boat', 2);
echo $boat->getType();

echo '<br>';

echo '<pre>';

var_dump($car);
var_dump($truck);
var_dump($boat);