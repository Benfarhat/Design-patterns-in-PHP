<?php
include_once 'email.php';
include_once 'mock.php';

$email = new MockEmail();
$email->setProperties('test@example.com', 'from@example.com', 'subject', 'This is the body');
$email->send();