<?php
namespace App\Controller;

class ArticleController
{
    public function index()
    {
        echo "Action Index from ArticleController called!";
    }

    public function test($arguments = null)
    {
        echo "Action test from ArticleController called with arguments: $arguments";
    }

}