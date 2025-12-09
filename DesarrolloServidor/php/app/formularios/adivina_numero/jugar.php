<?php
    //RF1 qué ruta me ha traído aquí
    $opcion = $_POST['submit'] ?? null;
    $intentos = $_POST['intentos'] ?? null;

    switch ($opcion) {
        case 'Empezar':
            $min = 0;
            $max = 2 ** $intentos;
            $jugada = 1;
            break;
        case 'Reiniciar':
            $min = 0;
            $max = 2 ** $intentos;
            $jugada = 1;
            $num = ($min + $max) / 2;
            break;
        case 'Jugar':
            $resultado = $_POST['resultado'];
            $jugada = $_POST['jugada'];
            if($jugada >= $intentos) {
                header("location: finJuego.php?jugada=$jugada&intentos=$intentos&resultado=$resultado");
                exit();
            }
            $jugada++;
            switch ($resultado) {
                case '<': {
                    $max = $_POST['num'];
                    $min = $_POST['min'];
                    $num = ($max + $min) / 2;
                    break;
                }
                case '>': {
                    $min = $_POST['num'];
                    $max = $_POST['max'];
                    $num = ($max + $min) / 2;
                    break;
                }
                case '=': {
                    header("location: finJuego.php?jugada=$jugada&intentos=$intentos");
                    exit();
                }
            }
            break;
        case 'Volver':
            break;
        default:
            header("Location: racional.php");
            exit();
    }

    $num = ($min + $max) / 2;
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Práctica 3 - Juego de Adivinar un Número</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="hero min-h-screen bg-base-200 flex items-center justify-center">
    <div class="max-w-lg bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-5xl font-bold text-gray-800 mb-4">Empieza el Juego</h1>
        <p class="text-lg text-gray-600 mb-6">Información y opciones del juego</p>

        <form action="jugar.php" method="POST">
            <div class="bg-slate-300 p-5 rounded-lg mb-4">
                <h4 class="text-2xl font-semibold mb-2">Jugada nº <?=$jugada?></h4>
                <h2 class="text-xl">¿El número es <span class="font-bold"><?=$num?></span>?</h2>
            </div>

            <input type="hidden" value=<?=$intentos?> name="intentos">
            <input type="hidden" value=<?=$min?> name="min">
            <input type="hidden" value=<?=$max?> name="max">
            <input type="hidden" value=<?=$num?> name="num">
            <input type="hidden" value=<?=$jugada?> name="jugada">

            <fieldset id="adivina" class="bg-gray-100 p-4 rounded-lg mb-4">
                <legend class="text-lg font-semibold mb-2">El número a adivinar es</legend>
                <label class="flex items-center mb-2">
                    <input type="radio" checked class="radio radio-primary mr-2" name="resultado"
                           value=">">
                    <span>Mayor</span>
                </label>
                <label class="flex items-center mb-2">
                    <input type="radio"  class="radio radio-primary mr-2" name="resultado"
                           value="<">
                    <span>Menor</span>
                </label>
                <label class="flex items-center mb-2">
                    <input type="radio" class="radio radio-primary mr-2" name="resultado" value="=">
                    <span>Igual</span>
                </label>
            </fieldset>

            <div class="flex space-x-4 mt-6">
                <input type="submit" value="Jugar" name="submit" class="btn btn-primary flex-1">
                <input type="submit" value="Reiniciar" name="submit" class="btn btn-secondary flex-1">
                <input type="submit" value="Volver" name="submit" class="btn btn-accent flex-1">
            </div>
        </form>
    </div>
</div>
</body>
</html>