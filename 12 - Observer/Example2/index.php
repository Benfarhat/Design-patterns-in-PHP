<?php

interface SujetInterface {
    public function attacher(ObservateurInterface $observateur);
    public function detacher(ObservateurInterface $observateur);
    public function notifier();
}
 
class PersonnageInfluent implements SujetInterface {
     
    private $_age;
     
    private $_observateurs;
     
    public function attacher(ObservateurInterface $observateur) {
        $this->_observateurs[] = $observateur;
    }
     
    public function detacher(ObservateurInterface $observateur) {
        $key = array_search($observateur, $this->_observateurs);
 
        if (false !== $key) {           
            unset($this->_observateurs[$key]);
        }
    }
     
    public function notifier() {
        foreach ($this->_observateurs as $observateur) {
            $observateur->mettreAJour();
        }
    }
 
    public function changerAgeAvecNotification($age) {
        $this->_age = $age;
        $this->notifier();
    }

    public function changerAgeSansNotification($age) {
        $this->_age = $age;
    }
     
    public function donnerAge() {
        return $this->_age;
    }
}

// --------------------------------------

interface ObservateurInterface {
    public function mettreAJour();
}
 
class Fan implements ObservateurInterface {
    private $_sujet;
     
    public function mettreAJour() {
        echo "Age a changé ! Il vaut " . $this->_sujet->donnerAge() . '<br>';
    }
     
    public function __construct(SujetInterface $sujet) {
        $this->_sujet = $sujet;
        $this->_sujet->attacher($this);
    }
}

// ----------------------
$SuperStar = new PersonnageInfluent();
$SuperFan = new Fan($SuperStar); // Nous observons superStar
$SuperStar->changerAgeAvecNotification(36); // Affiche: Age a changé ! Il vaut 36
$SuperStar->changerAgeSansNotification(42); // 
$SuperStar->changerAgeAvecNotification(27); // Affiche: Age a changé ! Il vaut 27
$SuperStar->detacher($SuperFan);
$SuperStar->changerAgeAvecNotification(35); // Affiche: Age a changé ! Il vaut 27