<?php

include_once 'decorator.php';

$object = new Decorator();
$object->sentence = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem dicta enim sunt voluptates id, et sint? Voluptatibus necessitatibus totam porro.";

echo $object->lower();
echo $object->uppercase();