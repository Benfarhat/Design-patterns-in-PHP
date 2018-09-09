<?php

namespace Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class DefaultController
{

    protected $view; 

    public function __construct($twig)
    {
        $this->view = $twig;
    }

    public function run($action = 'index', $id = 0)
    {
        if(!method_exists($this, $action)) {
            $action = 'index';
        }

        return $this->$action($id);
    }

    public function index(Request $request, Response $response)
    {
        return $this->view->render($response, 'default.html.twig');
    }
}