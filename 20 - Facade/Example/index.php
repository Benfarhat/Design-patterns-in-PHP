<?php

class Computer
{
    public function getElectricShock()
    {
        echo "Ouch!<br>";
    }

    public function makeSound()
    {
        echo "Beep beep!<br>";
    }

    public function showLoadingScreen()
    {
        echo "Loading...<br>";
    }

    public function bam()
    {
        echo "Ready to be used!<br>";
    }

    public function closeEverything()
    {
        echo "Bup bup bup buzzzz!<br>";
    }

    public function sooth()
    {
        echo "Zzzzz<br>";
    }

    public function pullCurrent()
    {
        echo "Haaah!<br>";
    }
}



class ComputerFacade
{
    protected $computer;

    public function __construct(Computer $computer)
    {
        $this->computer = $computer;
    }

    public function turnOn()
    {
        $this->computer->getElectricShock();
        $this->computer->makeSound();
        $this->computer->showLoadingScreen();
        $this->computer->bam();
    }

    public function turnOff()
    {
        $this->computer->closeEverything();
        $this->computer->pullCurrent();
        $this->computer->sooth();
    }
}



$computer = new ComputerFacade(new Computer());
$computer->turnOn(); // Ouch! Beep beep! Loading.. Ready to be used!
echo '<hr style="border:none;border-bottom:1px solid rgba(0,0,0,.1)">';
$computer->turnOff(); // Bup bup buzzz! Haah! Zzzzz