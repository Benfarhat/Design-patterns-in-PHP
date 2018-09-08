<?php

class HTMLDecorator
{
    protected $book = null;

    public function __construct($book)
    {
        $this->book = $book;
    }

    public function render()
    {
        $properties = get_object_vars($this->book);
        echo "<ul>";
        foreach($properties as $k => $v) {
            echo '<li>' . $k . ' -- ' . $v . '</li>';
        }
        echo "</ul>";
    }
}