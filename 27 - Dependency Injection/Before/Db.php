<?php

namespace App;

use PDO;

class Db 
{
    private static $instance = null;

    private function __construct() { }

    public static function getInstance()
    {
        if(is_null(self::$instance)){
            try
            {
                self::$instance = new PDO("mysql:host=localhost;dbname=test", "root", "");
            } catch(PDOException $e) {
                echo 'Erreur de connexion au serveur MySQL ! <br /> Erreur détectée : '.$e->getMessage();
                exit(); 
            }
            
        }
        return self::$instance;
    }

    private function __clone() { }
    private function __wakeup() { }


}