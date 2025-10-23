<?php

$nombre = "Marcos";

// Arrow functions
$mayor_1 = fn($a, $b) => match($a <=> $b){
    1 => "$nombre dice que $a es mayor que $b",
    -1 => "$nombre dice que $a es menor que $b",
    0 => "$nombre dice que $a es igual que $b",
};

$mayor = function (int $a, int $b) use (&$nombre): string{
    $nombre = "Bazdar"; // con & modificamos la variable externa desde una función interna
    return match($a <=> $b){
        1 => "$nombre dice que $a es mayor que $b",
        -1 => "$nombre dice que $a es menor que $b",
        0 => "$nombre dice que $a es igual que $b",
    };
};

$a = rand(1, 10);
$b = rand(1, 10);
$rtdo = $mayor($a, $b);

echo "<h1>El mayor de $a y $b es $rtdo</h1>";

?>
