<?php

namespace Model;

use \Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'user_id';
    protected $table = 'users'; // can be commented

    public function __construct()
    {
        $capsule = new Capsule();
        $capsule->addConnection([
            "driver"    =>      "Pdo_Mysql",
            "host"      =>      "localhost",
            "database"  =>      "design_patterns",
            "username"  =>      "root",
            "password"  =>      "",
            "charset"   =>      "utf8",
            "collation" =>      "utf8_general_ci",
            "prefix"    =>      ""
        ]);

        $capsule->bootEloquent();
    }
}