<?php

class vehicle 
{
    public $wheels;
    public $isStdClass = false;

    public function __construct($wheels)
    {
        $this->wheels = $wheels;
    }

    public static function create($class, $wheels)
    {
        if (is_subclass_of($class, __CLASS__)) {
            return new $class($wheels);
        } else {
            $instance = new class {
                public $wheels;
                public function getType()
                {
                    return get_class($this);
                }          
            };
            $instance->wheels = $wheels;
            return $instance;
        }
    }


    public function getType()
    {
        return get_class($this);
    }
}

class Car extends Vehicle {}

class Truck extends Vehicle {}