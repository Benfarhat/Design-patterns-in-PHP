<?php

// Logger interface


Interface LoggerInterface
{
    public function log(string $str);
}

class Printlogger implements LoggerInterface
{
    public function log(string $str)
    {
        echo $str . "<br>";
    }
}

class NullLogger implements LoggerInterface
{
    public function log(string $str)
    {
        // Do nothing!
    }
}

// Service

class Service
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * __construct function
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * doSomething function
     *
     * @param string $event
     * @return void
     */
    public function doSomething(string $event)
    {
        $this->logger->log($event . ' send from ' . __METHOD__);
    }

}

$service = new Service(new NullLogger());
$service->doSomething('Adding a new table');

$service = new Service(new PrintLogger());
$service->doSomething('Remove the test database');