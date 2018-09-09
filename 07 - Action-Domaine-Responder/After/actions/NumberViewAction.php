<?php

namespace Actions;

use Responders\NumberViewResponse;

class NumberViewAction
{
    protected $response = null;

    public function run($number){
        $this->response = new NumberViewResponse();
        $this->response->number = $number;
        $this->response->run();
    }
}