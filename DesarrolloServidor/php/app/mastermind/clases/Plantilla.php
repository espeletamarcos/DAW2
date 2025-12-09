<?php
class Plantilla{


    static public function genera_formulario_juego(){
       $html_select="";
       $colores = Clave::COLORES;
       for ($n=0; $n<4;$n++){
           $html_select.="<select name='combinacion[]'>";
           foreach ($colores as $color) {
               $html_select.="<option class='$color' value='$color'> $color </option> ";
           }
           $html_select.="</select>";
       }
       return $html_select;


    }




}

?>