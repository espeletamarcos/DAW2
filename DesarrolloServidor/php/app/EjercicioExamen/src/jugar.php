<?php
require_once "./../vendor/autoload.php";

use clases\Plantilla;
use clases\Clave;
use clases\Jugada;

session_start();

$clave = Clave::obtenerInstanciaClave();

if(!isset($_SESSION["clave"])) {
    $claveGenerada = $clave->generar();

    $_SESSION["clave"] = $claveGenerada;
}

$submit = $_POST["submit"]??null;

$mensaje = "";
$botonMostrarClave = isset($_SESSION["mostrarClave"])?!$_SESSION["mostrarClave"]:true;

switch ($submit) {
    case "Mostrar Clave":
        $_SESSION["mostrarClave"] = true;
        $botonMostrarClave = false;

        break;
    case "Ocultar Clave":
        $_SESSION["mostrarClave"] = false;
        $botonMostrarClave = true;

        break;
    case "Resetear la Clave":
        unset($_SESSION["clave"]);
        unset($_SESSION["jugadas"]);

        $claveGenerada = $clave->generar();

        $_SESSION["clave"] = $claveGenerada;
        break;
    case "Jugar":
        $jugada = new Jugada(sizeof($_SESSION["jugadas"]??[])+1, $_POST["colores"]);

        $jugadaCorrecta = $jugada->comprobarJugada();

        if($jugadaCorrecta){
            if(sizeof($jugada->getPosiciones()[0]) == 4){
                header("location: ./finJuego.php");
            }

            $_SESSION["jugadas"][] = $jugada;

            if(sizeof($_SESSION["jugadas"]) >= 10){
                header("location: ./finJuego.php");
            }

            $mensaje = "<p class='mensajeInfo'>Jugada realizada, vuelve a seleccionar para jugar</p>";
        } else {
            $mensaje = "<p class='mensajeError'>Debes seleccionar 4 colores para jugar</p>";
        }
        break;
    case "Cerrar Sesión":
        session_destroy();
        header("location: ./index.php");
        break;
    default:
        if(!isset($_SESSION["usuario"])){
            header("location: ./index.php");
        }
        break;
}

$htmlMostrarColoresClave = "";
if(!$botonMostrarClave){
    $htmlMostrarColoresClave .= Plantilla::mostrarClave($_SESSION["clave"]);
}
$htmlMostrarCabecera  = Plantilla::mostrarCabecera($_SESSION["usuario"], basename(__FILE__));
$htmlMostrarFormularioAcciones = Plantilla::mostrarFormularioAcciones($botonMostrarClave, basename(__FILE__));
$htmlMostrarFormularioJugar = Plantilla::mostrarFormularioJugar($_POST["colores"]??[], $mensaje,  basename(__FILE__));
$htmlMostrarJugadasAnteriores = Plantilla::mostrarJugadasAnterioresYActual($_SESSION['jugadas']??[]);
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="../script.js"></script>
</head>
<body>
<?= $htmlMostrarCabecera ?>
<div id="masterMind">
    <div class="seccion">
        <h1>Opciones</h1>
        <div class="contenido">
            <?= $htmlMostrarFormularioAcciones ?>
            <?= $htmlMostrarFormularioJugar ?>
        </div>
    </div>

    <div class="seccion">
        <h1>Información</h1>
        <div class="contenido">
            <?= $htmlMostrarColoresClave ?>
            <?= $htmlMostrarJugadasAnteriores ?>
        </div>
    </div>
</div>
</body>
</html>