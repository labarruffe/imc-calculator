<?php 
class Internauta {
    public $nome;
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
        // $this->sexo=[
        //     'Feminino',
        //     'Masculino',
        //     'Sem gênero'];
        $this->peso=$peso;
        $this->altura=$altura;
    }
    
    // function __construct($nome) {
    //     $this->nome=$nome;
    // }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function getNome() {
        return $this->$nome;
    }
    
    function getPeso() {
        return $this->$peso;
    }

    function getAltura() {
        return $this->$altura;
    }

    function __toString() {
        return $this->nome. ", indivíduo " .$this->sexo. ", nascido em " .$this->data_nascimento. 
        ".<br> Seu IMC é " .$this->imc. " e você é classificado como " .$this->categoria.
        ".<br> Resultado obtido a partir do peso de " .$this->peso. " e altura de " .$this->altura.
        ".<br> A média de imc dos internautas é IMC(NECESSÁRIO IMPLEMENTAR) corresponde à CATEGORIA(NECESSÁRIO IMPLEMENTAR)"; 
    }

    function calcularIMC($peso, $altura) {
        $resultado = round(($peso / ($altura * $altura)) * 10000, 2);
        // echo $this->categorizarIMC($resultado);
        $this->categorizarIMC($resultado);
        $this->imc = $resultado;
        // return $this->imc;
    }

    private function categorizarIMC($imc) {
        if ($imc < 18.5) {
            $this->categoria = "Abaixo do Peso";
            // return "Abaixo do Peso";
        } else if ($imc >= 18.5 && $imc <= 24.99) {
            $this->categoria = "Peso normal";
            // return "Peso normal";
        } else if ($imc >= 25.0 && $imc <= 29.99) {
            $this->categoria = "Sobrepeso";
            // return "Sobrepeso";
        } else if ($imc >= 30.0 && $imc <= 34.99) {
            $this->categoria = "Obesidade Grau I";
            // return "Obesidade Grau I";
        } else if ($imc >= 35.0 && $imc <= 39.99) {
            $this->categoria = "Obesidade Grau II";
            // return "Obesidade Grau II";
        } else {
            $this->categoria = "Obesidade Grau III";
            // return "Obesidade Grau III";
        } 
    }
}

?>