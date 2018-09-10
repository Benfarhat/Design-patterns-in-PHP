<?php

class Connection 
{
    private static $instance_count = 0;
    private static $instance = null;

    public static function getInstanceCount() 
    {
        return self::$instance_count;
    }

    private function __construct() 
    {
        self::$instance_count++;
        echo "instance number: " . self::getInstanceCount() . "<br>";
    }

    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new Connection();
        }

        return self::$instance;
    }

    private function __clone() { }
    private function __wakeup() { }

    /* We don't need this 
    public function __destruct() {
        self::$instance_count--;
    }
    */
}