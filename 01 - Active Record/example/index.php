<?php

require 'vendor/autoload.php';

use Controller\userController;

$user = new userController();

$user->view(2);