<?php

require 'vendor/autoload.php';


use App\ProxyFile;

// Indented only to separate execution from loading time
    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    $start = $time;

$content = new ProxyFile('test.txt');
$content->display();

    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    $middle = $time;
    $total_time = round(($middle - $start), 4);
    echo '<hr>File loaded and display in '.$total_time.' seconds.', PHP_EOL;

    echo "<hr>File already loaded!", PHP_EOL;
    echo "<hr>";

$content->display();

    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    $finished = $time;
    $total_time = round(($finished - $start), 4);
    echo '<hr>File displayed in '.$total_time.' seconds.', PHP_EOL;