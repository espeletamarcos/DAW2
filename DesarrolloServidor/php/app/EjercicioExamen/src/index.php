<?php
require './../vendor/autoload.php';

use Dotenv\Dotenv;
use clases\BaseDeDatos;

$dotenv = Dotenv::createImmutable(__DIR__."/..");
$dotenv->load();

session_start();

if(isset($_SESSION["usuario"])){
    header("location: ./jugar.php");
}

$baseDeDatos = BaseDeDatos::getInstance();

$submit = $_POST["submit"]??null;
switch ($submit) {
    case "Iniciar Sesión":
        $usuario = $_POST["usuario"]??null;
        $password = $_POST["password"]??null;

        $usuarioEncontrado = $baseDeDatos->comprobarUsuario($usuario, $password);

        if($usuarioEncontrado != null){
            $_SESSION["usuario"] = $usuario;

            header("location: jugar.php");
        } else {
            $mensaje = "<p class='mensajeInfo'>Usuario o contraseña incorrectos</p>";
        }

        break;
    case "Registrarme":
        $usuario = $_POST["usuario"]??null;
        $password = $_POST["password"]??null;

        $usuarioRegistrado = $baseDeDatos->registrarUsuario($usuario, $password);

        if($usuarioRegistrado === true){
            $_SESSION["usuario"] = $usuario;

            header("location: jugar.php");
        }

        $mensaje = "<p class='mensajeError'>$usuarioRegistrado</p>";

        break;
    default:
        break;
}

if(false){
    header('location: ./jugar.php');
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="form-container">
    <h2>Bienvenido</h2>

    <form action="index.php" method="post">
        <input type="text" name="usuario" value="<?= $usuario??"" ?>" placeholder="Usuario">
        <input type="password" name="password" value="<?= $password??"" ?>" placeholder="Contraseña">

        <div class="buttons">
            <button type="submit" name="submit" value="Iniciar Sesión" class="btn primary">Iniciar Sesión</button>
            <button type="submit" name="submit" value="Registrarme" class="btn secondary">Registrarme</button>
        </div>

        <p class="mensaje"><?= $mensaje??"" ?></p>
    </form>
</div>

</body>
</html>

