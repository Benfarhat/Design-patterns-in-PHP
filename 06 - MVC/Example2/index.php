<?php

require 'vendor/autoload.php';

use Controller\DefaultController;
use Controller\NumberController;


$debug = true;

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => $debug
    ]
]);
// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('./views/', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container->get('router'), $basePath));

    return $view;
};

$app->get('/test', function ($request, $response) {
    return 'Simple test of Slim works!';
});

$app->get('/', function ($request, $response) {
    $controller = new DefaultController($this->view); 
    return $controller->index($request, $response);
});

$app->get('/{module}[/{number}]', function ($request, $response, $args) {
    $module = $args['module'];
    $number = isset($args['number']) ? $args['number'] : 1;
    switch($module) {
        case 'number':
            $controller = new NumberController($this->view);
            break;
        default:
            $controller = new DefaultController($this->view);
    }


    return $controller->view($request, $response, $number);
});

$app->run();