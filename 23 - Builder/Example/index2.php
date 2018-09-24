<?php

abstract class AbstractPageBuilder {
    abstract function getPage();
}

abstract class AbstractPageDirector {
    abstract function __construct(AbstractPageBuilder $builder_in);
    abstract function buildPage();
    abstract function getPage();
}

class HTMLPage {
    private $page = NULL;
    private $page_title = NULL;
    private $page_heading = NULL;
    private $page_content = NULL;
    function __construct() {
    }
    function showPage($echo = false) {
        if($echo){
            echo $this->page;
        } else {
            return $this->page;
        }
    }
    function setTitle($title_in) {
      $this->page_title = $title_in;
    }
    function setHeading($lvl, $heading_in) {
      $this->page_content .= "<h$lvl>" . $heading_in . "</h$lvl>";
    }
    function setText($text_in) {
      $this->page_content .= '<p>' . $text_in . '</p>';
    }
    function formatPage() {
       $this->page  = '<html>';
       $this->page .= '<head><title>'.$this->page_title.'</title></head>';
       $this->page .= '<body>';
       $this->page .= $this->page_content;
       $this->page .= '</body>';
       $this->page .= '</html>';
    }
}

class HTMLPageBuilder extends AbstractPageBuilder {
    private $page = NULL;
    function __construct() {
      $this->page = new HTMLPage();
    }
    function setTitle($title_in) {
      $this->page->setTitle($title_in);
    }
    function setHeading($lvl, $heading_in) {
      $this->page->setHeading($lvl, $heading_in);
    }
    function setText($text_in) {
      $this->page->setText($text_in);
    }
    function formatPage() {
      $this->page->formatPage();
    }
    function getPage() {
      return $this->page;
    }
}

class HTMLPageDirector extends AbstractPageDirector {
    private $builder = NULL;
    public function __construct(AbstractPageBuilder $builder_in) {
         $this->builder = $builder_in;
    }
    public function buildPage() {
      $this->builder->setTitle('Testing the HTMLPage');
      $this->builder->setHeading(1, 'Testing the Title');
      $this->builder->setHeading(3, 'Testing the Subtitle');
      $this->builder->setText('Testing, testing, testing!');
      $this->builder->setText('Testing, testing, testing, or!');
      $this->builder->setText('Testing, testing, testing, more!');
      $this->builder->formatPage();
    }
    public function getPage() {
      return $this->builder->getPage();
    }
}

  $pageBuilder = new HTMLPageBuilder();
  $pageDirector = new HTMLPageDirector(new HTMLPageBuilder());
  $pageDirector->buildPage();
  $page = $pageDirector->getPage();
  $page->showPage(true);
