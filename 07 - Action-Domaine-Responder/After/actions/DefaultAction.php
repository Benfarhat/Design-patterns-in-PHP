<?php

namespace Actions;

use Responders\DefaultResponse;

class DefaultAction 
{
    protected $response = null;

    public function run()
    {
        $this->response = new DefaultResponse();
        $this->response->run();
    }
}