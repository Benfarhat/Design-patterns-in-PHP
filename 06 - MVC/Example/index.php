<?php

require 'vendor/autoload.php';

include_once 'controllers/default_controller.php';
include_once 'controllers/number_controller.php';
include_once 'models/number_model.php';

$app = new Slim\App;

$app->get('/test', function ($request, $response) {
    return 'Simple test of Slim works!';
});

$app->get('/', function ($request, $response) {
    include 'views/default.php';
});

$app->get('/{module}[/{number}]', function ($request, $response, $args) {
    $module = $args['module'];
    $number = isset($args['number']) ? $args['number'] : 1;
    switch($module) {
        case 'number':
            $controller = new NumberController();
            break;
        default:
            $controller = new DefaultController();
    }

    $action = 'view';

    $controller->run($action, $number);
});
$app->run();