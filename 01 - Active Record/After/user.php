<?php

class User {
    protected $connection = null;

    public function __construct(){
        $this->connection = new PDO("mysql:host=localhost;dbname=design_patterns", "root", "");
    }

    public function load($id)
    {
        $sql = 'SELECT * from users WHERE user_id = ' . (int) $id;

        $result = $this->connection->query($sql);

        $row = $result->fetch(PDO::FETCH_ASSOC);

        foreach($row as $column => $value) {
            $this->$column = $value;
        }
    }

}
