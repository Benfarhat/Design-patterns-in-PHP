<?php

class Dispatcher 
{
    protected $listeners = array();

    protected static $_instance = null;

    protected function __construct(){ }

    public static function getInstance()
    {
        if(is_null(self::$_instance)){
            self::$_instance = new Dispatcher();
        }
        return self::$_instance;
    }

    public static function subscribe($object, $subscriber)
    {
        $instance = self::getInstance(); // ???
        $id = spl_object_hash($object);
        $instance->listeners[$id][] = $subscriber;
    }

    public static function publish($object)
    {
        $instance = self::getInstance();
        $id = spl_object_hash($object);

        $subscribers = $instance->listeners[$id];

        foreach($subscribers as $subscriber) {
            $subscriber->doSomething(false);
        }
    }
}