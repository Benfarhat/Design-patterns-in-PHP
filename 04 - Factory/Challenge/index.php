<?php
include_once 'shapes.php';

$shape = Shape::getShape('circle', 3);

echo $shape->getArea();
// 9*Pi

$shape = Shape::getShape('suqare', 3);

echo $shape->getArea();
// 9