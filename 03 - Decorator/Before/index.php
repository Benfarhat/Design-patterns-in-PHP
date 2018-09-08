<?php


$book = new stdClass();
$book->title = "Pattern of Enterprise Application Architecture";
$book->author_first_name = "Martin";
$book->author_last_name = "Fowler";

/*
Constater dans les lignes qui suivent que nous avons parfois besoin de réutiliser à plusieurs endroit le nom de l'auteur ce qui est difficile.
Et si jamais nous changer quelquechose, nous devrions modifier toutes les occurences possibles.
*/

echo $book->title . ' is a book written by ' . $book->author_first_name . ' ' . $book->author_last_name . '<br>';
echo 'But you will find the book under ' . $book->author_last_name . ', ' . $book->author_first_name . '<br>';