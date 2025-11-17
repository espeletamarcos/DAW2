<?php
class ExpresionRegular {

    public static function  validar (string $expresion, string $cadena ):bool {
        return preg_match("#$expresion#", $cadena);
    }
}
?>