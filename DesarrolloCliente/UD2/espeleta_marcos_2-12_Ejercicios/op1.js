// EJERCICIO 1

// const nombre = prompt("Ingrese su nombre:");
// const apellido = prompt("Ingrese su apellido:");
// const fullName = `${nombre} ${apellido}`;

// calcularFechaNac = () => {
//     document.getElementById("resultado").innerHTML = "";
//     const fechaNac = document.getElementById("fecha").value;
//     const anyos = Math.floor((new Date() - new Date(fechaNac)) / (1000 * 60 * 60 * 24 * 365.25));
//     document.getElementById("resultado").append(`Hola ${fullName}, tienes: ${anyos} años.`);
// }

// EJERCICIO 2

// let numero = prompt("Ingrese un número para calcular su exponencial: ");
// alert(`El exponencial de ${numero} es ${Math.exp(numero)}`);

// EJERCICIO 3

// let numero = prompt("Introduce un número para verificar si es par o impar:");
// if(numero % 2 === 0) {
//     alert("El número " + numero + " es par.");
// } else {
//     alert("El número " + numero + " es impar.");
// }

// EJERCICIO 4

// let numeroBase = prompt("Ingrese un número positivo: ");
// let posMultiplo = prompt("Ingrese un número positivo para verificar si es múltiplo del primero: ");

// if (posMultiplo % numeroBase === 0) {
//     alert(`El número ${posMultiplo} es múltiplo de ${numeroBase}`);
// } else {
//     alert(`El número ${posMultiplo} no es múltiplo de ${numeroBase}`);
// }

// EJERCICIO 5

// let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

// for (let i = 0; i < meses.length; i++) {
//     setTimeout(() => {
//         document.getElementById("meses").innerHTML += `<li>${meses[i]}</li>`;
//     }, 3000 * i);
// }

// EJERCICIO 6

// let num1 = prompt("Ingrese el primer número:");
// let num2 = prompt("Ingrese el segundo número:");

// if(num1 > 0 && num2 > 0) {
//     if(num1 > num2) {
//         alert(`El número mayor es: ${num1}`);
//     } else if(num2 > num1) {
//         alert(`El número mayor es: ${num2}`);
//     } else {
//         alert("Ambos números son iguales.");
//     }
// } else {
//     alert("Por favor, ingrese solo números positivos.");
// }

// EJERCICIO 7

// for(let i = 0; i <= 30; i++) {
//     setTimeout(() => {
//         document.getElementById("numeros").innerHTML += (i) + "<br>";
//     }, 1000 * i);
// }

// EJERCICIO 8

// lest numero = prompt("Inserte un número para calcular su factorial: ")
// let resultado = 1;

// for(let i = numero; i > 1; i--){
//    resultado *= i;
// }

// document.getElementById("resultado").innerHTML = `El factorial de ${numero} es ${resultado}`;

// EJERCICIO 9