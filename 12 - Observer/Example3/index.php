<?php

class Observee implements SplSubject
{
  protected $observers = [];
  
  protected $nom;
  
  public function attach(SplObserver $observer)
  {
    $this->observers[] = $observer;
  }
  
  public function detach(SplObserver $observer)
  {
    if (is_int($key = array_search($observer, $this->observers, true)))
    {
      unset($this->observers[$key]);
    }
  }
  
  public function notify()
  {
    foreach ($this->observers as $observer)
    {
      $observer->update($this);
    }
  }
  
  public function getNom()
  {
    return $this->nom;
  }
  
  public function setNom($nom)
  {
    $this->nom = $nom;
    $this->notify();
  }
}
    

class Observer1 implements SplObserver
{
  public function update(SplSubject $obj)
  {
    echo 'Observer1 a été notifié ! Nouvelle valeur de l\'attribut <strong>nom</strong> : ' . $obj->getNom() . '<br>';
  }
}

class Observer2 implements SplObserver
{
  public function update(SplSubject $obj)
  {
    echo 'Observer2 a été notifié ! Nouvelle valeur de l\'attribut <strong>nom</strong> : ' .  $obj->getNom() . '<br>';
  }
}
    

$o = new Observee;
$o->attach(new Observer1); 
$o->attach(new Observer2); 
$o->setNom('Darius'); 
$o->setNom('Garen'); 