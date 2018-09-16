<?php

namespace App\Core\Iface; // Cannot use Interface keyword

interface RouterInterface
{
    public function addRoute(RouteInterface $route);
    public function getRoute();
    public function route(RequestInterface $request, ResponseInterface $response);
}