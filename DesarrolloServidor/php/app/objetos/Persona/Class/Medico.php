<?php

class Medico extends Persona{

    use Salario;

    public function __construct(string $nombre, string $f_nac, string $direccion, private string $especialidad, float $salario){
        parent::__construct($nombre, $f_nac, $direccion);
        $this->setSalario($salario);
    }

    public function __toString()
    {
        return parent::__toString() . " soy médico y mi especialidad es: $this->especialidad" ;
    }

    public function getSalario(): float{
        return $this->salario;
    }
}

?>