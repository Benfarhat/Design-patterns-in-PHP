<?php

include_once 'controllers/default_controller.php';
include_once 'controllers/number_controller.php';
include_once 'models/number_model.php';

/*
* Exemple d'URL: index.php?a=view&m=number&id=5
*    a:     action
*    m:     module
*    id:    value
*/
$action = isset($_GET['a']) ? $_GET['a'] : 'index';
$module = isset($_GET['m']) ? $_GET['m'] : '';
$id     = isset($_GET['id']) ? $_GET['id'] : '';

switch($module) {
    case 'number':
        $controller = new NumberController();
        break;
    default:
        $controller = new DefaultController();
}

$controller->run($action, $id);