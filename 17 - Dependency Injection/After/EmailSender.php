<?php

class EmailSender implements SendInterface
{

    public function send($message)
    {
        echo "Your message was sent by mail! <br>";
    }
}