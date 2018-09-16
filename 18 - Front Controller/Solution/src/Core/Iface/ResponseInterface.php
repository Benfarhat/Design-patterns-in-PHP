<?php

namespace App\Core\Iface;

interface ResponseInterface
{
    public function raiseProcessingError();
    public function raiseRoutingError();
    public function isError();
    public function send(ViewInterface $view);
}