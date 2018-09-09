<?php

namespace Controller;

use Model\NumberModel;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class NumberController extends DefaultController
{
    public $model = null;
    public $view;

    public function __construct($view)
    {
        $this->model = new NumberModel();
        $this->view = $view;
    }

    public function view(Request $request, Response $response, $number = 0)
    {
        $model = $this->model;

        return  $this->view->render($response, 'view.html.twig', [
            'value' => $number,
            'result' => $this->model->square($number)
        ]);
    }
}