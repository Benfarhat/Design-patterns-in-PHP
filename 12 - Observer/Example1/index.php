<?php

class Compte 
{
    protected $montant = 0;
    protected $_observer = [];

    public function __construct($montant)
    {
        $this->montant = $montant;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function versement($versement)
    {
        $this->montant += $versement;
        $this->notify();
    }

    public function attach(Client $client)
    {
        $this->_observer[] = $client;
        $client->setCompte($this);

    }

    public function detach(Client $client)
    {
        $key = array_search($client, $this->_observer);

        if($key !== false){
            unset($this->_observer[$key]);
        }
    }

    public function notify()
    {
        foreach($this->_observer as $observer){
            $observer->update();
        }
        echo "<hr>"; // this line is only for a better presentation
    }
}

class Client
{
    private $name = '';
    private $compte = null;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setCompte(Compte $compte)
    {
        $this->compte = $compte;
    }

    public function update()
    {
        echo "{$this->name}: Nous montant du compte > {$this->compte->getMontant()}<br>";
    }
}

$compte1 = new Compte(3000);
$compte2 = new Compte(2500);
$sam = new Client('Sam');
$ben = new Client('Ben');
$adam = new Client('Adam');

$compte1->attach($sam);
$compte1->attach($adam);
$compte2->attach($ben);

$compte1->versement(2000);
$compte1->versement(1000);
$compte2->versement(5000);
$compte1->versement(4500);
$compte1->detach($adam);
$compte1->versement(3000);
$compte2->versement(2500);
$compte1->versement(1500);
$compte2->versement(500);