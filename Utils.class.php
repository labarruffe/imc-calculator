<?php

class Utils {

    static function categorizarIMC($imc) {
        if ($imc < 18.5) {
            return "Abaixo do Peso";
        } else if ($imc >= 18.5 && $imc <= 24.99) {
            return "Peso normal";
        } else if ($imc >= 25.0 && $imc <= 29.99) {
            return "Sobrepeso";
        } else if ($imc >= 30.0 && $imc <= 34.99) {
            return "Obesidade Grau I";
        } else if ($imc >= 35.0 && $imc <= 39.99) {
            return "Obesidade Grau II";
        } else {
            return "Obesidade Grau III";
        } 
    }
}

?>