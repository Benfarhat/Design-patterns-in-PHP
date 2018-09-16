<?php

namespace App\Core\HTTP;

use App\Core\Iface\ResponseInterface,
App\Core\Iface\ViewInterface;

class Response implements ResponseInterface
{
    protected $_version;
    protected $_headers = array();
    protected $_error = false;
    
    public function raiseRoutingError()
    {
        $this->_headers[] = sprintf('HTTP/%s 404 Not Found', $this->_version);
        $this->_error = true;
        return $this;
    }
    public function raiseProcessingError()
    {
        $this->_headers[] = sprintf('HTTP/%s 503 Service Unavailable', $this->_version);
        $this->_error = true;
        return $this;
    }
    public function isError()
    {
        return $this->_error;
    }
    public function send(ViewInterface $view)
    {
        array_walk($this->_headers, function($header) {
            header($header, true);
        });
        echo $view->render();
    }
}