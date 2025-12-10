<?php

namespace clases;

class Clave {
    private static Clave $instanciaClave;
    private array $clave;
    function __construct() {}
    function generar(): array{
        $colores = Colores::obtenerColores();

        random_int(0,count($colores)-1);

        $coloresClave = [];

        do{
            $random = random_int(0,count($colores)-1);

            $colorRepetido = false;

            forEach($coloresClave as $clave => $valor){
                if($valor == $colores[$random]){
                    $colorRepetido = true;
                }
            }

            if(!$colorRepetido){
                $coloresClave[] = $colores[$random];
            }
        } while (sizeof($coloresClave) < 4);

        $this->clave = $coloresClave;

        return $coloresClave;
    }
    public function obtener(){
        return $this->clave;
    }

    public static function obtenerInstanciaClave(){
        if(!isset(self::$instanciaClave)){
            self::$instanciaClave = new Clave();
        }

        return self::$instanciaClave;
    }
}

?>
