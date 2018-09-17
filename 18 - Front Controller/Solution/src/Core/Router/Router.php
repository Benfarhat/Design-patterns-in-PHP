<?php

namespace App\Core\Router;

use App\Core\Iface\RouterInterface,
    App\Core\Iface\RouteInterface,
    App\Core\Iface\RequestInterface,
    App\Core\Debug\Debug,
    App\Core\Iface\ResponseInterface;

class Router implements RouterInterface
{
    protected $routes = [];
    static $defaultRoute = null;
    public function __construct()
    {

    }
    public function addRoute(RouteInterface $route)
    {
        $this->routes[] = $route;
        return $this;
    }
    public function defaultRoute($defaultRoute)
    {
        $this::$defaultRoute = $defaultRoute;
        return $this;
    }
    public function getRoute()
    {
        return $this->routes;
    }
    public function route(RequestInterface $request, ResponseInterface $response)
    {

        $matchingRoute = null;
        foreach ($this->routes as $route) {
            if ($route->matches($request)) {
                //Debug::dump($route);
                $matchingRoute = $route;
                break;
            }
        }
        if (!$matchingRoute) {
            if(!is_null(self::$defaultRoute)){
                $matchingRoute = self::$defaultRoute;
            } else {
                $response->raiseRoutingError();
            }
        }
        return $matchingRoute;
    }
}