<?php

class Grupo {
    public $internautas;

    function __construct() {
        $this->internautas = new ArrayObject();
    }

    function addInternauta(Internauta $internauta) {
        $this->internautas->append($internauta);
    }

    function get() {
        return $this->internautas;
    }

    function __toString() {
        return "Método __toString da classe Grupo!"; 
    }
}

?>