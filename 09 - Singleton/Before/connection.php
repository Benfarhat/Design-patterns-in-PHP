<?php

class Connection 
{
    private static $instance_count = 0;

    public static function getInstanceCount() 
    {
        return self::$instance_count;
    }

    public function __construct() 
    {
        self::$instance_count++;
        echo "instance number: " . self::getInstanceCount() . "<br>";
    }

    /* We don't need this 
    public function __destruct() {
        self::$instance_count--;
    }
    */
}
