<?php
$numero = $_POST['numero'];
var_dump($numero);
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
<form action="1.php" method="post">

    <input type="text" name="numero[]" value="1" id=""><br />
    <input type="text" name="numero[]" value="2" id=""><br />
    <input type="text" name="numero[]" value="3" id=""><br />
    <input type="text" name="numero[]" value="4" id=""><br />
    <input type="text" name="numero[]" value="5" id=""><br />
    <input type="text" name="numero[]" value="6" id=""><br />
    <input type="submit" value="Enviar">

</form>

</body>
</html>