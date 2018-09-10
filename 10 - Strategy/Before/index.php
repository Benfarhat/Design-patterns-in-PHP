<?php

include_once 'output.php';

$input = 10;

$output = new Output();

echo $output->square($input) . '<br>';
echo $output->cube($input) . '<br>';
echo $output->fourth($input);