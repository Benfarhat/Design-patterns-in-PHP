<?php

require 'vendor/autoload.php';

use App\Notify;

$notify = new Notify();
$notify->send('17035551212', '15125551212', 'body of the message');