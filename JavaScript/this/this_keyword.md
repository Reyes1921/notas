[Volver al Menú](../root.md)

# `This Keyword`

In JavaScript, the `this` keyword is a little different compared to other languages. It refers to an object, but it depends on how or where it is being invoked. It also has some differences between strict mode and non-strict mode.

- In an object method, `this` refers to the object
- Alone, `this` refers to the global object
- In a function, `this` refers to the global object
- In a function, in strict mode, `this` is undefined
- In an event, `this` refers to the element that received the event
- Methods like call(), apply(), and bind() can refer `this` to any object

# `Function Borrowing (Préstamo de método)`

Function borrowing allows us to use the methods of one object on a different object without having to make a copy of that method and maintain it in two separate places. It is accomplished through the use of `.call()`, `.apply()`, or `.bind()`, all of which exist to explicitly set `this` on the method we are borrowing.

Ahora hagamos una pequeña mejora en la función de hash:

```
function hash(args) {
  return args[0] + ',' + args[1];
}
```

A partir de ahora, funciona solo en dos argumentos. Sería mejor si pudiera adherir (glue) cualquier número de args.

La solución natural sería usar el método arr.join:

```
function hash(args) {
  return args.join();
}
```

… desafortunadamente, eso no funcionará. Esto es debido a que estamos llamando a hash (arguments), y el objeto arguments es iterable y símil-array (no es un array real).

Por lo tanto, llamar a join en él fallará, como podemos ver a continuación:

```
function hash() {
  alert( arguments.join() ); // Error: arguments.join is not a function
}

hash(1, 2);
```

Aún así, hay una manera fácil de usar la unión (join) de arrays:

```
function hash() {
  alert( [].join.call(arguments) ); // 1,2
}

hash(1, 2);
```

El truco se llama préstamo de método (method borrowing).

Tomamos (prestado) el método join de un array regular ([].join) y usamos [].join.call para ejecutarlo en el contexto de arguments.

¿Por qué funciona?

Esto se debe a que el algoritmo interno del método nativo arr.join (glue) es muy simple.

Tomado de la especificación casi “tal cual”:

<ol>
<li>Hacer que glue sea el primer argumento o, si no hay argumentos, entonces una coma ",".</li>
<li>Hacer que result sea una cadena vacía.</li>
<li>Adosar this[0] a result.</li>
<li>Adherir glue y this[1].</li>
<li>Adherir glue y this[2].</li>
<li>…hacerlo hasta que la cantidad this.length de elementos estén adheridos.</li>
<li>Devolver result.</li>
</ol>

# `this in a method`

Methods are properties of an object which are functions. The value of `this` inside a method is equal to the calling object. In simple words, `this` value is the object “before dot”, the one used to call the method.

Para acceder al objeto, un método puede usar la palabra clave `this`.

El valor de `this` es el objeto “antes del punto”, el usado para llamar al método.

Por ejemplo:

```
let user = {
  name: "John",
  age: 30,

  sayHi() {
    // "this" es el "objeto actual"
    alert(this.name);
  }

};

user.sayHi(); // John
```

# `this in a Function (Default)`

In a function, the global object is the default binding for `this`.

In a browser window the global object is [object Window]:

```
function myFunction() {
  return this; //[object Window]
}
```

# `this in a Function (Strict)`

JavaScript strict mode does not allow default binding.

So, when used in a function, in strict mode, `this` is undefined.

```
"use strict";
function myFunction() {
  return this; //undefined
}
```

# `this Alone`

When used alone, `this` refers to the global object.

Because `this` is running in the global scope.

In a browser window the global object is [object Window]:

```
let x = this;
alert(x); //[object Window]
```

# `this in Event Handlers`

In HTML event handlers, `this` refers to the HTML element that received the event:

```
<button onclick="this.style.display='none'">Click to Remove Me!</button>
```

# `this in arrow functions`

The keyword this when used in an arrow function refers to the parent object.

La flecha => no crea ningún enlace. La función simplemente no tiene this. La búsqueda de ‘this’ se realiza exactamente de la misma manera que una búsqueda de variable regular: en el entorno léxico externo.

- No tienen arguments
- No tienen this
- No se pueden llamar con new
- Tampoco tienen super, que aún no hemos estudiado. Lo veremos en el capítulo Herencia de clase

Esto se debe a que están diseñadas para piezas cortas de código que no tienen su propio “contexto”, sino que funcionan en el actual. Y realmente brillan en ese caso de uso.

# `Explicit binding`

Explicit binding is when you use the call or apply methods to explicitly set the value of this in a function. Explicit Binding can be applied using call(), apply(), and bind().

## `Decoradores `

JavaScript ofrece una flexibilidad excepcional cuando se trata de funciones. Se pueden pasar, usar como objetos, y ahora veremos cómo redirigir las llamadas entre ellas y decorarlas.

Un decorador es una función especial que toma otra función y altera su comportamiento.

[Decorador](https://es.javascript.info/call-apply-decorators#cache-transparente)

[Decoradores y propiedades de funciones](https://es.javascript.info/call-apply-decorators#decoradores-y-propiedades-de-funciones)

## `call`

El decorador de caché mencionado anteriormente no es adecuado para trabajar con métodos de objetos.

Por ejemplo, en el siguiente código, `worker.slow()` deja de funcionar después de la decoración:

```
// // haremos el trabajo en caché de .slow
let worker = {
  someMethod() {
    return 1;
  },

  slow(x) {
    // una aterradora tarea muy pesada para la CPU
    alert("Called with " + x);
    return x * this.someMethod(); // (*)
  }
};

// el mismo código de antes
function cachingDecorator(func) {
  let cache = new Map();
  return function(x) {
    if (cache.has(x)) {
      return cache.get(x);
    }
    let result = func(x); // (**)
    cache.set(x, result);
    return result;
  };
}

alert( worker.slow(1) ); // el método original funciona

worker.slow = cachingDecorator(worker.slow); // ahora hazlo en caché

alert( worker.slow(2) ); // Whoops! Error: Cannot read property 'someMethod' of undefined
```

Hay un método de función especial incorporado func.call(context, …args) que permite llamar a una función que establece explícitamente this.

La sintaxis es:

```
func.call(context, arg1, arg2, ...)
```

Ejecuta func proporcionando el primer argumento como this, y el siguiente como los argumentos.

En pocas palabras, estas dos llamadas hacen casi lo mismo:

```
func(1, 2, 3);
func.call(obj, 1, 2, 3)
```

Ambos llaman func con argumentos 1, 2 y 3. La única diferencia es que func.call también establece this en obj.

Como ejemplo, en el siguiente código llamamos a sayHi en el contexto de diferentes objetos: sayHi.call(user) ejecuta sayHi estableciendo this = user, y la siguiente línea establece this = admin:

```
function sayHi() {
  alert(this.name);
}

let user = { name: "John" };
let admin = { name: "Admin" };

// use call para pasar diferentes objetos como "this"
sayHi.call( user ); // John
sayHi.call( admin ); // Admin
```

## `apply`

En vez de `func.call(this, ...arguments)`, podríamos usar `func.apply(this, arguments)`.

La sintaxis del método incorporado `func.apply` es:

```
func.apply(context, args)
```

Ejecuta la configuración func this = context y usa un objeto tipo array args como lista de argumentos.

`La única diferencia de sintaxis entre call y apply es que call espera una lista de argumentos, mientras que apply lleva consigo un objeto tipo matriz.`

Entonces estas dos llamadas son casi equivalentes:

```
func.call(context, ...args);
func.apply(context, args);
```

Estas hacen la misma llamada de func con el contexto y argumento dados.

Solo hay una sutil diferencia con respecto a args:

- La sintaxis con el operador “spread” ... – en call permite pasar una lista iterable args.
- La opción apply – acepta solamente args que sean símil-array.

Para los objetos que son iterables y símil-array, como un array real, podemos usar cualquiera de ellos, pero apply probablemente será más rápido porque la mayoría de los motores de JavaScript lo optimizan mejor internamente.

Pasar todos los argumentos junto con el contexto a otra función se llama redirección de llamadas.

Esta es la forma más simple:

```
let wrapper = function() {
  return func.apply(this, arguments);
};
```

Cuando un código externo llama a tal contenedor wrapper, no se puede distinguir de la llamada de la función original func .

<h2 style='color: green'>Resumen</h2>

El decorador es un contenedor alrededor de una función que altera su comportamiento. El trabajo principal todavía lo realiza la función.

Los decoradores se pueden ver como “características” o “aspectos” que se pueden agregar a una función. Podemos agregar uno o agregar muchos. ¡Y todo esto sin cambiar su código!

## `bind`

Al pasar métodos de objeto como devoluciones de llamada, por ejemplo a setTimeout, se genera un problema conocido: la "pérdida de this".

En este capítulo veremos las formas de solucionarlo.

### `Pérdida de “this”`

Ya hemos visto ejemplos de pérdida de this. Una vez que se pasa hacia algún lugar un método separado de su objeto, this se pierde.

Así es como puede suceder con setTimeout:

```
let user = {
  firstName: "John",
  sayHi() {
    alert(`Hello, ${this.firstName}!`);
  }
};

setTimeout(user.sayHi, 1000); // Hello, undefined!
```

Como podemos ver, el resultado no muestra “John” como this.firstName ¡sino undefined!

Esto se debe a que setTimeout tiene la función user.sayHi, separada del objeto. La última línea se puede reescribir como:

```
let f = user.sayHi;
setTimeout(f, 1000); // user pierde el contexto
```

La tarea es bastante típica: queremos pasar un método de objeto a otro lugar (aquí, al planificador) donde se llamará. ¿Cómo asegurarse de que se llamará en el contexto correcto?

### `Solución 1: un contenedor (wrapper en inglés)`

[Solución 1: un contenedor (wrapper en inglés)](https://es.javascript.info/bind#solucion-1-un-contenedor-wrapper-en-ingles)

### `Solución 2: bind (vincular)`

Las funciones proporcionan un método incorporado bind que permite fijar a this.

La sintaxis básica es:

```
// la sintaxis más compleja vendrá un poco más tarde
let bound = func.bind(context, [arg1], [arg2], ...);
```

El resultado de `func.bind(context)` es un “objeto exótico”, una función similar a una función regular que se puede llamar como función; esta pasa la llamada de forma transparente a func estableciendo this = context.

En otras palabras, llamar a boundFunc es como llamar a func pero con un this fijo.

Por ejemplo, aquí funcUser pasa una llamada a func con this = user:

```
let user = {
  firstName: "John"
};

function func() {
  alert(this.firstName);
}

let funcUser = func.bind(user);
funcUser(); // John
```

Aquí `func.bind(user)` es como una “variante vinculada” de func, con this = user fijo en ella.

Todos los argumentos se pasan al func original “tal cual”, por ejemplo:

```
let user = {
  firstName: "John"
};

function func(phrase) {
  alert(phrase + ', ' + this.firstName);
}

// vincula this a user
let funcUser = func.bind(user);

funcUser("Hello"); // Hello, John (se pasa el argumento "Hello", y this=user)
```

<h3 style='color: red'>Convenience method:bindAll</h3>
Si un objeto tiene muchos métodos y planeamos pasarlo activamente, podríamos vincularlos a todos en un bucle:

```
for (let key in user) {
  if (typeof user[key] == 'function') {
    user[key] = user[key].bind(user);
  }
}
```

Las bibliotecas de JavaScript también proporcionan funciones para un enlace masivo, ej. \_.bindAll(object, methodNames) en lodash.

<h2 style='color: green'>Resumen</h2>

El método func.bind(context, ... args) devuelve una “variante vinculada” de la función func; fijando el contexto this y, si se proporcionan, fijando también los primeros argumentos.

Por lo general, aplicamos bind para fijar this a un método de objeto, de modo que podamos pasarlo en otro lugar. Por ejemplo, en setTimeout.

Cuando fijamos algunos argumentos de una función existente, la función resultante (menos universal) se llama aplicación parcial o parcial.

Los parciales son convenientes cuando no queremos repetir el mismo argumento una y otra vez. Al igual que si tenemos una función send(from, to), y from siempre debe ser igual para nuestra tarea, entonces, podemos obtener un parcial y continuar la tarea con él.

[TOP](#this-keyword)
