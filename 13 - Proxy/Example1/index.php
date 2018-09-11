<?php

interface Personne {
    public function parlerDuTemps();
}
 
class PresidentRusse implements Personne {
    public function parlerDuTemps() {
        echo 'Я очень рад быть здесь, погода прекрасна в Париже';
    }
}
 
class Interprete {
    protected $_president;
}
 
class InterpreteRusse extends Interprete implements Personne {
     
    public function parlerDuTemps() {
        if (null == $this->_president) {
            $this->_president = new presidentRusse;
        }
        echo 'Au sujet du temps, le président russe me dit : "';
        $this->_president->parlerDuTemps();
        echo '"', PHP_EOL;
    }
}
 
class PresidentFrancais {
    private $_interprete;
     
    public function attacherInterprete(Interprete $interprete) {
        $this->_interprete = $interprete;
    }
     
    public function discuterSurPerron() {
        if (!$this->_interprete) {
            throw new RuntimeException('Où est l\'interprète ?');
        }
         
        echo "Président, il fait bon vivre à Paris, hein ?", PHP_EOL;
        $this->_interprete->parlerDuTemps();
    }
}
 
$presidentHote = new PresidentFrancais;
$presidentHote->attacherInterprete(new InterpreteRusse);
 
try {
    $presidentHote->discuterSurPerron();
} catch (RuntimeException $exception)
{
    echo "Allô, ici le chef du protocole !", PHP_EOL;
    echo "Le président vient de me dire '" . 
              $exception->getMessage(), "'", PHP_EOL;
    echo "Vite, allez chercher un interprète !", PHP_EOL;
}