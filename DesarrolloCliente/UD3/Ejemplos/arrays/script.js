const fruits = [];
fruits.unshift('banana', 'apple', 'peach');
console.log(fruits);

// Índices
fruits[5] = 'mango';
console.log(fruits[5]);
console.log(Object.keys(fruits));
console.log(fruits.length);

fruits.length = 10;
console.log(fruits);
console.log(fruits[8]);

// sort()
const months = ['March', 'Jan', 'Feb', 'Dec'];
months.sort();
console.log(months);
// Expected output: Array ["Dec", "Feb", "Jan", "March"]

const array = [1, 30, 4, 21, 100000];
array.sort();
console.log(array);
// Expected output: Array [1, 100000, 21, 30, 4]

