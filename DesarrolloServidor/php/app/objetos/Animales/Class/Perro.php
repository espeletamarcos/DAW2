<?php

class Perro extends Animal{
    public function __construct(int $patas, string $especie){
        parent::__construct(4, "Perro");
    }

    public function hablar()
    {
        return "Guau guau";
    }
}

?>