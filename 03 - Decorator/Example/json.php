<?php

class JSONDecorator
{
    protected $book = null;

    public function __construct($book)
    {
        $this->book = $book;
    }

    public function render()
    {
        echo json_encode($this->book);
    }
}