<?php
    $accesos = $_POST["accesos"] ?? [];


if (isset($_POST['submit'])){
    //Leo datos
    $nombre = $_POST['nombre'];
    //Realizo cálculos
    isset ($accesos[$nombre])? ++$accesos[$nombre]:$accesos[$nombre] = 1;
    //Genero el mensaje
    $msj="";
    foreach ($accesos as $nom => $cliks)
        $msj.="<h3>$nom ha realizado $cliks clicks</h3>";
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
    <legend>Datos de acceso</legend>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        Nombre <input type="text" value="<?=$nombre ??""?>" name="nombre" id="">
        <input type="submit" value="Acceder" name="submit">
        <?php
        foreach ($accesos as $nombre => $cliks)
            echo "<input type='hidden' name='accesos[$nombre]' value = $cliks />"
        ?>
    </form>
</fieldset>
</body>
<?=$msj ?? ""?>
</html>
