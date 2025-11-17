<?php

    abstract class Operacion {
        protected $op1;
        protected $op2;
        protected $operador;

        const REAL = 1;
        const RACIONAL = 2;
        const ERROR = -1;

        public function getOp1(): string
        {
            return $this->op1;
        }

        public function getOp2(): string
        {
            return $this->op2;
        }

        public function getOperador(): string
        {
            return $this->operador;
        }


        public function __construct(string $cadena)
        {
            $pos_operador = $this->posicion_operador($cadena);
            $this->op1 = substr($cadena,0, $pos_operador);
            $this->op2 = substr($cadena,$pos_operador + 1);
            $this->operador = $cadena[$pos_operador];
        }

        private function posicion_operador(string $cadena){
            $operadores = "+-*:/";
            for($i = 0; $i < strlen($operadores); $i++){
                if($pos = strpos($cadena, $operadores[$i])){
                    return $pos;
                }
            }
        }

        public static function tipo_operacion(string $cadena){
            $real = "[0-9]+(\.[0-9]+)?"; // Expresion regular para números reales
            $operador_real = "[\+\-\*\/]"; // Expresion regular para operadores válidos
            $entero = "[0-9]+";
            $racional = "[0-9]*/$entero";

            $operacion_real = "^$real$operador_real$real$";
            if(preg_match("#$operacion_real#", $cadena)){
                return self::REAL;
            }

            $operador_racional = "[\+\-\*\:]";
            $operacion_racional = "^$racional$operador_racional$racional$";
            if(preg_match("#$operacion_racional#", $cadena)){
                return self::RACIONAL;
            }
            $operacion_racional = "^$entero$operador_racional$racional$";
            if(preg_match("#$operacion_racional#", $cadena)){
                return self::RACIONAL;
            }
            $operacion_racional = "^$racional$operador_racional$entero$";
            if(preg_match("#$operacion_racional#", $cadena)){
                return self::RACIONAL;
            }

            return self::ERROR;



            // Operaciones Reales Válidas
            /*
             * entero operador_real entero
             * real operador_real real
             * entero operador_real real
             * real operador_real entero
             */
            // Operaciones Racionales Válidas

        }

        public abstract function operar();
    }

?>