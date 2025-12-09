<?php

    require "controlador.php";

    use MasterBind\Plantilla;

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Bind - Jugando</title>
    <link rel="stylesheet" href="./css/estilo.css" type="text/css">
    <script>
        function cambia_color(numero) {
            color = document.getElementById("combinacion" + numero).value;
            elemento = document.getElementById("combinacion" + numero);
            elemento.className = color;
        }
    </script>
</head>
<body>
<div class="contenedorJugar">
    <div class="opciones">
        <h2>OPCIONES</h2>

        <fieldset>
            <legend>Menú de Juego</legend>
            <form action="jugar.php" method="POST">
                <!-- Botones de Control -->
                <input type="submit" value="<?= $mostrar_ocultar_clave?>" name="submit" class="btn-control">
                <input type="submit" value="Resetear la Clave" name="submit" class="btn-control reset">
            </form>
        </fieldset>

        <fieldset>
            <legend>Selecciona tu Jugada</legend>
            <form action="jugar.php" method="POST">
                <div class="grupo_select">
                    <?= Plantilla::genera_formulario_juego()?>
                </div>
                <input type="submit" value="Jugar" name="submit" class="btn-jugar">
            </form>
        </fieldset>
    </div>
    <fieldset class="informacion">
        <h2>HISTÓRICO DE JUGADAS</h2>
        <div class="informacion-contenido">
            <?= $informacion ?? "Sin información que mostrar" ?>
            <?php if (!isset($_SESSION['jugadas'])): ?>
                <p>¡Haz tu primera jugada!</p>
            <?php endif; ?>
        </div>
    </fieldset>
</div>
</body>
</html>
