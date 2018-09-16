<?php

namespace App\Controller;

use App\Core\View\View;

class AppController
{
    private $view = null;
    private $viewDirectory = '../View/';
    private $viewExtension = 'tpl';

    public function __construct()
    {

        $this->view = new View();
    }
    public function render($template, $params = [])
    {

        $this->view->pass($params)
                   ->setTemplate(__DIR__ . '/' . $this->viewDirectory . $template . '.' . $this->viewExtension)
                   ->render();
        die(); // Don't need something else after rendering ...
    }
}