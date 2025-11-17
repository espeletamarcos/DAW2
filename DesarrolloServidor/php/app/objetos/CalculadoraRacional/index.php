<?php

    require_once("Racional.php");

    /*
    $r1 = new Racional(4, 6);
    $r2 = new Racional(); // 1/1
    $r3 = new Racional(25); // 25/1
    $r4 = new Racional(7, 9); // 7/9
    $r5 = new Racional("8/7"); // 8/7
    $r6 = new Racional("8"); // 8/1

    echo "Valor de r1 $r1, r2 $r2, r3 $r3, r4 $r4 y r5 $r5 <br />";
    echo "Suma de r1 y r2:" . $r1->sumar($r2) . "<br/>";
    echo "Resta de r1 y r2:" . $r1->restar($r2) . "<br/>";
    echo "Multiplicación de r1 y r2:" . $r1->multiplicar($r2) . "<br/>";
    echo "Dividir de r1 y r2:" . $r1->dividir($r2) . "<br/>";
    */

    if(isset($_POST['submit'])) {
        $r1 = new Racional($_POST['num1']);
        $r2 = new Racional($_POST['num2']);
        $operador = $_POST['operador'];
        $rtdo = match($_POST['operador']){
            '+' => $r1->sumar($r2),
            '-' => $r1->restar($r2),
            '*' => $r1->multiplicar($r2),
            '/' => $r1->dividir($r2)
        };
        $operacion = "$r1 $operador $r2 = $rtdo";
        $simplificado = "$operacion simplificado es " . $rtdo->simplificar();

        // Invocar a metodo estático
        $suma = Racional::sumar_estatico($r1, $r2);
        $operacion_1 = "$r1 + $r2 = $suma";
        $simplificado_1 = "$suma simplificado es " . $suma->simplificar();
    }




?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculadora Racionales</title>
</head>
<body>
    <fieldset style="background: beige;width:70%">
        <legend>Calculadora</legend>
        <form action="index.php" method="POST">
            <label>Número: </label>
            <input type="text" name="num1"/>
            <select name="operador">
                <option name="operador" value="+">+</option>
                <option name="operador" value="-">-</option>
                <option name="operador" value="*">*</option>
                <option name="operador" value="/">/</option>
            </select>
            <label>Número: </label>
            <input type="text" name="num2"/>
            <button type="submit" name="submit">Calcular</button>
            <br>
            <h1><?php echo $operacion ?? ""?></h1>
            <h1><?= $simplificado ?? ""?></h1>
            <h1><?php echo $operacion_1 ?? ""?></h1>
            <h1><?= $simplificado_1 ?? ""?></h1>
        </form>
    </fieldset>
</body>
</html>
