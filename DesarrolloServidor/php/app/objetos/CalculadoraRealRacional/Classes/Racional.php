<?php

    class Racional{
        // Atributos
        private int $num;
        private int $den;

        // Métodos
        public function __construct(string | int $num = 1, int $den = 1)
        {
            if(is_string($num)){
                $parametros = explode("/", $num);
                $num = $parametros[0];
                $den = $parametros[1] ?? 1;
            }
            $this->num = $num;
            $this->den = $den;
        }

        public function __toString(): string
        {
            return "$this->num /  $this->den";
        }

        public function sumar(Racional $n2): Racional {
            $numRtdo = ($this->num * $n2->den) + ($this->den * $n2->num);
            $resRtdo = $this->den * $n2->den;
            return new Racional($numRtdo, $resRtdo);
        }

        public function restar(Racional $n2): Racional {
            $numRtdo = ($this->num * $n2->den) - ($this->den * $n2->num);
            $resRtdo = $this->den * $n2->den;
            return new Racional($numRtdo, $resRtdo);
        }

        public function multiplicar(Racional $n2): Racional {
            $numRtdo = $this->num * $n2->num;
            $resRtdo = $this->den * $n2->den;
            return new Racional($numRtdo, $resRtdo);
        }

        public function dividir(Racional $n2): Racional {
            $numRtdo = $this->num * $n2->den;
            $resRtdo = $this->den * $n2->num;
            return new Racional($numRtdo, $resRtdo);
        }

        public function simplificar(): Racional {
            $mcd = $this->mcd($this->num, $this->den);
            return new Racional($this->num / $mcd, $this->den / $mcd);
        }

        private function mcd(int $num, int $den): int {
            return $den == 0 ? $num : $this->mcd($den, $num%$den);
        }

        // En un metodo estático no puedes referenciar a un metodo no estático a no ser que pases una referencia del objeto
        public static function sumar_estatico(Racional $op1, Racional $op2): Racional {
            $numRtdo = ($op1->num * $op2->den) + ($op1->den * $op2->num);
            $resRtdo = $op1->den * $op2->den;
            return new Racional($numRtdo, $resRtdo);
        }
    }

?>