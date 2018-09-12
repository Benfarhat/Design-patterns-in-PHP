<?php
include_once 'SendInterface.php';
include_once 'EmailSender.php';
include_once 'SMSSender.php';

class EnvoiMessage
{
    private $sender;

    public function __construct(SendInterface $sender)
    {
        $this->sender = $sender;
    }

    public function getSenderClass()
    {
        return get_class($this->sender);
    }

    public function alert($message)
    {
        echo "Alert from {$this->getSenderClass()}: ";
        $this->sender->send($message);
    }
}

$alert1 = new EnvoiMessage(new EmailSender());
$alert1->alert("This is a test!");

$alert2 = new EnvoiMessage(new SMSSender());
$alert2->alert("This is a test!");

