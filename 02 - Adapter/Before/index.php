<?php


require 'vendor/autoload.php';

use Twilio\Rest\Client;
use SendGrid\Mail\Mail;

// -------------------TWILIO-------------------
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

// -------------------SENDGRID-------------------

$email = new Mail(); 
$email->setFrom("test@example.com", "Example User");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("test@example.com", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid(getenv('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}