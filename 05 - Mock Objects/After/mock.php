<?php

include_once 'email.php';

class MockEmail extends Email 
{
    public function send()
    {
        echo __CLASS__ . " Email sent!";
        return true;
    }
}