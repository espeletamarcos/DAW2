<?php
    $carga = fn($clase) => require("Class/$clase.php");
    spl_autoload_register($carga);

    $a = new A();
    $b = new B();

    echo "<h1>$a</h1>";
    echo "<h1>$b</h1>";

    $p1 = new Persona("Pedro", "12/10/1998", "Romareda");
    echo "<h1>Creada la persona $p1 y actualmente tengo " . Persona::get_numero_personas() . " personas creadas </h1>";
    $p2 = new Persona("Pedro", "12/10/1998", "Romareda");
    echo "<h1>Creada la persona $p2 y actualmente tengo " . Persona::get_numero_personas() . " personas creadas </h1>";
    $p3 = new Persona("Pedro", "12/10/1998", "Romareda");
    echo "<h1>Creada la persona $p3 y actualmente tengo " . Persona::get_numero_personas() . " personas creadas </h1>";

    unset($p2);
    echo "<h1>Eliminada una persona, tengo " . Persona::get_numero_personas() . " personas </h1>";

    $m1 = new Medico("Pedro", "12/10/1998", "Romareda", "Cardiología", 2900);
    echo "<h1>Creada la persona $m1 y actualmente tengo " . Persona::get_numero_personas() . " personas creadas </h1>";
    echo "Salario: " . $m1->getSalario();

    $b1 = new Bailarin("Pedro", "12/10/1998", "Romareda", "Bachata");
    echo "<h1>Creada la persona $b1 y actualmente tengo " . Persona::get_numero_personas() . " personas creadas </h1>";
?>