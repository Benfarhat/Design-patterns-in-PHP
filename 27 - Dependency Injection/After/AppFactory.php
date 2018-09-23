<?php

// Remember that Container will be implemented in another Pattern

namespace App;
use App\Db;

class AppFactory
{
    static $ns = __NAMESPACE__ . DIRECTORY_SEPARATOR;

    private function __construct()
    { }

    public static function create($class, $suffix = '')
    {
        $class_name = self::$ns . ucfirst($class) . ucfirst($suffix); 
        if(ucfirst($suffix) == 'Table') {
            return new $class_name(Db::getInstance()); 
        } else {
            return new $class_name(); 
        }
    }
}