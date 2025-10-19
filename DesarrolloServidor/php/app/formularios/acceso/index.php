<?php
    $option = $_POST['submit'] ?? "";
    $msj = $_GET['msj'] ?? "";

    if(!is_null($option)){

        // Leo datos de entrada - I
        $nombre =isset($_POST['nombre'])? htmlspecialchars( filter_input(INPUT_POST, 'nombre')):"";
        $password =isset($_POST['nombre'])? htmlspecialchars( filter_input(INPUT_POST, 'password')):"";

        // Proceso datos de entrada - P
        if (($nombre==$password )&& $nombre!==""){
            header ("location: sitio.php?nombre=$nombre");
            exit();
        }else
            $msj ="Datos incorrectos vuelve a intentar";
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
<span style="color:red"><?=$msj??""?></span>
<fieldset style="background: antiquewhite;width:70%;margin:10%">
    <legend>Datos de acceso</legend>
    <form action="index.php" method="POST">
        Nombre <input type="text" name="nombre" id=""><br/>
        Password <input type="text" name="password" id=""><br/>
        <input type="submit" value="Acceder" name="submit">
    </form>
</fieldset>

</body>
</html>
