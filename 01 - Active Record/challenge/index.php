<?php
require 'vendor/autoload.php';

use App\Post;


$parameters = array('id' => null, 'title' => '0000000', 'body' => 'This is the body1', 'create_date' => new \DateTime());
$parameters2 = array('id' => null, 'title' => 'DDDDDDDD', 'body' => 'This is the body2', 'create_date' => new \DateTime());


// Method 1 
Post::create($parameters);
Post::create(['id' => null, 'title' => 'AAAAA', 'body' => 'This is the body', 'create_date' => '2015-01-27']);
Post::create(['title' => 'BBBBBBB', 'body' => 'This is the body', 'create_date' => '2015-01-27']);

// Method 2 OK !
$post = new Post();
$post->title = 'CCCCCC';
$post->body = 'mon body';
$post->create_date = '2015-01-27';
$post->save();

// Method 3 OK! suit la propriété fillable
$post2 = new Post();
$post2->fill($parameters2);
$post2->save();