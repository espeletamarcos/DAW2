<?php

use clases\database\Database;
use Dotenv\Dotenv;

// Cargo el autoload
require './../vendor/autoload.php';


$dotenv = Dotenv::createImmutable(__DIR__."/../");
$dotenv->load();
$con = Database::getInstance();
$opcion = $_POST["submit"] ?? null;

switch ($opcion) {
    case "Login":
        $nombre = $_POST["name"];
        $password = $_POST["password"];
        $msj = $con ->validar_usuario($nombre, $password);
        if($msj===true) {
            header("location:sitio.php");
            $_SESSION['usuario'] = $nombre;
        }
        break;
    case "Registrar":
        // Registrarme
        // Leer los datos
        $name = $_POST["name"];
        $password = $_POST["password"];
        $msj = $con->registrar($name, $password);
        if($msj) {
            header("location:sitio.php");
            $_SESSION['usuario'] = $name;
        }
        break;
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
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="h-screen flex justify-center items-center">
<fieldset class="bg-yellow-200">
    <legend class="text-blue-800 text-2xl space-y-2">Datos de Acceso</legend>
    <form action="index.php" method="POST">
        <div class="flex flex-row space-x-2 px-2">
            <label for="usuario">Usuario</label>
            <input type="text" class="bg-white rounded-2xl" name="name" id=""/>
        </div>
        <div class="flex flex-row space-x-2 px-2">
            <label for="password">Password</label>
            <input type="text" class="bg-white rounded-2xl" name="password" id=""/>
        </div>
        <div class="flex flex-row p-3 space-x-2 justify-end items-center">
            <input type="submit" class="btn btn-sm btn-primary" value="Login" name="submit">
            <input type="submit" class="btn btn-sm btn-primary" value="Registrar" name="submit">
        </div>
    </form>
</fieldset>
<span class="text-sm text-red-400"><?= $msj ?? "" ?></span>
</body>
</html>
