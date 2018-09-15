<?php
namespace App\Controller;

class DefaultController
{
    public function index()
    {
        echo "Action Index from DefaultController called!";
    }
    public function test($arguments = null)
    {
        echo "Action test from DefaultController called with arguments: $arguments";
    }    
    public function notFound($arguments = null)
    {
        echo "404 - Action not found";
    }
}