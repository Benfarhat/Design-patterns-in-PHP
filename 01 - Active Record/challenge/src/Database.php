<?php


namespace App;

use \Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Database\eloquent\Model;
use \Illuminate\Events\Dispatcher;
use \Illuminate\Container\Container;

class Database extends Model{

    protected $fillable = ['*'];
    public $timestamps = false;

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

        // Set the event dispatcher used by Eloquent models... (optional)
        $capsule->setEventDispatcher(new Dispatcher(new Container));

        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

}