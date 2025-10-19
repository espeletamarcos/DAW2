<?php
    $nombre = htmlspecialchars($_POST["nombre"]);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $edad = filter_input(INPUT_POST, "edad", FILTER_SANITIZE_NUMBER_INT);
    echo "<h1>$edad</h1>";
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
    <fieldset style="background: beige;width:70%">
        <legend>Ficha de Datos</legend>
        <h1>Nombre <?="$nombre"?></h1>
        <h1>Password <?="$password"?></h1>
    </fieldset>
    <a href="datos_personales.html">Volver</a>
</body>
</html>
