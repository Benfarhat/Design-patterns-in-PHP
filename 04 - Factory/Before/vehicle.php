<?php

class Vehicle
{
    public $wheels;
    public function __construct($wheels)
    {
        $this->wheels = $wheels;
    }

    public function getType()
    {
        return get_class($this);
    }
}

class Car extends Vehicle {}

class Truck extends Vehicle {}