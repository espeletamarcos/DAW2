<?php
//  RF1 - CONTROL DE ERRORES
//  RF1.1 - No permitir un nombre vacío
//  RF1.2 - No permitir un teléfono no numérico
//  RF1.3 - No se permite dos contactos con el mismo teléfono
//  RF1.4 - No permitir teléfono vacío de un contacto que no existe
//  RF1.5 - Mantengo entre diferentes solicitudes los datos de la agenda

//  RF2 - FUNCIONES
//  RF2.1 - Mostrar el listado de contactos y si no hay mostrar mensaje que no hay contactos
//  RF2.2 - Si nombre y teléfono
//  RF2.2.1 - Si nombre no existe en contactos, añado
//  RF2.2.2 - Si nombre existe en contactos, modifico
//  RF2.3 - Si nombre y no teléfono, elimino
//  RF2.4 - Si click en borrar contactos elimino todos

//  RF3 - SALIDAS GENERADAS
//  RF3.1 - Un listado de los contactos o no hay contactos
//  RF3.2 - Mostrar el error
//  RF3.3 - Deshabilitar el botón borrar contactos si no hay contactos
//  RF3.4 - Informo el número de contactos
//  RF3.5 - Mostrar los contactos ordenados por orden alfabético

$agenda = $_POST['agenda'] ?? [];

function validar_error(array $agenda,string $nombre,string $telefono): null|string {
    $error = null;

    $error .= $nombre=="" ? "El nombre no puede estar vacío <br />": $error;
    $error .= !is_numeric($telefono) ? "El teléfono $telefono no es numérico <br />": $error;
    $error .= (!isset($agenda[$nombre]) && ($telefono == "")) ? "No se puede eliminar un contacto que no existe" : $error;
    $error .= (in_array($telefono, $agenda)) ? "El teléfono ya existe" : $error;

    return $error;
}

function get_content_agenda($agenda){

}

function realiza_accion(&$agenda, $nombre, $telefono):string {
    if($telefono == ""){
        unset($agenda[$nombre]);
        $msj = "Se ha eliminado el contacto $nombre";
    } else {
        $accion = isset($agenda[$nombre]) ? "modificar" : "agregar";
        $agenda[$nombre] = $telefono;
        $msj = "Se ha ".$accion." el contacto $nombre";
    }
    return $msj;
}

function get_agenda_inputs_hidden($agenda) {

}

if(isset($_POST['submit'])) {
    // Leer los datos
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);

    $error = validar_error($agenda, $nombre, $telefono);
    $opcion = $_POST['submit'] ?? null;

    if($error == null) {
        switch ($opcion){
            case "add":
                $msj = realiza_accion($agenda, $nombre, $telefono);
                break;
            case "del":
                $agenda = [];
                $msj = "La agenda ha sido eliminada";
                break;
            default:
        }
    }
}

    // Generar los informes
    $tabla_agenda = get_content_agenda($agenda);
    $disabled = sizeof($agenda) == 0 ?"disabled":"";
    $contactos = sizeof($agenda);
    $plural = sizeof($agenda) > 1 ? "s" : "";
    $inputs_hidden = get_agenda_inputs_hidden($agenda);

?>



<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <title> Agenda de contactos</title>
</head>
<header>
    Agenda de contactos: con <?= $contactos ?> contacto<?=$plural?></header>
<body>

<div class="listado_contactos">
    <div class="center">LISTADO DE CONTACTOS</div>
    <hr>
        <div class="center">
            <?= $tabla_agenda ?>
        </div>
    </div>
<!-- Creamos el formulario para insertar los nuevos datos-->
<fieldset>
    <legend>Nuevo Contacto</legend>
    <form action=agenda.php method="post">
        <br>
        <label for="nombre">Nombre</label><input type="text" name="nombre" size="15"/><br/>
        <label for="telefono">Teléfono </label><input type="text" name="telefono" size="15"/><br/>
        <input type="submit" value="Añadir contacto" name="enviar">
        <input type="submit" value="Eliminar contactos" name="enviar"  >

        <!-- Metemos los contactos existentes  ocultos en el formulario-->
        <?= $inputs_hidden ?>
    </form>
</fieldset>
<div style="clear:both ">
    <hr/>
    <?=$error ?? "" ?>
</div>
</body>
</html>
