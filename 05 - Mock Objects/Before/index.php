<?php
include_once 'email.php';

$email = new Email();
$email->setProperties('test@example.com', 'from@example.com', 'subject', 'This is the body');
$email->send();