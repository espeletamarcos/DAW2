<?php
    $r1 = racional(1, 6); // 1/6
    $r2 = racional(20); // 20/1
    $r3 = racional("7/8"); // 7/8
    $r4 = racional(); // 1/1

    function racional(int|string|null $num = 1, int|null $den = 1): string{
        if(is_string($num)){
            $valores = explode("/", $num); // Separa un string en un array de substrings separados por un carácter
            $num = $valores[0];
            $den = $valores[1];
        }
        return "$num/$den";
    }

    echo"<h1>$r1</h1>";
    echo"<h1>$r2</h1>";
    echo"<h1>$r3</h1>";
    echo"<h1>$r4</h1>";
?>