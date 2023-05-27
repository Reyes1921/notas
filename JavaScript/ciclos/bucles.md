[Volver al Menú](../root.md)

# Loops and Iterations

Loops offer a quick and easy way to do something repeatedly.

# The `for` loop

El bucle for es más complejo, pero también el más usado.

Se ve así:

```
for (begin; condition; step) { // (comienzo, condición, paso)
  // ... cuerpo del bucle ...
}
```

**Omitiendo partes**

Cualquier parte de for puede ser omitida.

Por ejemplo, podemos quitar comienzo si no necesitamos realizar nada al inicio del bucle.

Como aquí:

```
let i = 0; // Ya tenemos i declarada y asignada

for (; i < 3; i++) { // no hay necesidad de "comenzar"
  alert( i ); // 0, 1, 2
}
```
# `do...while` statement

The `do...while` statement creates a loop that executes a specified statement until the test condition evaluates to `false`. The condition is evaluated after executing the statement, resulting in the specified statement executing at least once.

Ejemplo:
```
let i = 0;
do {
  alert( i ); // se ejecutara la primera vez siempre no importa la condicion
  i++;
} while (i < 3);
```

# `while` statement

The `while` statement creates a loop that executes a specified statement as long as the test condition evaluates to `true`. The condition is evaluated before executing the statement.

Ejemplo: 
```
let i = 0;
while (i < 3) { // muestra 0, luego 1, luego 2
  alert( i );
  i++;
}
```
# `for...in` statement

-El bucle "for..in"
Para recorrer todas las claves de un objeto existe una forma especial de bucle: `for..in`. Esto es algo completamente diferente a la construcción `for(;;)`

La sintaxis:
```
for (key in object) {
  // se ejecuta el cuerpo para cada clave entre las propiedades del objeto
}
```

Por ejemplo, mostremos todas las propiedades de user:
```
let user = {
  name: "John",
  age: 30,
  isAdmin: true
};

for (let key in user) {
  // claves
  alert( key );  // name, age, isAdmin
  // valores de las claves
  alert( user[key] ); // John, 30, true
}
```

# `for...of` statement

The for...of statement executes a loop that operates on a sequence of values sourced from an iterable object. Iterable objects include instances of built-ins such as Array, String, TypedArray, Map, Set, NodeList (and other DOM collections), and the arguments object, generators produced by generator functions, and user-defined iterables.

Ejemplo: 

```
let fruits = ["Apple", "Orange", "Plum"];

// itera sobre los elementos del array
for (let fruit of fruits) {
  alert( fruit );
}
```
Técnicamente, y porque los arrays son objetos, es también posible usar for..in:
```
let arr = ["Apple", "Orange", "Pear"];

for (let key in arr) {
  alert( arr[key] ); // Apple, Orange, Pear
}
```
Pero es una mala idea. Existen problemas potenciales con esto:

# `break/continue`

## `break` statement, without a label reference, can only be used to jump out of a loop or a switch block

Normalmente, se sale de un bucle cuando la condición se vuelve falsa. Pero podemos forzar una salida en cualquier momento usando la directiva especial `break`.

Ejemplo: 
```
let sum = 0;

while (true) {

  let value = +prompt("Ingresa un número", '');

  if (!value) break; // (*)

  sum += value;

}
alert( 'Suma: ' + sum );
```

## `continue` statement, with or without a label reference, can only be used to skip one loop iteration.

La directiva `continue` es una “versión más ligera” de `break`. No detiene el bucle completo. En su lugar, detiene la iteración actual y fuerza al bucle a comenzar una nueva (si la condición lo permite).

Ejemplo:
```
for (let i = 0; i < 10; i++) {

  // si es verdadero, saltar el resto del cuerpo
  if (i % 2 == 0) continue;

  alert(i); // 1, luego 3, 5, 7, 9
}
```

## No break/continue a la derecha de ‘?’, Por favor, nota que las construcciones sintácticas que no son expresiones no pueden user usadas con el operador ternario ?

## `Labeled Statements`

JavaScript label statements are used to prefix a label to an identifier. It can be used with `break` and `continue` statement to control the flow more precisely.

Una etiqueta es un identificador con un signo de dos puntos `“:”` antes de un bucle:
```
labelName: for (...) {
  ...
}
```

## `break`

La declaración `break <labelName>` en el bucle debajo nos saca hacia la etiqueta:

```
outer: for (let i = 0; i < 3; i++) {

  for (let j = 0; j < 3; j++) {

    let input = prompt(`Value at coords (${i},${j})`, '');

    // Si es una cadena de texto vacía o se canceló, entonces salir de ambos bucles
    if (!input) break outer; // (*)

    // hacer algo con el valor...
  }
}

alert('Listo!');
```

## `continue`

La directiva `continue` también puede usar usada con una etiqueta. En este caso, la ejecución del código salta a la siguiente iteración del bucle etiquetado.

## `Nota Importante`

JavaScript's `forEach()` function executes a function on every element in an array. However, since `forEach()` is a function rather than a loop, JavaScript errors out if you try to use continue:

[TOP](#loops-and-iterations)