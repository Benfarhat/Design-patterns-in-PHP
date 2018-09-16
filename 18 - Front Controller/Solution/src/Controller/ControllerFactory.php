<?php

namespace App\Controller;

class ControllerFactory
{
    private function __construct(){ }

    public static function create($controller){

        $controller = str_ireplace('controller', '', $controller);
        $class_name = ucfirst($controller) . 'Controller'; 
        $controller = 'App\\Controller\\'.$class_name;
        
        if (class_exists($controller)) {
            return new $controller();
        } else {
            new \Exception("$controller is not a valid class.");
        }
         
    }

}