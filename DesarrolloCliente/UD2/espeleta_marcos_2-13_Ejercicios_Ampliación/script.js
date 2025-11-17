// Ejercicio 1

alert("Vamos a calcular tu nota de la asignatura de Desarrollo Web en Entorno Cliente");

const notaExamen = parseFloat(prompt("Introduce la nota del examen (0-10):"));
const notaProyecto = parseFloat(prompt("Introduce la nota del proyecto (0-10):"));

if(isNaN(notaExamen) || isNaN(notaProyecto)){
    alert("Por favor, introduce valores numéricos válidos.");
}

const media = (notaExamen + notaProyecto) / 2;
let nota = "";

if(notaExamen < 4.5 || notaProyecto < 4.5){
    nota = "Suspenso";
} else if(media < 5){
    nota = "Suspenso";
} else if(media < 7) {
    nota = "Aprobado";
} else if(media < 9) {
    nota = "Notable";
} else {
    nota = "Sobresaliente";
}

alert(`Tu nota final es: ${media.toFixed(2)} - ${nota}`);

// Ejercicio 2

const numeroDNI = prompt("Introduce tu número de DNI (sin letra):")
const letra = prompt("Introduce la letra de tu DNI:").toUpperCase();

const abecedario = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];

if(!/^\d{1,8}$/.test(numeroDNI)){
    alert("El número de DNI debe tener entre 1 y 8 dígitos.");
} else if(!/^[A-Z]$/.test(letra)){
    alert("La letra del DNI debe ser una única letra mayúscula.");
} else {
    const indice = parseInt(numeroDNI, 10) % 23;
    const letraCorrecta = abecedario[indice];

    if(letra === letraCorrecta){
        alert("El DNI es válido.");
    } else {
        alert(`El DNI no es válido. La letra correcta es ${letraCorrecta}.`);
    }
}

// Ejercicio 3
for(let i = 1; i <= 10; i++) {
    document.getElementById("tabla7").innerHTML += `7 x ${i} = ${7 * i}<br>`;
}

let j = 1;

while(j <= 10) {
    document.getElementById("tabla8").innerHTML += `8 + ${j} = ${8 + j}<br>`;
    j++;
}

let h = 1;

do {
    document.getElementById("tabla9").innerHTML += `9 / ${h} = ${(9 / h).toFixed(2)}<br>`;
    h++;
} while  (h <= 10);

document.getElementById("division125").innerHTML += `${125 >> Math.log2(8)}`
document.getElementById("multiplicacion40").innerHTML += `${40 << Math.log2(4)}`
document.getElementById("division25").innerHTML += `${25 >> Math.log2(2)}`
document.getElementById("multiplicacion10").innerHTML += `${10 << Math.log2(16)}`