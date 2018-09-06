<?php

namespace Models;

use Illuminate\Database\Capsule\Manager as Capsule;

class User extends Illuminate\Database\Eloquent\Model
{
    protected $primaryKey = 'user_id';

    public function __construct()
    {
        $capsule = new Capsule();
        $capsule->addConnection([
            "driver"    =>      "mysql",
            "host"      =>      "localhost",
            "database"  =>      "design_patterns",
            "username"  =>      "root",
            "password"  =>      "",
            "charset"   =>      "utf8",
            "collation" =>      "utf8_general_ci",
            "prefix"    =>      ""
        ]);

        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->bootEloquent();
    }
}