<?php

class Bailarin extends Persona{

    public function __construct(string $nombre, string $f_nac, string $direccion, private string $estilo){
        parent::__construct($nombre, $f_nac, $direccion);
    }

    public function __toString()
    {
        return parent::__toString() . " soy bailarín y mi especialidad es: $this->estilo" ;
    }
}

?>