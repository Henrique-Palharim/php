<?php 

    function calcularIMC($peso, $altura)
    {
        $imc = $peso / ($altura * $altura);
        return $imc;
    }

    function classificarIMC($peso, $altura)
    {
        $imc = calcularIMC($peso, $altura);

        if ($imc < 16)
        {
            return "Magreza grau III";
        }
        else if ($imc >= 16 && $imc < 16.9) {
            return "Magreza grau II";
        }
        else if ($imc >= 17 && $imc < 18.4) {
            return "Magreza grau I";
        }
        else if ($imc >= 18.5 && $imc < 24.9) {
            return " Peso normal";
        }
        else if ($imc >= 25 && $imc < 29.9) {
            return "Pré-obesidade";
        }
        else if ($imc >= 30 && $imc < 34.9) {
            return "Obesidade moderada (grau I)";
        }
        else if ($imc >= 35 && $imc < 39.9) {
            return "Obesidade severa (grau II)";
        }
        else if ($imc >= 40) {
            return "Obesidade muito severa (grau III)";
        }
    }

?>