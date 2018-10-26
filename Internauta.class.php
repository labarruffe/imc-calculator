<?php 

class Internauta {
    private $nome;
    private $data_nascimento;
    private $sexo;
    private $peso;
    private $altura;
    private $imc;
    private $categoria;

    function __construct($nome, $data_nascimento, $sexo, $peso, $altura) {
        $this->nome=$nome;
        $this->data_nascimento=$data_nascimento;
        $this->sexo=$sexo;
        $this->peso=$peso;
        $this->altura=$altura;
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

    function __toString() {
        return $this->nome. ", indivíduo " .$this->sexo. ", nascido em " .$this->data_nascimento. 
        ".<br> Seu IMC é " .$this->imc. " e você é classificado como " .$this->categoria.
        ".<br> Resultado obtido a partir do peso de " .$this->peso. " kg e altura de " .$this->altura. " metros.";
    }

    function calcularIMC($peso, $altura) {
        $resultado = round(($peso / ($altura * $altura)) * 10000, 2);
        $this->categoria = Utils::categorizarIMC($resultado);
        $this->imc = $resultado;
    }

}

?>