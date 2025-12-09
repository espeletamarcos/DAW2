<?php

use clases\database\Database;
use clases\view\Plantilla;
use Dotenv\Dotenv;

// Cargo el autoload
require './../vendor/autoload.php';


$dotenv = Dotenv::createImmutable(__DIR__."/../");
$dotenv->load();

session_start();
$usuario = $_SESSION['usuario'] ?? "";
if(is_null($usuario)) {
    header("location:index.php");
    exit;
}

$header_html = Plantilla::getHeader($usuario, "sitio.php");

$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    case "Logout":
        session_destroy();
        header("location:index.php");
        exit;
    case "producto":
        $_SESSION['tabla'] = "producto";
    case "familia":
        $_SESSION['tabla'] = "familia";
    case "stock":
        $_SESSION['tabla'] = "stock";
    case "usuarios":
        $_SESSION['tabla'] = "usuarios";
}

$con = Database::getInstance();
$tablas = $con->getAllTables();

if(isset($_POST['submit'])){
    $tabla = $_POST['submit'];
    $filas = $con->getContentTable($tabla);
    $campos = $con->getFieldName($tabla);
    $tabla_html = Plantilla::getContentTableToHtml($tabla);
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
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
<header><?= $header_html ?></header>
<fieldset class="bg-yellow-200">
    <legend>Tablas</legend>
    <form action="index.php" method="POST">
        <?php
        foreach ($tablas as $tabla) {
            echo "<input type='submit' name='submit' value='$tabla'>";
        }
        ?>
    </form>
</fieldset>
</body>
</html>
