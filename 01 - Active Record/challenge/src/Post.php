<?php

namespace App;

use App\Database;

class Post extends Database {
    //protected $primaryKey = 'id';
    //protected $table = 'posts';
    //protected $fillable = ['id', 'title', 'body', 'create_date'];
    // protected $fillable = ['id', 'title'];
    protected $fillable = ['id', 'title', 'create_date'];

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $attributes
     * @return static
     */
    public static function create(array $attributes = [])
    {
        $model = new static($attributes);
        var_dump($attributes);
        $model->save();

        return $model;
    }
        // CREATE TABLE `design_patterns`.`posts` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `body` TEXT NOT NULL , `create_date` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM CHARSET=utf8 COLLATE utf8_general_ci;
}
