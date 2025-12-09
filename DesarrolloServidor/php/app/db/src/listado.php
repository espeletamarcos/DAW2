<?php
    require __DIR__ . '/../vendor/autoload.php';

    use Dotenv\Dotenv;
    use clases\database\Database;
    use clases\view\View;

    $dotenv = Dotenv::createImmutable(__DIR__."/..");
    $dotenv->load();

    $database = Database::getInstance();

    $html = "";

    if (isset($_POST['tabla'])){
        $tablaAMostrar = $_POST['tabla'];

        $columnasFamilia = $database->getTableColumns($tablaAMostrar);
        $filasFamilia = $database->getTableRows($tablaAMostrar);
        $html .= View::convertirATablaHTML($tablaAMostrar, $columnasFamilia, $filasFamilia);
    }
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
