<?php
$_1=0;
$_2=0;
$_3=0;
$_4=0;
$_5=0;
$_6=0;
for($tirada=0; $tirada<6000; $tirada++){
    $jugada = rand(1,6);
    match($jugada){
        1 => $_1++,
        2 => $_2++,
        3 => $_3++,
        4 => $_4++,
        5 => $_5++,
        6 => $_6++,
    };
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de PHP en HTML</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="box">
        <h2>Texto enunciado breve</h2>
        <ul>
            <li>Items enunciado</li>
            <li>...</li>
        </ul>
    </div>

    <!-- Sección para el resultado de PHP -->
    <div class="box">
        <h2>Resultado</h2>
        <hr>
        <img src="Dado_1.png" width="30px" alt=""><?="$_1"?> veces
        <hr />
        <img src="Dado_2.png" width="30px" alt=""><?="$_2"?> veces
        <hr />
        <img src="Dado_3.png" width="30px" alt=""><?="$_3"?> veces
        <hr />
        <img src="Dado_4.png" width="30px" alt=""><?="$_4"?> veces
        <hr />
        <img src="Dado_5.png" width="30px" alt=""><?="$_5"?> veces
        <hr />
        <img src="Dado_6.png" width="30px" alt=""><?="$_6"?> veces
        <hr />
        <?php
        //Código php
        ?>
    </div>

</div>
</body>
</html>