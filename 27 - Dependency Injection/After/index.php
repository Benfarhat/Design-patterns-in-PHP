<?php

require 'vendor/autoload.php';

use App\AppFactory as App;
$user = App::create('user', 'Table');


print '<style>body{background-color:#212121;color:white;font-family:Courier,monospace;font-size:0.88em;}</style>';

$result = $user->findAll();

print("<pre>".print_r($result,true)."</pre>");

$result = $user->findByRole('role1');

print("<pre>".print_r($result,true)."</pre>");