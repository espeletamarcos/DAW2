<?php
$carga = fn($clase) => require "$clase.php";
spl_autoload_register($carga);


if (isset($_POST['submit'])) {
    //  IPO
    //Leo datos
    $cadena = filter_input(INPUT_POST, "cadena");
    $expresion = filter_input(INPUT_POST, "expresion");
    //Proceso
    $afirmacion = ExpresionRegular::validar($expresion, $cadena) ? "Si" : "No";

    //Salida
    $msj = "La cadena $cadena $afirmacion cumple $expresion";


}


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
<fieldset style="background: antiquewhite;width:70%;margin:10%">
    <legend>Expresión regular</legend>
    <form action="index.php" method="POST">
        <table>
            <tr>
                <td>Expresion</td>
                <td><input type="text" name="expresion" value="<?= $expresion ?? "" ?>" id=""></td>
            </tr>
            <tr>
                <td> Cadena</td>
                <td><input type="text" name="cadena" value="<?= $cadena ?? "" ?>" id=""></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Validar" name="submit"></td>
            </tr>
        </table>

    </form>
</fieldset>
<h1><?= $msj ?? "" ?></h1>

</body>
</html>