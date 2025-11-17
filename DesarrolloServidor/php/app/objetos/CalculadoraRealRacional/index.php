<?php

$carga = fn($clase) => require "Classes/$clase.php";
spl_autoload_register($carga);

/*
 * Leer la operación
 *
 * Verificar si es Real, Racional o Error
 *
 * Mirar el tipo de operación
 * Real
 *      $operacionReal = new OperacionReal()
 * Racional
 *      $operacionRacional = new OperacionRacional()
 *
 * Error
 */

    $cadena = $_POST['cadena'] ?? "";
    $tipo_operacion = Operacion::tipo_operacion($cadena);

    switch ($tipo_operacion){
        case Operacion::REAL:
            $operacion = new OperacionReal($cadena);
            $resultado = $operacion->operar();
            break;
        case Operacion::RACIONAL:
            $operacion = new OperacionRacional($cadena);
            $resultado = $operacion->operar();
            break;
        case Operacion::ERROR:
            $resultado = "Operación: <b>$cadena</b> no válida";
    }

    $mapa_tipos_operacion = [
            1 => 'Real',
            2 => 'Racional',
            3 => 'Error'
    ]

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <link rel="stylesheet" type="text/css" href="Style/Style.css" media="screen" />
</head>
<body>
<header>
    <h1>Calculadora Real / Racional</h1>
</header>
<aside>
    <fieldset id="ayuda">
        <legend>Reglas de uso de la calculadora</legend>
        <ul>
            <li>La calculadora se usa escribiendo la operación.</li>
            <li>La  operación será <strong>Operando_1 operación Operando_2</strong>.</li>
            <li>Cada operando puede ser número <i>positivo</i><strong> real  o racional.</strong></li>
            <li>Real p.e. <strong>5</strong> o <strong>5.12 </strong> Racional p.e <strong> 6/3 </strong>o<strong> 7/1</strong></li>
            <li>Los operadores reales permitidos son <strong><span class="destacado"> +  -  *  /</span></strong></li>
            <li>Los operadores racionales permitidos son <strong><span class="destacado"> +  -  *  :</span> </strong></li>
            <li>No se deben de dejar espacios en blanco entre operandos y operación</li>
            <li>Si un operando es real y el otro racional se considerará operación racional</label></li>
            <li>Ejemplos:
                <ul>
                    <li>(Real) <strong>5.1+4</strong></li>
                    <li>(Racional) <strong>5/1:2</strong></li>
                    <li>(Error) <strong>5.2+5/1</strong></li>
                    <li>(Error) <strong>52214+</strong></li>
                </ul>
            </li>
        </ul>
    </fieldset>
</aside>
<main>
    <fieldset>
        <legend>Establece la operación</legend>
        <form action="." method="POST">
            <label for="operacion">Operación</label>
            <input type="text" name="cadena" id="">
            <input type="submit" name="enviar" value="Calcular">
        </form>
    </fieldset>

    <fieldset id=rtdo><legend>Resultado</legend>
        <table border=1><tr><th>Concepto</th> <th>Valores</th></tr><tr><td>Operando 1</td><td><?= $operacion?->getOp1() ?? '' ?></td></tr><tr><td>Operando 2</td><td><?= $operacion?->getOp2() ?? '' ?></td></tr><tr><td>Operación</td><td><?= $operacion?->getOperador() ?? '' ?></td></tr><tr><td>Tipo de operacion</td><td><?= $mapa_tipos_operacion[$tipo_operacion] ?? '' ?></td></tr><tr><td>Resultado</td><td><?=$resultado?></td></tr>
        </table>
    </fieldset>
</main>

</body>
</html>
