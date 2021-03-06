<?php

class Component 
{
    protected $name = '';
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function doSomething($extend = true)
    {
        echo "{$this->name} did something!<br>";

        if($extend){
            $instance = Dispatcher::getInstance();
            $instance::publish($this);
        }
    }
}