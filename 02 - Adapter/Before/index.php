<?php


require 'vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console

// Console > Project > Settings > General > API Credentials > Test Credentials
$sid = 'SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSs';
$token = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXx';
$client = new Client($sid, $token);
$message = $client->messages
                  ->create("+XXXXXXXX", // to
                           array(
                               "body" => "All in the game, yo",
                               "from" => "+15005550006"
                           )
                  );

print($message->sid);