<?php
require_once "./../vendor/autoload.php";

use clases\Plantilla;

session_start();

$submit = $_POST["submit"]??null;

switch($submit){
    case "Volver a jugar":
        unset($_SESSION["mostrarClave"]);
        unset($_SESSION["clave"]);
        unset($_SESSION["jugadas"]);

        header("location: ./jugar.php");
        break;
    default:
        if(!isset($_SESSION["usuario"])){
            header("location: ./index.php");
        }
        break;
}

$htmlMostrarResultado = Plantilla::mostrarResultadoPartida($_SESSION["clave"], $_SESSION["jugadas"]);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?= $htmlMostrarResultado ?>
</body>
</html>
