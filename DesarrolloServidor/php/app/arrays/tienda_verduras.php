<?php
    $productos = [
        'lechuga' => ['unidades' => 200,
            'precio' => 0.90],
        'tomates' =>['unidades' => 2000,
            'precio' => 2.15],
        'cebollas' =>['unidades' => 3200,
            'precio' => 0.49],
        'fresas' =>['unidades' => 4800,
            'precio' => 4.50],
        'manzanas' =>['unidades' => 2500,
            'precio' => 2.10],
    ];
    function mostrar_formulario(array $productos) {
        $formulario = "<form method='POST'>";
        foreach ($productos as $nombre => $datos) {
            $formulario .= "<label>" . $nombre . ": Unidades:" . $datos['unidades'] . " Precio: " . $datos['precio'] . "</label><br/>";
            $formulario .= "<input type='text' name=$nombre><br/>";
        }
        $formulario .= "<input type='submit' name='submit' value='Comprar'><br/>";
        $formulario .= "<form/>";
        echo $formulario;
    }

    function mostrar_factura(array &$productos){
        $factura = "";
        $inventario = "";
        $total = 0;
        foreach ($productos as $nombre => &$datos) {
            $cantidad = filter_input(INPUT_POST, $nombre, FILTER_VALIDATE_INT);
            $precio = $datos['precio'];
            $unidades = $datos['unidades'];
            if($cantidad > 0){
                $factura .= $nombre . ": " . $cantidad . " unidades a " . $precio . " euros.<br/>";
                $datos['unidades'] -= $cantidad;
            }
            $inventario .= $nombre . ": Unidades disponibles: " . $unidades . " a " . $precio . " euros.<br/>";
            $total += $cantidad * $precio;
        }
        $factura .= "Total: " . $total . "$" . "<br/>";
        echo $factura;
        echo $inventario;
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_POST['submit'])) {
        mostrar_factura($productos);
    }
    else {
        mostrar_formulario($productos);
    }
?>
</body>
</html>