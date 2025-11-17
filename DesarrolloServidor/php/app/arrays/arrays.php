<?php

    // Creando e inicializando un array
    //$notas = [10, 20, 10 => "Ricardo", "love", "PHP", "en breve"];

    // PREGUNTA EXAMEN - Añadir
    //$notas[] = 3; // Añadir en la primera posición específica
    //$notas[11] = 3; // Añadir en una posición específica
    //var_dump($notas);

    // Crear un array de 20 notas (0, 10)
    //$notas2 = [];
    //for($i = 0; $i < 20; $i++){
    //    $notas2[] = rand(0, 10);
    //}
    //var_dump($notas2);

    $inicializa = fn()=> rand(1, 10);

    $notas = array_fill(0, 20, rand(0, 10));
    $notas = array_map($inicializa, $notas); // Rellena el array con notas random
    var_dump($notas);

    $max = max($notas);
    $min = min($notas);
    $avg = array_sum($notas) / count($notas);

    echo "<h1>La nota máxima del array es $max</h1>";
    echo "<h1>La nota mínima del array es $min</h1>";
    echo "<h1>La nota media del array es $avg</h1>";

    // Recorrer un array
    foreach ($notas as $key => &$value) { // El & igual que antes para modificar el valor
        echo $value;
    }
?>