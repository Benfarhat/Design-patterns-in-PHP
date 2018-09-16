<?php

namespace App\Core\Iface; // Cannot use Interface keyword

interface DispatcherInterface
{
    public function dispatch(
        RouteInterface $route,
        RequestInterface $request,
        ResponseInterface $response
    );
}