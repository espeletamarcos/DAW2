let varTablero; //VARIABLE A USAR LUEGO
let piezas = ["♖","♘","♗","♕","♔","♗","♘","♖"] // ARRAY CON LAS PIEZAS ORDENADAS
let peon = "♙"; // VARIBALE DE PEONES

/* CREAMOS EL TABLERO */
onload = function tablero() {
 /* REFERIMOS LA TABLA VACÍA EN UNA VARIABLE */
    let tablero = document.getElementById("tablero");

 /* CREA EN LA TABLA 8 FILAS CON DO WHILE */
    let i = 0;
    do {
        let fila = tablero.insertRow(i);
        for(let j = 0; j < 8; j++){
            fila.insertCell(j);
        }
        i++;
    } while (i < 8);

 /* INSERTA CADA FILA DEL TABLERO EN UNA NUEVA VARIABLE FILA: .insertRow(0), .insertRow(1)....*/

  
 /* CREA EN CADA FILA 8 CELDAS. EMPLEA FOR  */


 
 /* INSERTA TODAS LAS CELDAS EN SU CORRESPONDIENTES 8 FILAS (a modo de columnas) .insertCell(0), .insertCell(0)*/
    
   


 /* AHORA QUE TENEMOS EL TABLERO CONSTRUIDO DE 8X8; CON INNERHTML Y EMPLEADO SWITCH-CASE RELLENA LAS FILAS 0 Y 7 CON LAS PIEZAS CORRESPONDIENTES Y LAS FILAS 1 Y 6 CON LOS PEONES*/
   for(let filas = 0; filas < 8; filas++){
        for(let columna = 0; columna < 8; columna++) {
            switch(filas) {
                case 0:
                    tablero.rows[filas].cells[columna].innerHTML = "<span class='negras'>" + piezas[columna] + "</span>";
                    break
                case 1:
                    tablero.rows[filas].cells[columna].innerHTML = "<span class='negras'>" + peon + "</span>";
                    break;
                case 6:
                    tablero.rows[filas].cells[columna].innerHTML = "<span class='blancas'>" + peon + "</span>";
                    break;
                case 7:
                    tablero.rows[filas].cells[columna].innerHTML = "<span class='blancas'>" + piezas[columna] + "</span>";
                    break;
            }
        }
    }
}
