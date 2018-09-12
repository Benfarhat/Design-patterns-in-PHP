<?php


class SMSSender implements SendInterface
{
    public function send($message)
    {
        echo "Your message was sent by SMS! <br>";
    }
}