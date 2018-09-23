<?php

namespace App;

use PDO;

class Db 
{
    private static $instance = null;
    private $connection = null;

    private function __construct() { 
        $this->connection =  new PDO("mysql:host=localhost;dbname=test", "root", "");
    }

    public static function getInstance()
    {
        if(is_null(self::$instance)){
            try
            {
                self::$instance = new Db();
            } catch(PDOException $e) {
                echo 'Erreur de connexion au serveur MySQL ! <br /> Erreur détectée : '.$e->getMessage();
                exit(); 
            }
            
        }
        return self::$instance;
    }

    public function __call($methodName, $arguments){
        return $this->connection->$methodName($arguments[0]);
    }

    private function __clone() { }
    private function __wakeup() { }


}