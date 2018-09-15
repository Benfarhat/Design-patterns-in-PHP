<?php
require 'vendor/autoload.php';

use App\FrontController;
    

$frontController = new FrontController();
$frontController->run();

/*
You can test by accessing to:

localhost/Article/index
localhost/Article/test
localhost/Article/test/2
localhost/Unavailable/test
localhost/Unavailable/test
localhost/Article/tesit/3
*/