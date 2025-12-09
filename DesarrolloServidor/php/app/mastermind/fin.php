<?php
$carga = fn($clase) => require("./clases/$clase.php");
spl_autoload_register($carga);

session_start();

$mostrar_ocultar_clave = "Mostrar Clave";

$clave = Clave::obtener_clave();

$jugadas = $_SESSION['jugadas'];
$win = $_GET['win'] ??"";
$intento = sizeof ($_SESSION['jugadas']);
if ($win)
    $msj="<h1> FELICIDADES HAS ACERTADO EN $intento jugada";
else
    $msj="<h1> HAS AGOTADO TUS JUGADAS!!!!!";
$html_clave= Clave::get_clave();
$informacion = "<h1> Clave actual  es $html_clave";
$informacion .= Jugada::obtener_historico_jugadas();

?>
<!--
RF1 Mostramos la pantalla según estilo (Opciones, Información, Jugada)
RF1.1 Mostrar opciones en Opciones
RF1.2 Mostrar menú de jugada
RF1.3 Mostrar información jugada
RF1 Generamos una clave y la guardamos en sesión  (usa un var_dump para verificar su funcionamiento )
RF2 Botón de reiniciar la clave (guardándola en sesión) (usa un var_dump para verificar su funcionamiento)
RF3 Leer jugada
RF4 evaluar jugada y obtener resultado (posiciones y colores=
RF6 Mostrar / ocular clave
RF7 Mostrar Jugadas
RF7.1 Mostrar Jugada actual
RF7.2 Mostrar Jugadas anteriores ordenadas


-->

<br />



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./css/estilo.css" type="text/css">
</head>
<body>
<div class="contenedorJugar">
    <div class="opciones">
        <h2>OPCIONES</h2>
        <fieldset>
            <legend>Acciones posibles</legend>
            <form action="jugar.php" method="POST">
                <input type="submit" value="<?= $mostrar_ocultar_clave?>" name="submit">
                <input type="submit" value="Resetear la Clave" name="submit">
            </form>
        </fieldset>
        <fieldset>
            <legend>Menú jugar</legend>
            <form action="jugar.php" method="POST">
                <div class="grupo_select">
                    <h3> Selecciona 4 colores para jugar</h3>
                    <?= Plantilla::genera_formulario_juego()?>


                </div>
                <input type="submit" value="Jugar" name="submit">
            </form>
        </fieldset>


    </div>

    <fieldset class="informacion">
        <h2>INFORMACIÓN</h2>
        <fieldset>
            <legend>Sección de información</legend>
            <h3>Sin datos que mostrar</h3>
            <?= $informacion ?? ""?>
        </fieldset>
    </fieldset>
</div>
</body>

</body>
</html>
