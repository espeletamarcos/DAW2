<?php
    function factorial ($num): int {
        return $num == 0 ? 1 : $num * factorial($num - 1);
    }

    $n = factorial(8);
    echo "<h1>El factoria de 8 es $n</h1>";
?>