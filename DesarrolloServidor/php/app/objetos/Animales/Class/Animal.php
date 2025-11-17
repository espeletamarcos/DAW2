<?php

abstract class Animal{
    public function __construct(private int $patas, private int $especie){

    }

    public function __toString(): string
    {
        return "Soy $this->especie especie y tengo $this->patas patas";
    }

    abstract public function hablar();
}

?>