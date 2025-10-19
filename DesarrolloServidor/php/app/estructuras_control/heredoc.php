<?php
$producto1 = "Camiseta RZ";
$precio1 = 33.5;
$producto2 = "Pantalón RZ";
$precio2 = 22;
$total = $precio1 + $precio2;

$ancho = 42;

$numero = 1;
$titulo = "Factura Nº $numero";
$tituloCentrado = str_pad($titulo, 10, ' ', STR_PAD_BOTH);


// Total
$totalFormateado = number_format($total, 2);

$factura = <<<FACTURA
========================================
<br>
$tituloCentrado
<br>
======================================== 
<br>
Descripción     Cant.     P.U.     Subtotal
<br> 
----------------------------------------
----------------------------------------
TOTAL:                             $totalFormateado
========================================

FACTURA;
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
    <?php
        echo $factura;
    ?>
</body>
</html>

