[Volver al Menú](../root.md)

[Estructuras](./structures.md)

# `Arrays`

```
let arr = new Array(); // raramente usado
let arr = [];

let fruits = ["Apple", "Orange", "Plum"];

alert( fruits[0] ); // Apple
alert( fruits[1] ); // Orange
alert( fruits[2] ); // Plum
```

Un array puede almacenar elementos de cualquier tipo.

Por ejemplo:

```
// mezcla de valores
let arr = [ 'Apple', { name: 'John' }, true, function() { alert('hello'); } ];

// obtener el objeto del índice 1 y mostrar su nombre
alert( arr[1].name ); // John

// obtener la función del índice 3 y ejecutarla
arr[3](); // hello
```

Coma residual
Un array, al igual que un objeto, puede tener una coma final:

```
let fruits = [
  "Apple",
  "Orange",
  "Plum",
];
```

La “coma final” hace más simple insertar y remover items, porque todas la líneas se vuelven similares.

At

```
// es lo mismo que fruits[fruits.length-1]
alert( fruits.at(-1) ); // Plum
```

- pop
  Extrae el último elemento del array y lo devuelve:

- push
  Agrega el elemento al final del array:

- shift
  Extrae el primer elemento del array y lo devuelve:

- unshift
  Agrega el elemento al principio del array:

Los métodos push y unshift pueden agregar múltiples elementos de una vez:

Recuerde, solo hay ocho tipos de datos básicos en JavaScript (consulte el capítulo Tipos de datos para obtener más información).
Array es un objeto y, por tanto, se comporta como un objeto.

Las formas de malograr un array:

- Agregar una propiedad no numérica como arr.test = 5.
- Generar agujeros como: agregar arr[0] y luego arr[1000] (y nada entre ellos).
- Llenar el array en orden inverso, como arr[1000], arr[999] y así.
- Piensa en los arrays como estructuras especiales para trabajar con datos ordenados. Ellos proveen métodos especiales para ello.
- Los arrays están cuidadosamente afinados dentro de los motores JavaScript para funcionar con datos ordenados contiguos, por favor úsalos de esa manera.
- Y si necesitas claves arbitrarias, hay altas chances de que en realidad necesites objetos comunes {}.

Performance
Los métodos push/pop son rápidos, mientras que shift/unshift son lentos.

La operación shift debe hacer 3 cosas:

Remover el elemento con índice 0.
Mover todos lo elementos hacia la izquierda y renumerarlos: desde el índice 1 a 0, de 2 a 1 y así sucesivamente.
Actualizar la longitud: la propiedad length.

Algo similar ocurre con unshift: para agregar un elemento al principio del array, necesitamos primero mover todos los elementos hacia la derecha, incrementando sus índices.

¿Y qué pasa con push/pop? Ellos no necesitan mover nada. Para extraer un elemento del final, el método pop limpia el índice y acorta length.

length

La propiedad length automáticamente se actualiza cuando se modifica el array.
Para ser precisos, no es la cuenta de valores del array sino el mayor índice más uno.

```
let fruits = [];
fruits[123] = "Apple";

alert( fruits.length ); // 124
```

Si la incrementamos manualmente, nada interesante ocurre. Pero si la decrementamos, el array se trunca. El proceso es irreversible

```
let arr = [1, 2, 3, 4, 5];

arr.length = 2; // truncamos a 2 elementos
alert( arr ); // [1, 2]

arr.length = 5; // reponemos la longitud length
alert( arr[3] ); // undefined: el valor no se recupera
```

Entonces la forma más simple de limpiar un array es: arr.length = 0;.

Arrays multidimensionales
Los arrays pueden tener items que a su vez sean arrays. Podemos usarlos como arrays multidimensionales, por ejemplo para almacenar matrices:

```
let matrix = [
  [1, 2, 3],
  [4, 5, 6],
  [7, 8, 9]
];

alert( matrix[1][1] ); // 5, el elemento central
```

No compares arrays con ==
Las arrays en JavaScript, a diferencia de otros lenguajes de programación, no deben ser comparadas con el operador ==.

La comparación estricta === es aún más simple, ya que no convierte tipos.

Entonces, si comparamos arrays con ==, nunca son iguales, a no ser que comparemos dos variables que hacen referencia exactamente a la misma array.

Entonces, ¿cómo comparamos arrays?

Simple: no utilices el operador ==. En lugar, compáralas elemento a elemento en un bucle o utilizando métodos de iteración explicados en el siguiente capítulo.

Un array asociativo es un array cuyos índices no son numéricos sinó cadenas de texto (claves).
En JavaScript no existen realmente arrays asociativos pero podemos simularlos creando objetos y accediendo a sus propiedades.

<h2 style='color: green'>Resumen</h2>

Los arrays son una clase especial de objeto, adecuados para almacenar y manejar items de datos ordenados.

La declaración:

```
// corchetes (lo usual)
let arr = [item1, item2...];

// new Array (excepcionalmente raro)
let arr = new Array(item1, item2...);
```

El llamado a new Array(number) crea un array con la longitud dada, pero sin elementos.

- La propiedad length es la longitud del array o, para ser preciso, el último índice numérico más uno. Se autoajusta al usar los métodos de array.
- Si acortamos length manualmente, el array se trunca.

Obtener los elementos:

- Podemos obtener un elemento por su índice, como arr[0]
- También podemos usar el método at(i), que permite índices negativos. Para valores negativos de i, cuenta hacia atrás desde el final del array. Cuando i >= 0, funciona igual que arr[i].

Podemos usar un array como una pila “deque” o “bicola” con las siguientes operaciones:

- push(...items) agrega items al final.
- pop() remueve el elemento del final y lo devuelve.
- shift() remueve el elemento del principio y lo devuelve.
- unshift(...items) agrega items al principio.

Para iterar sobre los elementos de un array:

- for (let i=0; i<arr.length; i++) – lo más rápido, compatible con viejos navegadores.
- for (let item of arr) – la sintaxis moderna para items solamente.
- for (let i in arr) – nunca lo uses.

Para comparar arrays, no uses el operador == (como tampoco >, < y otros), ya que no tienen un tratamiento especial para arrays. Lo manejan como cualquier objeto y no es lo que normalmente queremos.

En su lugar puedes utilizar el bucle for..of para comparar arrays elemento a elemento.

## `Metodos Arrays`

### `Splice`

Los arrays son objetos, por lo que podemos intentar con delete:
El elemento fue borrado, pero el array todavía tiene 3 elementos; podemos ver que arr.length == 3.

El método arr.splice funciona como una navaja suiza para arrays. Puede hacer todo: insertar, remover y remplazar elementos.

```
arr.splice(start[, deleteCount, elem1, ..., elemN])

let arr = ["Yo", "estudio", "JavaScript", "ahora", "mismo"];

// remueve los primeros 3 elementos y los reemplaza con otros
arr.splice(0, 3, "a", "bailar");

alert( arr ) // ahora ["a", "bailar", "ahora", "mismo"]
```

Para remover solo un elemento se utiliza de esta forma

```
let arr = ["Yo", "estudio", "JavaScript"];

arr.splice(1, 1); // desde el índice 1, remover 1 elemento

alert( arr ); // ["Yo", "JavaScript"]
```

### `Slice`

El método arr.slice es mucho más simple que arr.splice.

Devuelve un nuevo array copiando en el mismo todos los elementos desde principio hasta final (sin incluir final). principio y final pueden ser negativos, en cuyo caso se asume la posición desde el final del array.

```
let arr = ["t", "e", "s", "t"];

alert( arr.slice(1, 3) ); // e,s (copia desde 1 hasta 3)

alert( arr.slice(-2) ); // s,t (copia desde -2 hasta el final)
```

También podemos invocarlo sin argumentos: arr.slice() crea una copia de arr. Se utiliza a menudo para obtener una copia que se puede transformar sin afectar el array original.

### `Concat`

El método arr.concat crea un nuevo array que incluye los valores de otros arrays y elementos adicionales.

```
arr.concat(arg1, arg2...)

let arr = [1, 2];

// crea un array a partir de: arr y [3,4]
alert( arr.concat([3, 4]) ); // 1,2,3,4

// crea un array a partir de: arr y [3,4] y [5,6]
alert( arr.concat([3, 4], [5, 6]) ); // 1,2,3,4,5,6

// crea un array a partir de: arr y [3,4], luego agrega los valores 5 y 6
alert( arr.concat([3, 4], 5, 6) ); // 1,2,3,4,5,6
```

### `forEach`

-Iteración: forEach
El método arr.forEach permite ejecutar una función a cada elemento del array.

La sintaxis:

```
arr.forEach(function(item, index, array) {
  // ... hacer algo con el elemento
});

```

-Buscar dentro de un array
Ahora vamos a ver métodos que buscan elementos dentro de un array.

## `indexOf/lastIndexOf e includes`

Los métodos arr.indexOf y arr.includes tienen una sintaxis similar y hacen básicamente lo mismo que sus contrapartes de strings, pero operan sobre elementos en lugar de caracteres:

arr.indexOf(item, from) – busca item comenzando desde el index from, y devuelve el index donde fue encontrado, de otro modo devuelve -1.
arr.includes(item, from) – busca item comenzando desde el índice from, devuelve true en caso de ser encontrado.
Usualmente estos métodos se usan con un solo argumento: el item a buscar. De manera predeterminada, la búsqueda es desde el principio.

Por ejemplo:

```
let arr = [1, 0, false];

alert( arr.indexOf(0) ); // 1
alert( arr.indexOf(false) ); // 2
alert( arr.indexOf(null) ); // -1

alert( arr.includes(1) ); // true
```

El método arr.lastIndexOf es lo mismo que indexOf, pero busca de derecha a izquierda.

## `find y findIndex/findLastIndex`

-find y findIndex/findLastIndex
Imaginemos que tenemos un array de objetos. ¿Cómo podríamos encontrar un objeto con una condición específica?

Para este tipo de casos es útil el método arr.find(fn)

```
let users = [
  {id: 1, name: "Celina"},
  {id: 2, name: "David"},
  {id: 3, name: "Federico"}
];

let user = users.find(item => item.id == 1);

alert(user.name); // Celina
```

En la vida real los arrays de objetos son bastante comunes por lo que el método find resulta muy útil.

El método arr.findIndex tiene la misma sintaxis, pero devuelve el índice donde el elemento fue encontrado en lugar del elemento en sí. Devuelve -1 cuando no lo encuentra.

El método arr.findLastIndex es como findIndex, pero busca de derecha a izquierda, similar a lastIndexOf.

Un ejemplo:

```
let users = [
  {id: 1, name: "John"},
  {id: 2, name: "Pete"},
  {id: 3, name: "Mary"},
  {id: 4, name: "John"}
];

// Encontrar el índice del primer John
alert(users.findIndex(user => user.name == 'John')); // 0

// Encontrar el índice del último John
alert(users.findLastIndex(user => user.name == 'John')); // 3
```

### `filter`

El método find busca un único elemento (el primero) que haga a la función devolver true.

Si existieran varios elementos que cumplen la condición, podemos usar arr.filter(fn).

La sintaxis es similar a find, pero filter devuelve un array con todos los elementos encontrados:

```
let results = arr.filter(function(item, index, array) {
  // si devuelve true, el elemento es ingresado al array y la iteración continua
  // si nada es encontrado, devuelve un array vacío
});

let users = [
  {id: 1, name: "Celina"},
  {id: 2, name: "David"},
  {id: 3, name: "Federico"}
];

// devuelve un array con los dos primeros usuarios
let someUsers = users.filter(item => item.id < 3);

alert(someUsers.length); // 2
```

Transformar un array
Pasamos ahora a los métodos que transforman y reordenan un array.

### `map`

El método arr.map es uno de los métodos más comunes y ampliamente usados.

Este método llama a la función para cada elemento del array y devuelve un array con los resultados.

La sintaxis es:

```
let result = arr.map(function(item, index, array) {
  // devuelve el nuevo valor en lugar de item
});
```

### `every`

Determina si todos los elementos en el array satisfacen una condición.

true si la función de devolución de llamada devuelve un valor de truthy para cada elemento de matriz; de lo contrario, false.

```
arr.every(callback(element[, index[, array]])[, thisArg])
```

La función callback es llamada para cada elemento del array de manera similar a map. Si todos los resultados son true, devuelve true, si no, false.

El método `every` ejecuta la función callback dada una vez por cada elemento presente en el arreglo hasta encontrar uno que haga retornar un valor falso a callback (un valor que resulte falso cuando se convierta a booleano). Si no se encuentra tal elemento, el método `every` de inmediato retorna false. O si callback retorna verdadero para todos los elementos, `every` retornará true. callback es llamada sólo para índices del arreglo que tengan valores asignados; no se llama para índices que hayan sido eliminados o a los que no se les haya asignado un valor.

Estos métodos se comportan con similitud a los operadores `||` y `&&:` si `fn` devuelve un valor verdadero, `arr.some()` devuelve true y detiene la iteración de inmediato; si `fn` devuelve un valor falso, `arr.every()` devuelve false y detiene la iteración también.

Podemos usar every para comparar arrays:

```
function arraysEqual(arr1, arr2) {
  return arr1.length === arr2.length && arr1.every((value, index) => value === arr2[index]);
}

alert( arraysEqual([1, 2], [1, 2])); // true
```

### `some`

El método `some()` comprueba si al menos un elemento del array cumple con la condición implementada por la función proporcionada.

Este método devuelve false para cualquier condición puesta en un array vacío.

```
arr.some(callback(element[, index[, array]])[, thisArg])
```

true si la función callback devuelve un valor truthy para cualquier elemento del array; en caso contrario, false.

`some()` ejecuta la función callback una vez por cada elemento presente en el array hasta que encuentre uno donde callback retorna un valor verdadero (true). Si se encuentra dicho elemento, `some()` retorna true inmediatamente. Si no, `some() `retorna false. callback es invocada sólo para los índices del array que tienen valores asignados; no es invocada para índices que han sido borrados o a los que nunca se les han asignado valores.

Estos métodos se comportan con similitud a los operadores `||` y `&&:` si `fn` devuelve un valor verdadero, `arr.some()` devuelve true y detiene la iteración de inmediato; si `fn` devuelve un valor falso, `arr.every()` devuelve false y detiene la iteración también.

### `fill`

El método `fill()` cambia todos los elementos en un arreglo por un valor estático, desde el índice start (por defecto 0) hasta el índice end (por defecto array.length). Devuelve el arreglo modificado.

Ejemplo:

```
const array1 = [1, 2, 3, 4];

// fill with 0 from position 2 until position 4
console.log(array1.fill(0, 2, 4));
// expected output: [1, 2, 0, 0]
```

`Parámetros`

`value`
Valor con el que se va a rellenar el arreglo. (Nótese que todos los elementos en el arreglo tendrán este mismo valor).

`start Opcional`
Índice inicial, por defecto 0.

`end Opcional`
Índice final, por defecto this.length.

### `sort`

-sort(fn)
Cuando usamos arr.sort(), este ordena el propio array cambiando el orden de los elementos.

Ejemplo:

```
let arr = [ 1, 2, 15 ];

// el método reordena el contenido de arr
arr.sort();

alert( arr );  // 1, 15, 2
```

¿Notas algo extraño en los valores de salida?

Los elementos fueron reordenados a 1, 15, 2. Pero ¿por qué pasa esto?

Los elementos son ordenados como strings (cadenas de caracteres) por defecto

Todos los elementos son literalmente convertidos a string para ser comparados. En el caso de strings se aplica el orden lexicográfico, por lo que efectivamente "2" > "15".

También devuelve un nuevo array ordenado, pero este usualmente se descarta ya que arr en sí mismo es modificado.

Por ejemplo:

```
let arr = [ 1, 2, 15 ];

// el método reordena el contenido de arr
arr.sort();

alert( arr );  // 1, 15, 2
```

Para ordenar de menor a mayor o viceversa le pasamos una funcion a `sort()`

Ejemplo:

```
function compareNumeric(a, b) {
  if (a > b) return 1;
  if (a == b) return 0;
  if (a < b) return -1;
}

let arr = [ 100, 2, 15 ];

arr.sort(compareNumeric);

alert(arr);  // 2, 15, 100
```

O mas simple

```
let arr = [ 100, 2, 15 ];

arr.sort((a,b)=>a-b); // b-a es de mayor a menor

alert(arr);  // 2, 15, 100
```

Detengámonos un momento y pensemos qué es lo que está pasando. El array arr puede ser un array de cualquier cosa, ¿no? Puede contener números, strings, objetos o lo que sea. Podemos decir que tenemos un conjunto de ciertos items. Para ordenarlos, necesitamos una función de ordenamiento que sepa cómo comparar los elementos. El orden por defecto es hacerlo como strings.

El método arr.sort(fn) implementa un algoritmo genérico de orden. No necesitamos preocuparnos de cómo funciona internamente (la mayoría de las veces es una forma optimizada del algoritmo quicksort o Timsort). Este método va a recorrer el array, comparar sus elementos usando la función dada y, finalmente, reordenarlos. Todo los que necesitamos hacer es proveer la fn que realiza la comparación.

### `reverse`

El método arr.reverse revierte el orden de los elementos en arr.

Por ejemplo:

```
let arr = [1, 2, 3, 4, 5];
arr.reverse();

alert( arr ); // 5,4,3,2,1
```

También devuelve el array arr después de revertir el orden.

### `split y join`

Analicemos una situación de la vida real. Estamos programando una app de mensajería y y el usuario ingresa una lista de receptores delimitada por comas: Celina, David, Federico. Pero para nosotros un array sería mucho más práctico que una simple string. ¿Cómo podemos hacer para obtener un array?

El método `str.split(delim)` hace precisamente eso. Separa la string en elementos según el delimitante delim dado y los devuelve como un array.

En el ejemplo de abajo, separamos por “coma seguida de espacio”:

```
let nombres = 'Bilbo, Gandalf, Nazgul';

let arr = nombres.split(', ');

for (let name of arr) {
  alert( `Un mensaje para ${name}.` ); // Un mensaje para Bilbo  (y los otros nombres)
}
```

`arr.join(glue)` hace lo opuesto a split. Crea una string de arr elementos unidos con glue (pegamento) entre ellos.

Por ejemplo:

```
let arr = ['Bilbo', 'Gandalf', 'Nazgul'];

let str = arr.join(';'); // une el array en una string usando ;

alert( str ); // Bilbo;Gandalf;Nazgul
```

### `flat`

The flat() method creates a new array with all sub-array elements concatenated into it recursively up to the specified depth.

```
const arr1 = [0, 1, 2, [3, 4]];

console.log(arr1.flat());
// expected output: [0, 1, 2, 3, 4]

const arr2 = [0, 1, 2, [[[3, 4]]]];

console.log(arr2.flat(2));
// expected output: [0, 1, 2, [3, 4]]

```

Mas ejemplos

```
const arr1 = [1, 2, [3, 4]];
arr1.flat();
// [1, 2, 3, 4]

const arr2 = [1, 2, [3, 4, [5, 6]]];
arr2.flat();
// [1, 2, 3, 4, [5, 6]]

const arr3 = [1, 2, [3, 4, [5, 6]]];
arr3.flat(2);
// [1, 2, 3, 4, 5, 6]

const arr4 = [1, 2, [3, 4, [5, 6, [7, 8, [9, 10]]]]];
arr4.flat(Infinity);
// [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
```

### `reduce/reduceRight`

Cuando necesitamos iterar sobre un array podemos usar forEach, for o for..of.

Cuando necesitamos iterar y devolver un valor por cada elemento podemos usar map.

Los métodos arr.reduce y arr.reduceRight también pertenecen a ese grupo de acciones, pero son un poco más complejos. Se los utiliza para calcular un único valor a partir del array.

La sintaxis es la siguiente:

```
let value = arr.reduce(function(accumulator, item, index, array) {
  // ...
}, [initial]);


let arr = [1, 2, 3, 4, 5];

let result = arr.reduce((sum, current) => sum + current, 0);

alert(result); // 15
```

El método arr.reduceRight realiza lo mismo, pero va de derecha a izquierda.

-Array.isArray
Los arrays no conforman un tipo diferente. Están basados en objetos.

Por eso typeof no ayuda a distinguir un objeto común de un array:

```
alert(typeof {}); // object
alert(typeof []); // object (lo mismo)
```

…Pero los arrays son utilizados tan a menudo que tienen un método especial para eso: Array.isArray(value). Este devuelve true si el valor es un array y false si no lo es.

```
alert(Array.isArray({})); // false

alert(Array.isArray([])); // true
```

Por favor tener en cuenta que sort, reverse y splice modifican el propio array

### `Array.from`

Existe un método universal `Array.from` que toma un valor iterable o simil-array y crea un Array ¨real¨ a partir de él. De esta manera podemos llamar y usar métodos que pertenecen a una matriz.

Por ejemplo:

```
let arrayLike = {
  0: "Hola",
  1: "Mundo",
  length: 2
};

let arr = Array.from(arrayLike); // (*)
alert(arr.pop()); // Mundo (el método pop funciona)
```

[TOP](#arrays)
