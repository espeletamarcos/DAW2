<?php
namespace clases;
class Colores{
//    private static array $colores = [
//        ["nombre" => "Azul", "colorFondo" => "blue", "colorLetra" => "white"],
//        ["nombre" => "Rojo", "colorFondo" => "red", "colorLetra" => "white"],
//        ["nombre" => "Naranja", "colorFondo" => "orange", "colorLetra" => "white"],
//        ["nombre" => "Verde", "colorFondo" => "green", "colorLetra" => "white"],
//        ["nombre" => "Violeta", "colorFondo" => "violet", "colorLetra" => "white"],
//        ["nombre" => "Amarillo", "colorFondo" => "yellow", "colorLetra" => "black"],
//        ["nombre" => "Marrón", "colorFondo" => "brown", "colorLetra" => "white"],
//        ["nombre" => "Rosa", "colorFondo" => "pink", "colorLetra" => "black"]
//    ];

    private static array $colores = [
        "Azul",
        "Rojo",
        "Naranja",
        "Verde",
        "Violeta",
        "Amarillo",
        "Marrón",
        "Rosa"
    ];

    public static function obtenerColores(): array{
        return self::$colores;
    }
}
?>