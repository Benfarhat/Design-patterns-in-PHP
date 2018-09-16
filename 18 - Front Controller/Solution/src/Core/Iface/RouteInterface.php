<?php

namespace App\Core\Iface; // Cannot use Interface keyword

interface RouteInterface
{
    public function matches(RequestInterface $request);
    public function getControllerActionParams();
}