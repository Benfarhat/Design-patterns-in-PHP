<?php
namespace App\Controller;

class DefaultController extends AppController
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
        $this->render('Error/notfound');
    }
}