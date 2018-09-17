<?php

namespace App\Core\Router;

use App\Core\Iface\RequestInterface,
    App\Core\HTTP\Request,
    App\Core\Iface\RouteInterface;

class Route implements RouteInterface
{
    protected $path;
    protected $action = [];
    public function __construct($path, $action)
    {
        $this->path = $path;
        $this->action = $action;
    }
    public function matches(RequestInterface $request)
    {
        if (!$request instanceof Request) {
            return false;
        }
        return $this->path === $request->getPath();
    }
    public function getControllerActionParams()
    {
        return $this->action;
    }
}