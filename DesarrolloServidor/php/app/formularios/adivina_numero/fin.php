<?php
    $opcion = $_POST['submit'] ?? null;

    switch ($opcion) {
        case "Jugar":
            $jugada = $_GET["jugada"];
            $intentos = $_GET["intentos"];
            $resultado = $_GET["resultado"];
            $intentosRestantes = $intentos - $jugada;

            if($resultado != "=") {
                $mensaje = "No he adivinado el número en $intentos intentos. \n¿No habrás hecho trampa?";
            } else {
                $mensaje = "He adivinado el número en $intentos intentos. Me han sobrado $intentosRestantes intentos.";
            }
            break;
        default:
            header("location: index.php");
            exit();
    }



?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Práctica 3 - Fin del Juego</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="hero min-h-screen bg-base-200 flex items-center justify-center">
    <div class="max-w-lg bg-white shadow-lg rounded-lg p-8 text-center">
        <fieldset class="border-2 border-gray-300 rounded-lg p-6">
            <legend class="text-2xl font-semibold text-gray-700 mb-4">FIN DEL JUEGO</legend>
            <form action="index.php" method="POST">
                <!-- Mensaje de resultado del juego -->
                <div class='text-xl font-medium text-gray-800 mb-6'><h2><?=$mensaje?></h2></div>
                <input type="submit" value="Volver al inicio" class="btn btn-primary w-full py-2 text-lg font-semibold">
            </form>
        </fieldset>
    </div>
</div>
</body>
</html>
