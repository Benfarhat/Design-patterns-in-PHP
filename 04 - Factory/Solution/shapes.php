<?php

class Shape
{
    public static function getShape($class, $dimension){
        if (is_subclass_of($class, self::class)) { // You can use __CLASS__ or self::class
            return new $class($dimension);
        } else {
            throw new Exception("Unrecognized shape");
        }
    }
}

class Circle extends Shape
{
    protected $radius = 0;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getArea()
    {
        return $this->radius * $this->radius * pi();
    }
}

class Square extends Shape
{
    protected $side = 0;

    public function __construct($side)
    {
        $this->side = $side;
    }

    public function getArea()
    {
        return $this->side * $this->side ;
    }
}

