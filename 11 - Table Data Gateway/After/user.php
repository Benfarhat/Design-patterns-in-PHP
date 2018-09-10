<?php

class UserGateway 
{
    protected $connection = null;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=design_patterns", "root", "");
    }

    public function loadAll()
    {
        $sql = 'SELECT * from users';
        $rows = $this->connection->query($sql);

        return $rows;
    }

    public function __call($functionName, $argument)
    {
        $pattern = '/^loadBy(.+)/';

        if(preg_match($pattern, $functionName, $matches)){
            $wrapper = '';
            $value = implode(',', $argument);
            if(is_string($value)){
                $wrapper = '"';
            }
            $sql = 'SELECT * from users WHERE ' . strtolower($matches[1]) . ' = ' . $wrapper . $value . $wrapper;
            $result = $this->connection->query($sql);
            $rows = $result->fetch(PDO::FETCH_ASSOC);
            
            return $rows;

        } else {

            new Exception("Method $functionName not found");

        }
    }

}