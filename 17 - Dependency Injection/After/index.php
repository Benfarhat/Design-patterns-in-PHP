<?php
include_once 'EmailSender.php';

class EnvoiMessage
{
    public function alert($message)
    {
        $sender = EmailSender::getInstance();
        $sender->send($message);
    }
}

$alert1 = new EnvoiMessage();
$alert1->alert("This is a test!");

// There is a dependcy between EnvoiMessage and EmailSender!
// If we want to change de sender we also have to touch EnvoiMessage's code