<?php
namespace App\Core\Router;

use App\Core\Iface\RouteInterface,
    App\Core\Iface\RequestInterface,
    App\Core\Iface\ResponseInterface,
    App\Core\Iface\ViewInterface,
    App\Core\Iface\DispatcherInterface,
    App\Controller\ControllerFactory;

use App\Core\Debug\Debug;

class Dispatcher implements DispatcherInterface
{

    public function dispatch(
            RouteInterface $route,
            RequestInterface $request,
            ResponseInterface $response
    )
    {
        $cap = $route->getControllerActionParams();


        $action = $cap['action'];
        $class = ControllerFactory::create($cap['controller']);
        $class->{$action}();

    }
}