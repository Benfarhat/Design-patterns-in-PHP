<?php

Interface MediatorInterface
{
    public function sendResponse(string $content);

    public function makeRequest();

    public function queryDb();
}

class Mediator implements MediatorInterface
{
    private $server;
    private $database;
    private $client;

    public function __construct(Database $database, Client $client, Server $server)
    {
        $this->database = $database;
        $this->server = $server;
        $this->client = $client;

        $this->database->setMediator($this);
        $this->server->setMediator($this);
        $this->client->setMediator($this);
    }

    public function makeRequest()
    {
        $this->server->process();
    }

    public function queryDb() : string 
    {
        return $this->database->getData();
    }

    public function sendResponse(string $content)
    {
        $this->client->output($content);
    }
}

Abstract class colleague
{
    protected $mediator;
    
    public function setMediator(MediatorInterface $mediator)
    {
        $this->mediator = $mediator;
    }
}

Class Database extends colleague
{
    public function getData(): string
    {
        return 'World';
    }
}

Class Server extends colleague
{
    public function process()
    {
        $data = $this->mediator->queryDb();
        $this->mediator->sendResponse(sprintf("Hello %s", $data));
    }
}

Class Client extends colleague
{
    public function request()
    {
        $this->mediator->makeRequest();
    }

    public function output(string $content)
    {
        echo $content;
    }
}

$client = new Client();
new Mediator(new Database(), $client, new Server());

$client->request();