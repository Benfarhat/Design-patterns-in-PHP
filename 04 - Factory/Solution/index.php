<?php
include_once 'shapes.php';

$shape = Shape::getShape('circle', 3);

echo $shape->getArea();
// 9*Pi

echo '<hr>';

$shape = Shape::getShape('square', 3);

echo $shape->getArea();
// 9

echo '<hr>';
try {
    // We should get an error;
    $shape = Shape::getShape('blablabla', 3);
} catch(Exception $e) {
    echo "Exception recu:<br>";
    echo $e->message;
}