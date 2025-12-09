<?php
namespace Class;

class Alumno{
    public function __construct(private $name, private $email){}

    public function __toString() {
        return $this->name . ', ' . $this->email;
    }
}
?>