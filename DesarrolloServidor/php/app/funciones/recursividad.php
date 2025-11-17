<?php
    /*function factorial ($num): int {
       return $num == 0 ? 1 : $num * factorial($num - 1);
    }

    $n = factorial(8);
    echo "<h1>El factorial de 8 es $n</h1>";*/

    // Dados 2 números quiero obtener el mcd de ellos usando el metodo de Euclides
    // Este metodo algorítmicamente indica que hay que realizar sucesivas restas de un número y otro
    // El resultado se vuelve a restar con el menor de los números
    // Al final termino con un uno o un cero
    // Si es cero el último número es el mcd

print (euclidesMCD(27, 18));

    // Función mas tradicional
    function euclidesMCD($num1, $num2): int {
        while($num2 != 0) {
            $resto = $num1 % $num2;
            $num1 = $num2;
            $num2 = $resto;
        }
        return $num1;
    }

    // Función mas tradicional en variable
    $euclidesMCD2 = function ($num1, $num2): int {
        $resto = $num1 % $num2;
        while($resto != 0) {
            $resto = $num1 % $num2;
            $num1 = $num2;
            $num2 = $resto;
        }
        return $resto;
    };

    // Función recursiva
    function euclidesMCD3($num1, $num2) {
        $resto = $num1 % $num2;
        if($resto == 0 || $resto == 1) {
            return $num2;
        }
        return euclidesMCD3($num2, $resto);
    }

    // Función recursiva en variable
    $mcd_recursivo2 = function ($num1, $num2) use(&$mcd_recursivo2){
        return $num2 == 0 ? $num1 : $mcd_recursivo2($num2, $num1 % $num2);
    }
?>