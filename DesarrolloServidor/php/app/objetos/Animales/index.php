<?php
$carga = fn($clase)=>require "$clase.php";
spl_autoload_register($carga);

$p1 = new Perro();
$g1 = new Gato();


?>