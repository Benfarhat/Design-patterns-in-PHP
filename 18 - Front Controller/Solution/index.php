<?php
require 'vendor/autoload.php';

use App\Core\FrontController,
    App\Core\Iface\DispatcherInterface,
    App\Core\Iface\ResponseInterface,
    App\Core\Iface\RequestInterface,
    App\Core\Iface\RouterInterface,
    App\Core\Router\Dispatcher,
    App\Core\Router\Router,
    App\Core\Router\Route,
    App\Core\HTTP\Response,
    App\Core\HTTP\Request,
    App\Core\Debug\Debug,
    App\Core\View\View;

$router = new Router();
$router->addRoute(new Route('/Article/', ['controller' => 'ArticleController', 'action' => 'index']))
        ->addRoute(new Route('/HomePage', ['controller' => 'DefaultController', 'action' => 'home']))
        ->addRoute(new Route('/API', ['controller' => 'ApiController', 'action' => 'list', 'method' => ['GET']]));

$router->defaultRoute(new Route(null, ['controller' => 'DefaultController', 'action' => "notFound"]));

//Debug::dump($router->getRoute());
$dispatcher = new Dispatcher();

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    $uri = 'https://';
} else {
    $uri = 'http://';
}
$uri .= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$request = new Request(
    array(
        'GET'     => array('getKey' => 'GET VALUE'),
        'POST'    => array('postKey' => 'POST VALUE'),
        'SESSION' => array('sessionKey' => 'SESSION VALUE'),
        'COOKIE'  => array('cookieKey' => 'COOKIE VALUE'),
    )
);

$response = new Response();

$frontController = new FrontController($router, $dispatcher);
$frontController->run($request, $response);

// Test it with this url /Article
/* 
You can use template tag {{ variable }} like twig to display $variable in your html code

*/