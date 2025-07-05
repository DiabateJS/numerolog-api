<?php
class InterNbre {
    public $nbre;
    public $interpretation;

    public function __construct($nbre, $interpretation)
    {
        $this->nbre = $nbre;
        $this->interpretation = $interpretation;
    }

    public function getNbre(){
        return $this->nbre;
    }
    public function setNbre($nbre){
        $this->nbre = $nbre;
    }
    
    public function getInterpretation(){
        return $this->interpretation;
    }
    public function setInterpretation($interpretation){
        $this->interpretation = $interpretation;
    }

}