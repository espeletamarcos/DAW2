<?php
    // Para pasar un JSON a un array
    $url = "https://raw.githubusercontent.com/MAlejandroR/json_tv/main/tv.json";
    $contenido = file_get_contents($url);
    $contenidoEnArray = json_decode($contenido, true);

    foreach ($contenidoEnArray as $tipos){
        $msj.= "<h1>". $tipos["name"] . "<br></h1>";
        foreach ($tipos["channels"] as $channel){
            $msj.= "<p>{$channel["name"]}</p>";
            $msj.= "<a href={$channel["web"]}><img src='{$channel["logo"]}'/></a>";
        }
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
    <?= $msj ?>
</body>
</html>
