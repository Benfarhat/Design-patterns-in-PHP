<?php 
namespace Controller;

use Model\User;

class userController
{
    public $user;

    public function __construct()
    {
        $this->user = new User();
    }
    public function view($id)
    {
        echo '<pre>';
        print_r($this->user::find(2));
    }
}