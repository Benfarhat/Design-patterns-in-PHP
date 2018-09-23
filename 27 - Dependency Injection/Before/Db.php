<?php

namespace App;

class Db 
{
    private static $instance = null;

    private function __construct() 
    {
        return new PDO("mysql:host=localhost;dbname=design_patterns", "root", "");
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


}