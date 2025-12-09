<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use clases\database\Database;
use clases\view\View;

$dotenv = Dotenv::createImmutable(__DIR__."/..");
$dotenv->load();

session_start();

$database = Database::getInstance();

$submit = $_POST['submit']??null;
if($submit == "Logout"){
    $_SESSION['usuario'] = null;
    header("Location: index.php");
}

$usuario = $_SESSION["usuario"]??null;
if(is_null($usuario)){
    header("location: index.php");
    exit;
}

$html = "";

$html .= View::getHeader($usuario, $_SERVER["PHP_SELF"]);

$tablas = $database->getAllTables();
$html .= View::botonesTablas($tablas);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?= $html ?>
</body>
</html>