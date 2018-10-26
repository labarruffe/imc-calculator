<?php

class Grupo {
    private $internautas;
    private $mediaIMC;

    function __construct() {
        $this->internautas = new ArrayObject();
    }

    // "método mágico" para criação de set genérico
	// ou seja, cria um set que pode ser usado por todos os atributos
	function __set($prop, $val) {
		$this->$prop = $val;
	}

	// "método mágico" para criação de get genérico
	// ou seja, cria um get que pode ser usado por todos os atributos
	function __get($prop) {
		return $this->$prop;
    }
    
    function addInternauta(Internauta $internauta) {
        $this->internautas->append($internauta);
    }

    function __toString() {
        return "O IMC médio dos internautas é " .$this->mediaIMC; 
    }

    function calcularMedia() {
        $sum = 0;
        foreach($this->internautas as $internauta) {
            $sum += $internauta->imc;
        }
        $this->mediaIMC = round($sum / $this->internautas->count(), 2);
    }
}

?>