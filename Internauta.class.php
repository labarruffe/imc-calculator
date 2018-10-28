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
        return "<b>" .ucfirst($this->nome). "</b> , indivíduo <b>" .$this->sexo. "</b>, nascido em <b>" .$this->data_nascimento. 
        "</b>.<br> Seu IMC é <b>" .$this->imc. "</b> e você é classificado como <b>" .$this->categoria.
        "</b>.<br> Resultado obtido a partir do peso de <b>" .$this->peso. "</b> kg e altura de <b>" .$this->altura. "</b> metros.";
    }

    function calcularIMC($peso, $altura) {
        $resultado = round(($peso / ($altura * $altura)), 2);
        $this->categoria = Utils::categorizarIMC($resultado);
        $this->imc = $resultado;
    }

}

?>