<?php

class Jugada
{
    private $colores;
    private $posiciones_acertadas;
    private $colores_acertadas;


    public function __construct(array $jugada)
    {
        $this->posiciones_acertadas = 0;
        $this->colores_acertadas = 0;
        $this->colores = $jugada;
        $clave = Clave::obtener_clave();
        $this->evalua_jugada($clave);
    }

    public function get_posiciones_acertadas()
    {
        return $this->posiciones_acertadas;
    }

    private function evalua_jugada(array $clave)
    {
        $jugada = array_unique($this->colores);//!Quitamos los duplicados de la jugada
        foreach ($jugada as $color) {
            if (in_array($color, $clave))
                $this->colores_acertadas++;
            foreach ($this->colores as $pos => $color)
                if ($color == $clave[$pos])
                    $this->posiciones_acertadas++;

        }
    }


//OPCION 2
//        foreach ($clave as $color)
//            if (in_array($color, $this->colores))
//                $this->colores_acertadas++;
//        foreach ($clave as $pos=> $color)
//            if ($color== $this->colores [$pos])
//                $this->posiciones_acertadas++;

// OPCION 1
//        $colores_acertados = array_intersect($clave, $this->colores);
//        $this->colores_acertadas = count($colores_acertados);
//        $posiciones_acertadas = array_intersect_assoc($clave, $this->colores);
//        $this->posiciones_acertadas = count($posiciones_acertadas);

    public function __toString(): string
    {
        $html_jugada = "";
        for ($n = 0; $n < $this->posiciones_acertadas; $n++)
            $html_jugada .= "<span class='negro'>$n</span>";
        for ($n = $this->posiciones_acertadas; $n < $this->colores_acertadas; $n++)
            $html_jugada .= "<span class='blanco'>$n</span>";
        foreach ($this->colores as $color)
            $html_jugada .= "<span class='$color'>$color</span>";
        return $html_jugada;
    }

    public static function obtener_historico_jugadas()
    {
        $html = "";
        $jugadas = $_SESSION['jugadas'];
        foreach ($jugadas as $pos => $jugada) {
            $jugada = unserialize($jugada);
            $html .= " Jugada $pos: $jugada<br />";
        }
        var_dump($html);
        return $html;
    }

}