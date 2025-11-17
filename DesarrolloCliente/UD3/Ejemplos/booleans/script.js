let myFalse = new Boolean(false); 
let g = Boolean(myFalse); // true porque es un objeto (truthy)
let myString = new String('hola');
let s = Boolean(myString);
console.log(g);
console.log(s);