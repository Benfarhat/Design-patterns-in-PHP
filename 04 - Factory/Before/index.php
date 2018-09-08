<?php

include_once 'vehicle.php';

$car = new Car(4);

echo $car->getType();

echo '<br>';

$truck = new Truck(18);

echo $truck->getType();