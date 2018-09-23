<?php

namespace App;

use App\Db;

Class Table 
{
    protected $table;
    protected $connection = null;

    public function __construct(\App\Db $db)
    {
        if(is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . "s";
        }
        $this->connection = $db;
    }

    private function beforeAction() {

    }

    private function afterAction() {

    }

    public function findAll()
    {
        $sql = 'SELECT * from ' . $this->table;

        $result = $this->connection->query($sql);

        $rows = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }

    private function findBy($field, $value)
    {
        $search = ' = "' . $value[0] . '"';
        $sql = 'SELECT * from ' . $this->table . " WHERE $field $search";
        $result = $this->connection->query($sql);
        $rows = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }

    public function __call($methodName, $arguments)
    {

        if (method_exists($this, $methodName))
        {
            $this->beforeAction();
            call_user_func(array($this, $methodName), $arguments);
            $this>afterAction();;
        }
        elseif (strpos($methodName, 'findBy') === 0) {
            return $this->findBy(strtolower(substr($methodName, 6)), $arguments);
        } else {
            $class = get_class($this);
            throw new \BadMethodCallException("No callable method $methodName at $class class");
        }
    }
}