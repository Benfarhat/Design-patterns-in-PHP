<?php
namespace App\Controller;

class ArticleController extends AppController
{
    public function index()
    {
        $this->render('Article/index', [
            'name' => 'Elyes',
            'surname' => 'Benfarhat'
        ]);
    }

    public function test($arguments = null)
    {
        echo "Action test from ArticleController called with arguments: $arguments";
    }

}