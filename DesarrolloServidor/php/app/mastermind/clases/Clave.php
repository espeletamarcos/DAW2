<?php

class Clave
{
    public const COLORES = ['Azul', 'Rojo', 'Naranja', 'Verde', 'Violeta', 'Amarillo', 'Marron', 'Rosa'];
    private static  $clave =[];


    public static function obtener_clave()
    {
        if (isset($_SESSION['clave']))
            self::$clave = $_SESSION['clave'];
        else {
            self::genera_clave();
            $_SESSION['clave'] = self::$clave;
        }
        return self::$clave;
    }

    private static function genera_clave()
    {
        self::$clave=[];
        $colores = self::COLORES;
        $posiciones = array_rand($colores, 4);
        foreach ($posiciones as $posicion)
            self::$clave[] = $colores[$posicion];
    }
    public static function get_clave(){
        $clave="";
        foreach (self::$clave as $color)
            $clave.="<span class='$color'>$color</span>";
        return $clave;


    }

}

?>