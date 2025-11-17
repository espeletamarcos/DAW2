// Ejercicio 1
let numeros = 0;
for (let i = 0; i < 500; i++) {
    if(i % 3 === 0) {
        document.getElementById("multiplos").innerHTML += i + " ";
        numeros++;
    }
}
document.getElementById("numeros").innerHTML += `${numeros}`;

// Ejercicio 2
let numerosArray = [];
function agregarNumero() {
    let numero = parseInt(document.getElementById("numero").value);
    numerosArray.push(numero);
    document.getElementById("minimo").innerHTML = `El número mínimo es ${Math.min(...numerosArray)}.`;
    document.getElementById("maximo").innerHTML = `El número máximo es ${Math.max(...numerosArray)}.`;
}

// Ejercicio 3
const tallasGrandes = ['XXL', 'XL', 'L'];
const tallasMedianas = ['M'];
const tallasPequenas = ['S', 'XS', 'XXS'];

function verificarTalla() {
    let talla = document.getElementById("inputTalla").value.toUpperCase();
    if(tallasGrandes.includes(talla)){
        document.getElementById("talla").innerHTML = `La talla ${talla} es una talla grande.`;
    } else if(tallasMedianas.includes(talla)){
        document.getElementById("talla").innerHTML = `La talla ${talla} es una talla mediana.`;
    } else if(tallasPequenas.includes(talla)){
        document.getElementById("talla").innerHTML = `La talla ${talla} es una talla pequeña.`;
    } else {
        document.getElementById("talla").innerHTML = `La talla ${talla} no es válida.`;
    }
}

// Ejercicio 4
function calcularLongitud() {
    let radio = document.getElementById("inputRadio").value;
    let longitud = 2 * Math.PI * radio;
    document.getElementById("longitud").innerHTML = `La longitud del círculo con radio ${radio} es ${longitud.toFixed(2)}.`;
}

// Ejercicio 5
let numEuro = [];
let estrellas = [];
for(let i = 0; i < 5; i++) {
    let numero = Math.floor(Math.random() * 50) + 1;
    numEuro.push(numero);
    if(i == 4) {
        let estrella = Math.floor(Math.random() * 10) + 1;
        let estrella2 = Math.floor(Math.random() * 10) + 1;
        estrellas.push(estrella, estrella2);
    }
}
document.getElementById("euromillon").innerHTML += `Números del Euromillones: ${numEuro} <br />Estrellas: ${estrellas}`;

// Ejercicio 6
function generarMatriz() {
    let filas = document.getElementById("filas").value;
    let columnas = document.getElementById("columnas").value;
    let array = [filas];

    for(let i = 0; i < filas; i++) {
    array[i] = [];
    for(let j = 0; j < columnas; j++) {
        array[i][j] = [i,j];
        document.getElementById("patron").innerHTML += array[i][j] + " ";
    }
    document.getElementById("patron").innerHTML += "<br />";
    }
}

// Ejercicio 7
let operacion = [];

function operar(operador){
    let numero = parseFloat(document.getElementById("cuadro").value);
    operacion.push(numero);
    operacion.push(operador);
    borrarTodo();
}

function agregarValor(valor){
    let input = document.getElementById("cuadro");
    input.value += valor;
}

function borrarTodo(){
    document.getElementById("cuadro").value = "";
}

function calcular(){
    let numero2 = parseFloat(document.getElementById("cuadro").value);
    operacion.push(numero2);
    let num1 = operacion[0];
    let num2 = operacion[2];
    let operador = operacion[1];
    let resultado = 0;

    switch(operador){
        case '+':
            resultado = num1 + num2;
            break;
        case '-':
            resultado = num1 - num2;
            break;
        case '*':
            resultado = num1 * num2;
            break;
        case '/':
            resultado = num1 / num2;
            break;
        default:
            alert("Operador no válido");
    }

    document.getElementById("cuadro").value = resultado;
    operacion = [];
}

// Ejercicio 8 
function myFunction() {
 document.getElementById("demo1").innerHTML = "...centro, para que a cualquier persona de nuestra comunidad educativa le resulte mas accesible realizar su donacion de sangre." +
 "<br>La siguiente donacion sera:" +
 "<br>Fecha: Martes 3 de octubre." +
 "<br>Lugar: Biblioteca del IES" +
 "<br>Horario: de 9:30 a 13:00 horas" +
 "<br>Recordad que TODOS EN CUALQUIER MOMENTO PODEMOS NECESITAR SANGRE";
 }