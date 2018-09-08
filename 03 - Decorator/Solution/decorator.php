<?php

class Decorator {
    public $sentence;

    public function lower()
    {
        return strtolower($this->sentence);
    }

    public function uppercase()
    {
        return strtoupper($this->sentence);
    }
}