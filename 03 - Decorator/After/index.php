<?php
/**
 * PrettyPrintDecorator class
 * 
 * This is a decorator class that takes our object from before and outputs the data in various pre-defined formats.
 */
class PrettyPrintDecorator
{
    protected $book = null;

    public function __construct($book)
    {
        $this->book = $book;
    }

    public function getAuthor()
    {
        return $this->book->author_first_name . " " . $this->book->author_last_name;
    }

    public function getAuthorSortable()
    {
        return $this->book->author_last_name . ", " . $this->book->author_first_name;
    }
}

$book = new stdClass();
$book->title = "Patterns of Enterprise Application Architecture";
$book->author_first_name = "Martin";
$book->author_last_name = "Fowler";
$bookFormatted = new PrettyPrintDecorator($book);

echo $book->title . ' is a book written by ' .  $bookFormatted->getAuthor() . "<br>";

echo "But you will find the book under " . $bookFormatted->getAuthorSortable() . "<br>";