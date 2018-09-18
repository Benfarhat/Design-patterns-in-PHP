<?php

// Visitee
interface Animal
{
    public function accept(AnimalOperation $operation);
}

// Visitor
interface AnimalOperation
{
    public function visit(Animal $animal);
    
}




Abstract class Acceptation
{
    public function accept(AnimalOperation $operation)
    {
        $operation->visit($this);
    }
}


class Monkey extends Acceptation implements Animal
{
    public function sound()
    {
        echo 'Ooh oo aa aa!';
    }
}

class Lion extends Acceptation implements Animal
{
    public function sound()
    {
        echo 'Roaaar!';
    }
}

class Dolphin extends Acceptation implements Animal
{
    public function sound()
    {
        echo 'Tuut tuttu tuutt!';
    }
}


class Speak implements AnimalOperation
{
    public function visit(Animal $animal)
    {
        $animal->sound();
    }

}



$monkey = new Monkey();
$lion = new Lion();
$dolphin = new Dolphin();

$speak = new Speak();

$monkey->accept($speak);    // Ooh oo aa aa!
echo "<br>";

$lion->accept($speak);      // Roaaar!
echo "<br>";

$dolphin->accept($speak);   // Tuut tutt tuutt!
echo "<br>";