<?php
//IPO
//Leio los datos de entrad
$operando_1 = $_POST['operando_1'];
$operando_2 = $_POST['operando_2'];
$operador = $_POST["operador"];

$operacion = "$operando_1 $operador $operando_2 ";
//Los valido
$msj = "";
if (!is_numeric($operando_1) || !is_numeric($operando_2))
    $msj = "la operacion  <span style='color_green'>$operacion</span> no es correcta";
if ($operador == ":" && $operando_2 = 0)
    $msj = "División por 0  <span style='color_green'>$operacion</span> no está permitido";

//En función del operador realizo los cálculos
if ($msj === "") {
    $resultado = match ($operador) {
        '*' => $operando_1 * $operando_2,
        '+' => $operando_1 + $operando_2,
        '-' => $operando_1 - $operando_2,
        '/' => $operando_1 / $operando_2,
    };
    $msj = "$operacion = $resultado";
}

//Genero la salida
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1><?= "$msj" ?></h1>
<a href="index.php">Volver</a>
</body>
</html>






