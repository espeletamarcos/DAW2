<?php

require_once __DIR__.'/../vendor/autoload.php';
use Class\Alumno;

$seeder = Faker\Factory::create("es_ES");
$unidades = 5;
for($n = 0; $n < $unidades; $n++){
    $name = $seeder->name();
    $email = $seeder->email();
    $alumnos[] = new Alumno($name, $email);
}

for($n = 0; $n < $unidades; $n++){
    echo "<h3>$alumnos[$n]</h3>";
}

usort($alumnos, fn($a, $b) => ($a->name <=>  $b->name));

for($n = 0; $n < $unidades; $n++){
    echo "<h3>$alumnos[$n]</h3>";
}

$a1 = new Alumno("Pedro", "a1@gmail.com");

echo "<h3>$a1</h3>";

?>