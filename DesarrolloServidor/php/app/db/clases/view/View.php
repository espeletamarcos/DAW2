<?php

namespace clases\view;

    /**
     * @param array $filas Con el contenido de la tabla o array vacío si no hay más
     * @param string $tabla El de la tabla
     * @param string $campos Los nombres de los campos o atributos de la tabla
     * @return string Un texto diciendo que no hay datos o una tabla html con el contenido de las filas
     */

    class View {
        public static function getHeader(mixed $usuario, string $page):string{
            $header_html = "<div class='flex flex-row justify-end px-S items-center h-12'>";
            $header_html .= $usuario;
            $header_html .= "<form method='post' action='$page'>";
            $header_html .= "<input type='submit' name='submit' value='Logout'>";
            $header_html .= "</form>";

            return $header_html;
        }

        public static function convertirATablaHTML($tabla, $columnas, $filas){
            if(count($filas) == 0){
                return "<h1>La tabla $tabla no tiene contenidos</h1>";
            }

            $html = "<table>";
            $html .= self::getTituloTabla($tabla, count($columnas)+4);
            $html .= self::getColumnasTabla($columnas);
            $html .= self::getFilasTabla($filas);
            $html .= "</table>";

            return $html;
        }

        private static function getTituloTabla($tabla, $span){
            $html = "<tr>";
            $html .= "<th colspan='$span'>$tabla</th>";
            $html .= "</tr>";

            return $html;
        }

        private static function getColumnasTabla(array $columnas): string{
            $html = "<tr>";

            foreach($columnas as $columna){
                $html .= "<th>$columna</th>";
            }

            $html .= "<th>Añadir encima</th>";
            $html .= "<th>Modificar</th>";
            $html .= "<th>Eliminar</th>";
            $html .= "<th>Añadir debajo</th>";

            $html .= "</tr>";

            return $html;
        }

        private static function getFilasTabla(array $filas): string{
            $html = "";

            foreach($filas as $key => $fila){
                $html .= "<tr>";

                foreach($fila as $value){
                    $html .= "<td>$value</td>";
                }


                if($key == 0) {
                    $html .= "<td><input type='submit' name='submit' value='Añadir encima'/></td>";
                } else {
                    $html .= "<td></td>";
                }
                $html .= "<td><input type='submit' name='submit' value='Modificar'/></td>";
                $html .= "<td><input type='submit' name='submit' value='Eliminar'/></td>";
                $html .= "<td><input type='submit' name='submit' value='Añadir debajo'/></td>";

                $html .= "</tr>";
            }

            return $html;
        }

        public static function botonesTablas($tablas){
            $html = "";
            $html .= "<form method='post' action='listado.php'>";

            foreach ($tablas as $tabla) {
                $html .= "<input type='submit' name='tabla' value='".$tabla."'>";
            }

            $html .= "</form>";
            return $html;
        }
    }
?>