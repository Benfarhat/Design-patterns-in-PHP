<?php

class SMSSender 
{
    private static $instance = null;

    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new SMSSender();
        }

        return self::$instance;
    }
    private function __construct() { }
    private function __clone() { }
    private function __wakeup() { }

    public static function send($message)
    {
        echo "Your message was sent by SMS!";
    }
}