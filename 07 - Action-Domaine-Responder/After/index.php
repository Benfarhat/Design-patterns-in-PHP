<?php
require 'vendor/autoload.php';

use Actions\DefaultAction;
use Actions\NumberViewAction;

$action = isset($_GET['a']) ? $_GET['a'] : 'view';
$domain = isset($_GET['m']) ? $_GET['m'] : '';
$id     = isset($_GET['id']) ? $_GET['id'] : '';

switch($domain) {
    case 'number':
        $action = new NumberViewAction();
        break;
    default:
        $action = new Actions\DefaultAction();
}

$action->run($id);