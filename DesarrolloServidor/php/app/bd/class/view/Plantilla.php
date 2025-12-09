<?php

namespace clases\view;

class Plantilla {

    /**
     * @param array $filas - Con el contenido de la tabla o array vacío si no hay datos
     * @param string $tabla - El nombre de la tabla de la base de datos
     * @param array $campos - Los nombres de los campos o atributos de la tabla
     * @return string - Un texto diciendo que no hay datos o una tabla html con el contenido de las filas
     */
    public static function getContentTableToHtml(array $filas, string $tabla, array $campos): string {
        // Si no hay datos devuelvo un string informando
        if(count($filas) == 0) {
            return "<h1>La tabla no tiene datos</h1>";
        }

        $html="<table>";
            self::getTituloTabla($tabla, count($campos));
            self::getCabeceraCampos($campos);
            self::getContentFilas($filas);
        $html.="</table>";

        return $html;
    }

    private static function getTituloTabla(string $tabla, int $span): string {
        return "<caption colspan='$span'>$tabla</caption>";
    }

    private static function getCabeceraCampos(array $campos) {
        $cabecera_html = "<tr>";
        foreach($campos as $campo) {
            $cabecera_html .= "<th>$campo</th>";
        }
        $cabecera_html .= "</tr>";
        return $cabecera_html;
    }

    private static function getContentFilas(array $filas) {
        foreach($filas as $fila) {
            $html = "<tr>";
            foreach($fila as $campo) {
                $html .= "<td>$campo</td>";
            }
            $html .= "</tr>";
        }
        return $html;
    }

    public static function getHeader(mixed $usuario, string $page) {
        $header_html = "<div class='flex flex-row justify-end px-5 items-center h-12'>";
        $header_html .= $usuario;
        $header_html .= "<form method='post' action='$page'>";
        $header_html .= "<input type='submit' name='submit' value='Logout'>";
        $header_html .= "</form>";
        $header_html .= "</div>";
        return $header_html;
    }

}
/*
    foreach($p as $valor) {

    }

    foreach($filas as $key=>$valor)


        $fila = $res->fetch_assoc();
    echo"<h1>Mostrando la fila con assoc</h1>";
    var_dump($fila);
    $fila = $res->fetch_row();
    echo"<h1>Mostrando la fila con row</h1";
    var_dump($fila);
    $fila = $res->fetch_object();
    echo"<h1>Mostrando la fila con object</h1";
    var_dump($fila);
    $fila = $res->fetch_array();
    echo"<h1>Mostrando la fila con array</h1";
    var_dump($fila);
*/
?>


