<?php
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
<fieldset style="background: beige">
    <legend>Datos Personales</legend>
    <form action="datos.php" method="GET">
        Nombre<input type="text" name="nombre" id=""><br />
        Apellido<input type="text" name="apellido" id=""><br />
        Dirección<input type="text" name="direccion" id=""><br />
        <input type="submit" value="Enviar">
    </form>
</fieldset>
</body>
</html>
