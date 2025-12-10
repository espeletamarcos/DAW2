<?php
namespace clases;

class Plantilla {
    private static function mostrarColores($colores): string {
        $html = "";
        $html .= "<div class='colores'>";
        forEach($colores as $clave => $valor){
            $html .= "<p class='color$valor'>$valor</p>";
        }
        $html .= "</div>";

        return $html;
    }
    public static function mostrarCabecera($usuario, $nombreFichero): string{
        $html = "";

        $html .= "<div class='cabecera'>";
        $html .= "<p>Usuario: $usuario</p>";
        $html .= "<form action='$nombreFichero' method='POST'>";
        $html .= "<input type='submit' name='submit' value='Cerrar Sesión'>";
        $html .= "</form>";
        $html .= "</div>";

        return $html;
    }
    public static function mostrarFormularioAcciones(bool $botonMostrarClave, string $nombreFichero): string {
        $html = "";

        $html .= "<form method='post' action='$nombreFichero' id='accionesPosibles'>";
        $html .= "<legend>Acciones posibles</legend>";
        if($botonMostrarClave){
            $html .= "<input type='submit' name='submit' value='Mostrar Clave'>";
        } else {
            $html .= "<input type='submit' name='submit' value='Ocultar Clave'>";
        }
        $html .= "<input type='submit' name='submit' value='Resetear la Clave'>";
        $html .= "</form>";

        return $html;
    }
    public static function mostrarFormularioJugar(array $coloresJugadaAnterior, string $mensaje, string $nombreFichero): string {
        $colores = Colores::obtenerColores();
        $html = "";

        $html .= "<form method='post' action='$nombreFichero' id='menuJugar'>";

        $html .= $mensaje;

        $html .= "<div id='selectsColores'>";
        for($i = 0; $i < 4; ++$i){
            $html .= "<select name='colores[]'>";

            $html .= "<option selected hidden>Colores</option>";

            forEach($colores as $claveColor => $color){
                $html .= "<option value='$color' class='color$color'".(($color == ($coloresJugadaAnterior[$i]??null))?"selected":"").">$color</option>";
            }
            $html .= "</select>";
        }
        $html .= "</div>";

        $html .= "<input type='submit' name='submit' value='Jugar'>";

        $html .= "</form>";

        return $html;
    }
    public static function mostrarClave($clave): string{
        $html = "";

        $html .= "<div>";
        $html .= "<h2>Clave</h2>";
        $html .= self::mostrarColores($clave);
        $html .= "</div>";

        return $html;
    }
    public static function mostrarJugadasAnterioresYActual($jugadas): string {
        $jugadas = array_reverse($jugadas);

        $html = "";

        $html .= "<div id='infoJugadaActual'>";
        if(sizeof($jugadas) > 0){
            $html .= "<p class='mensajeInfo'>Jugada actual ".sizeof($jugadas)."</p>";
            $html .= "<p class='mensajeInfo'>Resultado: ".sizeof($jugadas[0]->getPosiciones()[0])." colores y ".sizeof($jugadas[0]->getPosiciones()[1])." posiciones</p>";
        } else {
            $html .= "<p class='mensajeInfo'>No hay jugadas</p>";
        }

        $html .= self::mostrarJugadasAnteriores(array_reverse($jugadas));


        return $html;
    }


    public static function mostrarJugadasAnteriores($jugadas): string{
        $jugadas = array_reverse($jugadas);

        $html = "";

        $html .= "<div id='jugadas'>";

        $html .= "<h2>Histórico de jugadas</h2>";

        forEach($jugadas as $claveJugada => $jugada){
            $html .= "<div class='jugada'>";

            $html .= "<p class='textoJugada'>Valor de la jugada ".$jugada->getNumero()."</p>";

            $html .= "<div class='informacionJugada'>";

            $html .= self::mostrarPosiciones($jugada);

            $coloresJugada = $jugada->getCombinacionColores();

            $html .= self::mostrarColores($coloresJugada);

            $html .= "</div>";

            $html .= "</div>";
        }

        $html .= "</div>";

        return $html;
    }

    private static function mostrarPosiciones($jugada): string{
        $html = "";

        $html .= "<div class='posiciones'>";

        forEach($jugada->getPosiciones()[0] as $clave => $valor){
            $html .= "<p class='posicionNegra'>$clave</p>";
        }
        forEach($jugada->getPosiciones()[1] as $clave => $valor){
            $html .= "<p class='posicionBlanca'>$clave</p>";
        }

        $html .= "</div>";
        return $html;
    }

    public static function mostrarResultadoPartida($clave, $jugadas): string{
        $html = "";

        $html .= "<h1>Resultado de tu partida</h1>";
        $html .= "<div id='resultadoPartida'>";
        if($jugadas >= 10){
            $html .= "<h2>Ohhh... Vuelve a intentarlo, has sobrepasado el límite de intentos, has realizado ".sizeof($jugadas)." jugadas</h2>";
        } else {
            $html .= "<h2>Felicidades adivinaste la clave en ".sizeof($jugadas)." jugadas</h2>";
        }
        $html .= self::mostrarClave($clave);
        $html .= "<form action='finJuego.php' method='post'>";
        $html .= "<input type='submit' name='submit' value='Volver a jugar'>";
        $html .= "</form>";
        $html .= self::mostrarJugadasAnteriores($jugadas);

        return $html;
    }
}

?>
