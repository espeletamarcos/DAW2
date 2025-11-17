<?php

    class OperacionReal extends Operacion {

        public function __construct(string $cadena)
        {
            parent::__construct($cadena);
        }

        public function operar()
        {
           return match($this->operador){
                '+' =>  $this->op1 + $this->op2,
                '-' =>  $this->op1 - $this->op2,
                '*' =>  $this->op1 * $this->op2,
                '/' =>  $this->op1 / $this->op2
            };
        }
    }

?>