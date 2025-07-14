<?php
class Theme {
    private $person;
    private $nbreIntime;
    private $interNbreIntime;
    private $nbreExpression;
    private $interNbreExpression;
    private $nbreRealisation;
    private $interNbreRealisation;
    private $nbreActif;
    private $interNbreActif;
    private $nbreHereditaire;
    private $interNbreHereditaire;
    private $nbresManquants;
    private $interNbresManquants;
    private $nbresDominants;
    private $interNbresDominants;
    private $cheminVie;
    private $interCheminVie;

    public function __construct($person)
    {
        $this->person = $person;
    }

    public function getPerson(){
        return $this->person;
    }

    public function setPerson($person){
        $this->person = $person;
    }

    public function getMatrice(){
        return [0,0,0,0,0,0,0,0,0];
    }

    public function compute(){
        $this->nbreIntime = 0;
        $this->interNbreIntime = "";
        $this->nbreExpression = 0;
        $this->interNbreExpression = "";
        $this->nbreRealisation = 0;
        $this->interNbreRealisation = "";
        $this->nbreActif = 0;
        $this->interNbreActif = "";
        $this->nbreHereditaire = 0;
        $this->interNbreHereditaire = "";
        $this->nbresManquants = [];
        $this->interNbresManquants = [];
        $this->nbresDominants = [];
        $this->interNbresDominants = [];
        $this->cheminVie = 0;
        $this->interCheminVie = "";
    }

}