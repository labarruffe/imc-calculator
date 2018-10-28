<?php

    if(isset($_POST)) {

        include "Internauta.class.php";

        $nome = $_POST["nome"];
        $data_nascimento = $_POST["data_nascimento"];
        $sexo = $_POST["sexo"];
        $peso = $_POST["peso"];
        $altura = $_POST["altura"];

        $internauta = new Internauta($nome, $data_nascimento, $sexo, $peso, $altura);

        echo $internauta->toString(). "<br><br><br>";

        echo "IMC: " .$internauta->calcularIMC($peso, $altura). "<br>";
    }

?>