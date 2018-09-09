<?php

namespace Responders;

class DefaultResponse
{
    public function run()
    {
        include 'templates/default.php';
    }
}