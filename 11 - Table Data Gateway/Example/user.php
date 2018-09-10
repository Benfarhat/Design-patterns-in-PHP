<?php

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;

class UserGateway extends TableGateway 
{
    public function __construct()
    {
        $configArray = array(
            'driver' => 'Pdo_Mysql',
            'host' => 'localhost',
            'database' => 'design_patterns',
            'username' => 'root',
            'password' => '',
            'options' => array('buffer_results' => true)
        );

        $adapter = new Adapter($configArray);

        parent::__construct('users', $adapter);
    }
}

