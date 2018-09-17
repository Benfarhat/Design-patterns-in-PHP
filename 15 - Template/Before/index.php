<?php

  class paperback
  {
    protected $title;
    protected $content;
       
    function setTitle( $str )
    {
      $this->title = $str;
    }

    function getTitle()
    {
      return $this->title;
    }
      
    function setContent( $str )
    {
      $this->content = $str;
    }    

    function getContent()
    {
      return $this->content;
    }

    function printBook()
    {
      var_dump("The book '{$this->title}' was printed.");
    }
  }
   
  class Ebook{
    protected $title;
    protected $content;
       
    function setTitle( $str )
    {
      $this->title = $str;
    }

    function getTitle()
    {
      return $this->title;
    }
      
    function setContent( $str )
    {
      $this->content = $str;
    }    

    function getContent()
    {
      return $this->content;
    }
        
    function generatePdf()
    {
      var_dump("A PDF was generated for the eBook '{$this->title}'.");
    }
  }
  

  $paperback = new Paperback;
      
  $paperback->setTitle("The greatest paperback ever");
  $paperback->printBook();

  echo "<hr>";

  $book = new Ebook();

  $book-> setTitle("My fantastic ebook");
  $book->generatePdf();