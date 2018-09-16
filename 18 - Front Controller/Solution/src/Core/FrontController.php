<?php
namespace App\Core;

use App\Core\Iface\RouteInterface,
    App\Core\Iface\RouterInterface,
    App\Core\Iface\DispatcherInterface,
    App\Core\Iface\RequestInterface,
    App\Core\Iface\ResponseInterface,
    App\Core\Debug\Debug;

class FrontController {

    protected $router;
    protected $dispatcher;

    public function __construct(RouterInterface $router, DispatcherInterface $dispatcher) {
      $this->router = $router;
      $this->dispatcher = $dispatcher;
    }
    
    public function run(RequestInterface $request, ResponseInterface $response) {
      /*
      $route = $this->router->route($request, $response);
      // Debug::dump($route);
      $this->dispatcher->dispatch($route, $request, $response);
      $response->send($view);
      */
      $route = $this->router->route($request, $response);
      $this->dispatcher->dispatch($route, $request, $response);
      //$response->send($view);

    }
  }