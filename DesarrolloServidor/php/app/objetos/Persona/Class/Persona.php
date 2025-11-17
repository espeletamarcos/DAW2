<?php

    class Persona {
        private static $numero_personas = 0;

        public function __construct(protected string $nombre, protected string $f_nac, protected string $direccion) {
            self::$numero_personas++;
        }

        public function __toString() {
            return "Hola soy $this->nombre, nací el $this->f_nac y vivo en $this->direccion";
        }

        public function __destruct()
        {
            self::$numero_personas--;
        }

        public function calcular_edad() {

        }

        //Saber cuántas personas tengo actualmente creadas
        public static function get_numero_personas(){
            return self::$numero_personas;
        }
    }



?>