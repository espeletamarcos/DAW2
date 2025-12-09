<?php

namespace blade;
class I
{
    public function __toString()
    {
        return "<h1>Estoy en la clase " . __CLASS__ . "</h1>";
    }

}