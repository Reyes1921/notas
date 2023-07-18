[Volver al Menú](../root.md)

# `Funciones`

- Parametro es cuando se define la funcion y argumento es cuando se ingresa el valor real al momento de usar la funcion.

- Las funciones son valores. Se pueden asignar, copiar o declarar en cualquier lugar del código.

- Podemos copiar el valor de una funcion sin llamarla es decir usar parentesis.

```
function sayHi() {   // (1) crear
  alert( "Hola" );
}

let func = sayHi;    // (2) copiar

func(); // Hola          // (3) ejecuta la copia (funciona)!
sayHi(); // Hola         // esto también funciona (por qué no lo haría)
```

## `Funciones anónimas`

Las funciones anónimas son funciones que no tienen nombre.
## `Declaración de Función `

Una Declaración de Función sólo es visible dentro del bloque de código en el que reside.

```
function sayHi() {
  alert( "Hola" );
}
```

## `Expresión de función`

```
let sayHi = function() {
  alert( "Hola" );
};
```

## `Funciones de orden superior`

Funciones que llaman a otras funciones (como argumentos) o que devuelven funciones (closures), se conocen como funciones de orden superior.

Sirven para esconder el detalle, es decir, proporcionan un mayor nivel de abstracción, permitiéndonos pensar a un mayor nivel de abstracción.

Ejemplos típicos

Hacer `forEach`, `filter`, `map`, `reduce`, `every`, `some`, ...

Por ejemplo:

```
> [NaN,NaN,NaN].every( isNaN )
true
> [5,NaN,false].some(isNaN)
true
```

El coste de la elegancia es la eficiencia. Llamar funciones en JavaScript es costoso.

# `Defining and Calling Functions`

- `Defining:`

JavaScript function declarations are made by using the function keyword.

Functions can also be defined by saving function expressions to a variable. "Arrow" functions are commonly used in this way.

- `Calling:`

When a function is defined, it is not yet executed.

To call and invoke a function's code, use the function's name followed by parentheses: functionName().

# `Function Parameters`

The parameter is the name given to the variable declared inside the definition of a function. There are two special kinds of syntax: default and rest parameters.

Las funciones ignoran los argumentos extras

```
function cuadrado(x) { return x * x; }
console.log(cuadrado(4, true, "erizo"));
// → 16
```

JavaScript es de extremadamente mente-abierta sobre la cantidad de argumentos que puedes pasar a una función. Si pasa demasiados, los adicionales son ignorados. Si pasas muy pocos, a los parámetros faltantes se les asigna el valor undefined.

## `Default parameters`

In JavaScript, parameters of functions default to undefined. However, in some situations it might be useful to set a different default value. This is exactly what default parameters do.

In the past, the general strategy for setting defaults was to test parameter values in the body of the function and assign a value if they are undefined.

In the following example, if no value is provided for b, its value would be undefined when evaluating a\*b, and a call to multiply would normally have returned NaN. However, this is prevented by the second line in this example:

```
function multiply(a, b) {
  b = typeof b !== 'undefined' ?  b : 1;
  return a * b;
}

multiply(5); // 5
```

With default parameters, a manual check in the function body is no longer necessary. You can put 1 as the default value for b in the function head:

```
function multiply(a, b = 1) {
  return a * b;
}

multiply(5); // 5
```

## `Rest parameters`

The rest parameter syntax allows us to represent an indefinite number of arguments as an array.

In the following example, the function multiply uses rest parameters to collect arguments from the second one to the end. The function then multiplies these by the first argument.

```
function multiply(multiplier, ...theArgs) {
  return theArgs.map((x) => multiplier * x);
}

const arr = multiply(2, 1, 2, 3);
console.log(arr); // [2, 4, 6]
```

Podemos elegir obtener los primeros parámetros como variables, y juntar solo el resto.

Aquí los primeros dos argumentos van a variables y el resto va al array titles:

```
function showName(firstName, lastName, ...titles) {
  alert( firstName + ' ' + lastName ); // Julio Cesar

  // el resto va en el array titles
  // por ejemplo titles = ["Cónsul", "Emperador"]
  alert( titles[0] ); // Cónsul
  alert( titles[1] ); // Emperador
  alert( titles.length ); // 2
}

showName("Julio", "Cesar", "Cónsul", "Emperador");
```

Los parámetros rest deben ir al final
Los parámetros rest recogen todos los argumentos sobrantes, por lo que el siguiente código no tiene sentido y causa un error:

```
function f(arg1, ...rest, arg2) { // arg2 después de ...rest ?!
  // error
}
...rest debe ir siempre último.
```

## `Sintaxis Spread`

Acabamos de ver cómo obtener un array de la lista de parámetros. Pero a veces necesitamos hacer exactamente lo opuesto.

Por ejemplo, existe una función nativa Math.max que devuelve el número más grande de una lista:

```
alert( Math.max(3, 5, 1) ); // 5
```

Ahora bien, supongamos que tenemos un array [3, 5, 1]. ¿Cómo ejecutamos Math.max con él?

Pasando la variable no funcionará, porque Math.max espera una lista de argumentos numéricos, no un único array:

```
let arr = [3, 5, 1];

alert( Math.max(arr) ); // NaN
```

Cuando ...arr es usado en el llamado de una función, “expande” el objeto iterable arr en una lista de argumentos.

Para Math.max:

```
let arr = [3, 5, 1];

alert( Math.max(...arr) ); // 5 (spread convierte el array en una lista de argumentos)
```

También podemos pasar múltiples iterables de esta manera:

```
let arr1 = [1, -2, 3, 4];
let arr2 = [8, 3, -8, 1];

alert( Math.max(...arr1, ...arr2) ); // 8
```

Incluso podemos combinar el operador spread con valores normales:

```
let arr1 = [1, -2, 3, 4];
let arr2 = [8, 3, -8, 1];

alert( Math.max(1, ...arr1, 2, ...arr2, 25) ); // 25
```

Además, el operador spread puede ser usado para combinar arrays:

```
let arr = [3, 5, 1];
let arr2 = [8, 9, 15];

let merged = [0, ...arr, 2, ...arr2];

alert(merged); // 0,3,5,1,2,8,9,15 (0, luego arr, después 2, después arr2)
```

En los ejemplos de arriba utilizamos un array para demostrar el operador spread, pero cualquier iterable funcionará también.

Por ejemplo, aquí usamos el operador spread para convertir la cadena en un array de caracteres:

```
let str = "Hola";

alert( [...str] ); // H,o,l,a
```

El operador spread utiliza internamente iteradores para iterar los elementos, de la misma manera que for..of hace.

Entonces, para una cadena for..of retorna caracteres y ...str se convierte en "H","o","l","a". La lista de caracteres es pasada a la inicialización del array [...str].

Para esta tarea en particular también podríamos haber usado Array.from, ya que convierte un iterable (como una cadena de caracteres) en un array:

let str = "Hola";

```// Array.from convierte un iterable en un array
alert( Array.from(str) ); // [ 'H', 'o', 'l', 'a' ]
```

El resultado es el mismo que [...str].

Pero hay una sutil diferencia entre Array.from(obj) y [...obj]:

- Array.from opera con símil-arrays e iterables.
- El operador spread solo opera con iterables.
  Por lo tanto, para la tarea de convertir algo en un array, Array.from tiende a ser más universal.

<h2 style='color: green'>Resumen</h2>

Cuando veamos "..." en el código, son los parámetros rest o el operador spread.

Hay una manera fácil de distinguir entre ellos:

- Cuando ... se encuentra al final de los parámetros de una función, son los “parámetros rest” y recogen el resto de la lista de argumentos en un array.
- Cuando ... está en el llamado de una función o similar, se llama “operador spread” y expande un array en una lista.
  Patrones de uso:

- Los parámetros rest son usados para crear funciones que acepten cualquier número de argumentos.
- El operador spread es usado para pasar un array a funciones que normalmente requieren una lista de muchos argumentos.
  Ambos ayudan a ir entre una lista y un array de parámetros con facilidad.

Todos los argumentos de un llamado a una función están también disponibles en el “viejo” arguments: un objeto símil-array iterable.

# `Arrow Functions`

Hay otra sintaxis muy simple y concisa para crear funciones, que a menudo es mejor que las Expresiones de funciones.

Se llama “funciones de flecha”, porque se ve así:

```
let func = (arg1, arg2, ..., argN) => expression;
```

Esto crea una función func que acepta los parámetros arg1..argN, luego evalúa la expression del lado derecho mediante su uso y devuelve su resultado.

En otras palabras, es la versión más corta de:

```
let func = function(arg1, arg2, ..., argN) {
  return expression;
};
```

- Si solo tenemos un argumento, se pueden omitir paréntesis alrededor de los parámetros, lo que lo hace aún más corto.

Por ejemplo:

```
let double = n => n * 2;
// Más o menos lo mismo que: let double = function(n) { return n * 2 }

alert( double(3) ); // 6
```

- Si no hay parámetros, los paréntesis estarán vacíos; pero deben estar presentes:

```
let sayHi = () => alert("¡Hola!");

sayHi();
```

Las funciones de flecha se pueden usar de la misma manera que las expresiones de función.

Por ejemplo, para crear dinámicamente una función:

```
let age = prompt("What is your age?", 18);

let welcome = (age < 18) ?
  () => alert('¡Hola!') :
  () => alert("¡Saludos!");

welcome();
```

## `Funciones de flecha multilínea`

Las funciones de flecha que estuvimos viendo eran muy simples. Toman los parámetros a la izquierda de =>, los evalúan y devuelven la expresión del lado derecho.

A veces necesitamos una función más compleja, con múltiples expresiones o sentencias. En ese caso debemos encerrarlos entre llaves. La diferencia principal es que las llaves necesitan usar un return para devolver un valor (tal como lo hacen las funciones comunes).

Como esto:

```
let sum = (a, b) => {  // la llave abre una función multilínea
  let result = a + b;
  return result; // si usamos llaves, entonces necesitamos un "return" explícito
};

alert( sum(1, 2) ); // 3
```

<h2 style='color: green'>Resumen</h2>

- Las funciones de flecha son útiles para acciones simples, especialmente las de una sola línea. Vienen en dos variantes:

- Sin llaves: (...args) => expression – el lado derecho es una expresión: la función la evalúa y devuelve el resultado. Pueden omitirse los paréntesis si solo hay un argumento, por ejemplo n => n\*2.

  Con llaves: (...args) => { body } – las llaves nos permiten escribir varias declaraciones dentro de la función, pero necesitamos un return explícito para devolver algo.

- No tienen this
- No tienen arguments
- No se pueden llamar con new
- Tampoco tienen super, que aún no hemos estudiado. Lo veremos en el capítulo Herencia de clase

# `IIFE (Immediately-Invoked Function Expression)`

An IIFE (Immediately Invoked Function Expression) is a JavaScript function that runs as soon as it is defined. The name IIFE is promoted by Ben Alman in his blog.

Como en el pasado solo existía var, y no había visibilidad a nivel de bloque, los programadores inventaron una manera de emularla. Lo que hicieron fue el llamado "expresiones de función inmediatamente invocadas (abreviado IIFE en inglés).

No es algo que debiéramos usar estos días, pero puedes encontrarlas en código antiguo.

Un IIFE se ve así:

```
(function() {

  var message = "Hello";

  alert(message); // Hello

})();
```

```
(function () {
  // …
})();

(() => {
  // …
})();

(async () => {
  // …
})();
```

- 1. The first is the anonymous function with lexical scope enclosed within the Grouping Operator (). This prevents accessing variables within the IIFE idiom as well as polluting the global scope.

- 2. The second part creates the immediately invoked function expression () through which the JavaScript engine will directly interpret the function.

Aquí la expresión de función es creada e inmediatamente llamada. Entonces el código se ejecuta enseguida y con sus variables privadas propias.

La expresión de función es encerrada entre paréntesis (function {...}), porque cuando JavaScript se encuentra con "function" en el flujo de código principal lo entiende como el principio de una declaración de función. Pero una declaración de función debe tener un nombre, entonces ese código daría error:

```
// Trata de declarar e inmediatamente llamar una función
function() { // <-- SyntaxError: la instrucción de función requiere un nombre de función

  var message = "Hello";

  alert(message); // Hello

}();
```

Incluso si decimos: “okay, agreguémosle un nombre”, no funcionaría, porque JavaScript no permite que las declaraciones de función sean llamadas inmediatamente:

```
// error de sintaxis por causa de los paréntesis debajo
function go() {

}(); // <-- no puede llamarse una declaración de función inmediatamente
```

Entonces, los paréntesis alrededor de la función es un truco para mostrarle a JavaScript que la función es creada en el contexto de otra expresión, y de allí lo de “expresión de función”, que no necesita un nombre y puede ser llamada inmediatamente.

Existen otras maneras además de los paréntesis para decirle a JavaScript que queremos una expresión de función:

```
// Formas de crear IIFE

(function() {
  alert("Paréntesis alrededor de la función");
})();

(function() {
  alert("Paréntesis alrededor de todo");
}());

!function() {
  alert("Operador 'Bitwise NOT' como comienzo de la expresión");
}();

+function() {
  alert("'más unario' como comienzo de la expresión");
}();
```

En todos los casos de arriba declaramos una expresión de función y la ejecutamos inmediatamente. Tomemos nota de nuevo: Ahora no hay motivo para escribir semejante código.

# `Arguments object`

The arguments object is an Array-like object accessible inside functions that contains the values of the arguments passed to that function, available within all non-arrow functions. You can refer to a function's arguments inside that function by using its arguments object. It has entries for each argument the function was called with, with the first entry's index at 0. But, in modern code, rest parameters should be preferred.

También existe un objeto símil-array especial llamado arguments que contiene todos los argumentos indexados.

Por ejemplo:

```
function showName() {
  alert( arguments.length );
  alert( arguments[0] );
  alert( arguments[1] );

  // arguments es iterable
  // for(let arg of arguments) alert(arg);
}

// muestra: 2, Julio, Cesar
showName("Julio", "Cesar");

// muestra: 1, Ilya, undefined (no hay segundo argumento)
showName("Ilya");
```

Antiguamente, los parámetros rest no existían en el lenguaje, y usar arguments era la única manera de obtener todos los argumentos de una función. Y aún funciona, podemos encontrarlo en código antiguo.

Pero la desventaja es que a pesar de que arguments es símil-array e iterable, no es un array. No soporta los métodos de array, no podemos ejecutar arguments.map(...) por ejemplo.

Además, siempre contiene todos los argumentos. No podemos capturarlos parcialmente como hicimos con los parámetros rest.

Por lo tanto, cuando necesitemos estas funcionalidades, los parámetros rest son preferidos.

Las funciones flecha no poseen "arguments"
Si accedemos el objeto arguments desde una función flecha, toma su valor dela función “normal” externa.

Aquí hay un ejemplo:

```
function f() {
  let showArg = () => alert(arguments[0]);
  showArg();
}

f(1); // 1
```

Como recordamos, las funciones de flecha no tienen su propio this. Ahora sabemos que tampoco tienen el objeto especial arguments.

# `Scope and function stack`

## `Scope`

A space or environment in which a particular variable or function can be accessed or used. Accessibility of this variable or function depends on where it is defined.

JavaScript has the following kinds of scopes:

- Global scope: The default scope for all code running in script mode.
- Module scope: The scope for code running in module mode.
- Function scope: The scope created with a function.
- Block scope: The scope created with a pair of curly braces (a block).

## `Function Stack (Call stack) (El contexto de ejecución y pila)`

El motor de JS puede ejecutar solo una cosa a la vez. Para manejar múltiples tareas, el motor utiliza una estructura de datos especial: la pila de llamadas (call stack).

The function stack is how the interpreter keeps track of its place in a script that calls multiple functions, like which function is currently executing and which functions within that function are being called.

El contexto de ejecución es una estructura de datos interna que contiene detalles sobre la ejecución de una función: dónde está el flujo de control ahora, las variables actuales, el valor de this (que no usamos aquí) y algunos otros detalles internos.

Una llamada de función tiene exactamente un contexto de ejecución asociado.

Cuando una función realiza una llamada anidada, sucede lo siguiente:

- La función actual se pausa.
- El contexto de ejecución asociado con él se recuerda en una estructura de datos especial llamada pila de contexto de ejecución.
- La llamada anidada se ejecuta.
- Una vez que finaliza, el antiguo contexto de ejecución se recupera de la pila y la función externa se reanuda desde donde se pausó.

[Ejemplo](https://es.javascript.info/recursion#el-contexto-de-ejecucion-y-pila)

### `Recursion`

La recursión es un patrón de programación que es útil en situaciones en las que una tarea puede dividirse naturalmente en varias tareas del mismo tipo, pero más simples. O cuando una tarea se puede simplificar en una acción fácil más una variante más simple de la misma tarea. O, como veremos pronto, tratar con ciertas estructuras de datos.

Sabemos que cuando una función resuelve una tarea, en el proceso puede llamar a muchas otras funciones. Un caso particular de esto se da cuando una función se llama a sí misma. Esto es lo que se llama recursividad.

```
function potencia(base, exponente) {
if (exponente == 0) {
return 1;
} else {
return base * potencia(base, exponente - 1);
}
}
console.log(potencia(2, 3));
// → 8
```

Esto es bastante parecido a la forma en la que los matemáticos definen la exponenciación y posiblemente describa el concepto más claramente que la variante con el ciclo. La función se llama a si misma muchas veces con cada vez exponentes más pequeños para lograr la multiplicación repetida.

Pero esta implementación tiene un problema: en las implementaciones típicas de JavaScript, es aproximadamente 3 veces más lenta que la versión que usa un ciclo. Correr a través de un ciclo simple es generalmente más barato en terminos de memoria que llamar a una función multiples veces.

El dilema de velocidad versus elegancia es interesante. Puedes verlo como una especie de compromiso entre accesibilidad-humana y accesibilidad-maquina.

Casi cualquier programa se puede hacer más rápido haciendolo más grande y complicado. El programador tiene que decidir acerca de cual es un equilibrio apropiado.

`Dos formas de pensar`

Para comenzar con algo simple, escribamos una función pow(x, n) que eleve x a una potencia natural den. En otras palabras, multiplica x por sí mismo n veces.

Pensamiento iterativo: el bucle for:

```
function pow(x, n) {
  let result = 1;

  // multiplicar el resultado por x n veces en el ciclo
  for (let i = 0; i < n; i++) {
    result *= x;
  }

  return result;
}

alert( pow(2, 3) ); // 8
```

Pensamiento recursivo: simplifica la tarea y se llama a sí mismo:

```
function pow(x, n) {
  if (n == 1) {
    return x;
  } else {
    return x * pow(x, n - 1);
  }
}

alert( pow(2, 3) ); // 8
```

Cuando se llama a pow(x, n), la ejecución se divide en dos ramas:

```
              if n==1  = x
             /
pow(x, n) =
             \
              else     = x * pow(x, n - 1)
```

- Si n == 1, entonces todo es trivial. Esto se llama base de la recursividad, porque produce inmediatamente el resultado obvio: pow (x, 1) es igual a x.
- De lo contrario, podemos representar pow (x, n) como x _ pow (x, n - 1). En matemáticas, uno escribiría xn = x _ x n-1. Esto se llama paso recursivo: transformamos la tarea en una acción más simple (multiplicación por x) y una llamada más simple de la misma tarea (pow con menor n). Los siguientes pasos lo simplifican más y más hasta que n llegue a1.

Por ejemplo, para calcular pow (2, 4) la variante recursiva realiza estos pasos:

```
pow(2, 4) = 2 * pow(2, 3)
pow(2, 3) = 2 * pow(2, 2)
pow(2, 2) = 2 * pow(2, 1)
pow(2, 1) = 2
```

<h2 style='color: green'>Resumen</h2>

- Recursion es concepto de programación que significa que una función se llama a sí misma. Las funciones recursivas se pueden utilizar para resolver ciertas tareas de manera elegante.

- Cada vez que una función se llama a sí misma ocurre un paso de recursión. La base de la recursividad se da cuando los argumentos de la función hacen que la tarea sea tan básica que la función no realiza más llamadas.

- Una estructura de datos definida recursivamente es una estructura de datos que se puede definir utilizándose a sí misma.

- Por ejemplo, la lista enlazada se puede definir como una estructura de datos que consiste en un objeto que hace referencia a una lista (o nulo).

### `Lexical scoping (Ámbito o Entorno léxico)`

The lexical environment for a function f simply refers to the environment enclosing that function's definition in the source code.

El ámbito léxico se refiere al alcance de una variable en el código fuente, y es determinado por el contexto en el que se declara la variable. Este tipo de alcance es establecido en tiempo de compilación y permanece constante durante la ejecución del programa. Esto significa que una variable definida dentro de una función solo será accesible dentro de esa función, y no en otras funciones o bloques de código fuera de ella. Esto asegura que las variables tengan un comportamiento predecible y evita posibles conflictos entre nombres de variables en diferentes partes del programa.

#### `Paso 1. Variables`

En JavaScript, todas las funciones en ejecución, el bloque de código {...} y el script en su conjunto tienen un objeto interno (oculto) asociado, conocido como Entorno léxico.

El objeto del Entorno léxico consta de dos partes:

- `Registro de entorno`: es un objeto que almacena en sus propiedades todas las variables locales (y alguna otra información, como el valor de this).

- Una referencia al `entorno léxico externo,` asociado con el código externo.
  Una “variable” es solo una propiedad del objeto interno especial, el Registro de entorno. “Obtener o cambiar una variable” significa “obtener o cambiar una propiedad de ese objeto”.

`El entorno léxico es un objeto de especificación`

El “entorno léxico” es un objeto de especificación: solo existe “teóricamente” en la especificación del lenguaje para describir cómo funcionan las cosas. No podemos obtener este objeto en nuestro código y manipularlo directamente.

Los motores de JavaScript también pueden optimizarlo, descartar variables que no se utilizan para ahorrar memoria y realizar otros trucos internos, siempre que el comportamiento visible permanezca como se describe.

### `Paso 2. Declaración de funciones`

Una función también es un valor, como una variable.

La diferencia es que una declaración de función se inicializa completamente al instante.

Cuando se crea un entorno léxico, una declaración de función se convierte inmediatamente en una función lista para usar (a diferencia de let, que no se puede usar hasta la declaración).

Es por eso que podemos usar una función, declarada como declaración de función, incluso antes de la declaración misma.

### `Paso 3. Entorno léxico interno y externo`

Cuando se ejecuta una función, al comienzo de la llamada se crea automáticamente un nuevo entorno léxico para almacenar variables y parámetros locales de la llamada.

El entorno léxico interno tiene una referencia al externo.

Cuando el código quiere acceder a una variable: primero se busca el entorno léxico interno, luego el externo, luego el más externo y así sucesivamente hasta el global.

Si no se encuentra una variable en ninguna parte, en el modo estricto se trata de un error (sin use strict, una asignación a una variable no existente crea una nueva variable global, por compatibilidad con el código antiguo).

### `Paso 4. Devolviendo una función`

Todas las funciones recuerdan el entorno léxico en el que fueron realizadas. Técnicamente, no hay magia aquí: todas las funciones tienen la propiedad oculta llamada `[[Environment]`, que mantiene la referencia al entorno léxico donde se creó la función.

## `Closure (clausura)`

Existe un término general de programación “closure” que los desarrolladores generalmente deben conocer.

Una clausura es una función que recuerda sus variables externas y puede acceder a ellas. En algunos lenguajes, eso no es posible, o una función debe escribirse de una manera especial para que suceda. Pero como se explicó anteriormente, en JavaScript todas las funciones son clausuras naturales (solo hay una excepción, que se cubrirá en La sintaxis "new Function").

Es decir: recuerdan automáticamente dónde se crearon utilizando una propiedad oculta [[Environment]], y luego su código puede acceder a las variables externas.

Cuando en una entrevista un desarrollador frontend recibe una pregunta sobre “¿qué es una clausura?”, una respuesta válida sería una definición de clausura y una explicación de que todas las funciones en JavaScript son clausuras, y tal vez algunas palabras más sobre detalles técnicos: la propiedad [[Environment]] y cómo funcionan los entornos léxicos.

Ejemplo:

```
function outer() {
  var x = 10; // Local variable in outer function

  function inner() {
    console.log(x); // Accesses variable from outer function
  }

  return inner; // Returns the inner function
}

var closureExample = outer();  // outer() returns inner() function, which we assign to closureExample

closureExample(); // Outputs 10, even though x is a local variable in outer() function because it is accessible within the closure.

```

# `Built in functions`

- A JavaScript method is a property containing a function definition . In other words, when the data stored on an object is a function we call that a method.
- To differentiate between properties and methods, we can think of it this way: A property is what an object has, while a method is what an object does.
- Since JavaScript methods are actions that can be performed on objects, we first need to have objects to start with. There are several objects built into JavaScript which we can use.

## `Number Methods`

The Number object contains only the default methods that are part of every object's definition.

| Sr.No. | Method & Description                                                                                                                                           |
| ------ | -------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| 1      | `constructor()`: Returns the function that created this object's instance. By default this is the Number object.                                               |
| 2      | `toExponential()`: Forces a number to display in exponential notation, even if the number is in the range in which JavaScript normally uses standard notation. |
| 3      | `toFixed()`: Formats a number with a specific number of digits to the right of the decimal.                                                                    |
| 4      | `toLocaleString()`: Returns a string value version of the current number in a format that may vary according to a browser's locale settings.                   |
| 5      | `toPrecision()`: Defines how many total digits (including digits to the left and right of the decimal) to display of a number.                                 |
| 6      | `toString()`: Returns the string representation of the number's value.                                                                                         |
| 7      | `valueOf()`: Returns the number's value.                                                                                                                       |

- `eval()`

The `eval()` function evaluates JavaScript code represented as a string and returns its completion value. The source is parsed as a script.

<p style="color: red">Warning: Executing JavaScript from a string is an enormous security risk. It is far too easy for a bad actor to run arbitrary code when you use eval(). See Never use eval()!, below.</p>

[Informacion completa](https://www.tutorialspoint.com/javascript/javascript_builtin_functions.htm)

# `Función como objeto, NFE`

Como ya sabemos, una función en JavaScript es un valor.

Cada valor en JavaScript tiene un tipo. ¿Qué tipo es una función?

En JavaScript, las funciones son objetos.

Una buena manera de imaginar funciones es como “objetos de acción” invocables. No solo podemos llamarlos, sino también tratarlos como objetos: agregar/eliminar propiedades, pasar por referencia, etc.

## `La propiedad “name”`

Las funciones como objeto contienen algunas propiedades utilizables.

Por ejemplo, el nombre de una función es accesible mediante la propiedad “name”:

```
function sayHi() {
  alert("Hi");
}

alert(sayHi.name); // sayHi
```

Los métodos de objeto también tienen nombres:

```
let user = {

  sayHi() {
    // ...
  },

  sayBye: function() {
    // ...
  }

}

alert(user.sayHi.name); // sayHi
alert(user.sayBye.name); // sayBye
```

En la práctica, sin embargo, la mayoría de las funciones tienen un nombre.

## `La propiedad “length”`

Hay una nueva propiedad “length” incorporada que devuelve el número de parámetros de una función, por ejemplo:

```
function f1(a) {}
function f2(a, b) {}
function many(a, b, ...more) {}

alert(f1.length); // 1
alert(f2.length); // 2
alert(many.length); // 2
```

## `Propiedades personalizadas`

También podemos agregar nuestras propias propiedades.

Aquí agregamos la propiedad counter para registrar el recuento total de llamadas:

```
function sayHi() {
  alert("Hi");

  //vamos a contar las veces que se ejecuta
  sayHi.counter++;
}
sayHi.counter = 0; // valor inicial

sayHi(); // Hi
sayHi(); // Hi

alert( `Called ${sayHi.counter} times` ); //  Llamamos 2 veces
```

## `Una propiedad no es una variable`

Una propiedad asignada a una función como sayHi.counter = 0 no define una variable local counter dentro de ella. En otras palabras, una propiedad counter y una variable let counter son dos cosas no relacionadas.

Podemos tratar una función como un objeto, almacenar propiedades en ella, pero eso no tiene ningún efecto en su ejecución. Las variables no son propiedades de la función y viceversa. Estos solo son dos mundos paralelos.

Las propiedades de la función a veces pueden reemplazar las clausuras o closures. Por ejemplo, podemos reescribir el ejemplo de la función de contador del capítulo Ámbito de Variable y el concepto "closure" para usar una propiedad de función:

```
function makeCounter() {
  // en vez de:
  // let count = 0

  function counter() {
    return counter.count++;
  };

  counter.count = 0;

  return counter;
}

let counter = makeCounter();
alert( counter() ); // 0
alert( counter() ); // 1
```

## `Expresión de Función con Nombre`

Named Function Expression, o NFE, es un término para Expresiones de funciones que tienen un nombre.

Por ejemplo, tomemos una expresión de función ordinaria:

```
let sayHi = function(who) {
  alert(`Hello, ${who}`);
};
```

Y agrégale un nombre:

```
let sayHi = function func(who) {
  alert(`Hello, ${who}`);
};
```

¿Logramos algo aquí? ¿Cuál es el propósito de ese nombre adicional de "func"?

Primero, tengamos en cuenta que todavía tenemos una Expresión de Función. Agregar el nombre "func" después de function no lo convirtió en una Declaración de Función, porque todavía se crea como parte de una expresión de asignación.

<h2 style='color: green'>Resumen</h2>

Las funciones son objetos.

Aquí cubrimos sus propiedades:

- name – El nombre de la función. Por lo general, se toma de la definición de la función, pero si no hay ninguno, JavaScript intenta adivinarlo por el contexto (por ejemplo, una asignación).

- length – El número de argumentos en la definición de la función. Los parámetros rest no se cuentan.

Si la función se declara como una Expresión de función (no en el flujo de código principal), y lleva el nombre, se llama Expresión de Función con Nombre (Named Function Expression). El nombre se puede usar dentro para hacer referencia a sí mismo, para llamadas recursivas o similares.

Además, las funciones pueden tener propiedades adicionales. Muchas bibliotecas de JavaScript conocidas hacen un gran uso de esta función.

Crean una función “principal” y le asignan muchas otras funciones “auxiliares”. Por ejemplo, la biblioteca jQuery crea una función llamada $. La biblioteca lodash crea una función _, y luego agrega _.clone, \_.keyBy y otras propiedades (mira los docs cuando quieras aprender más sobre ello). En realidad, lo hacen para disminuir su contaminación del espacio global, de modo que una sola biblioteca proporciona solo una variable global. Eso reduce la posibilidad de conflictos de nombres.

Por lo tanto, una función puede hacer un trabajo útil por sí misma y también puede tener muchas otras funcionalidades en las propiedades.

# `La sintaxis "new Function"`

Hay una forma más de crear una función. Raramente se usa, pero a veces no hay alternativa.

## `Sintaxis`

La sintaxis para crear una función:

```
let func = new Function ([arg1, arg2, ...argN], functionBody);
```

La función se crea con los argumentos arg1 ... argN y el cuerpo functionBody dado.

Es más fácil entender viendo un ejemplo: Aquí tenemos una función con dos argumentos:

```
let sumar = new Function('a', 'b', 'return a + b');

alert(sumar(1, 2)); // 3
```

Y aquí tenemos unaa función sin argumentos, con solo el cuerpo de la función:

```
let diHola = new Function('alert("Hola")');

diHola(); // Hola
```

La mayor diferencia sobre las otras maneras de crear funciones que hemos visto, es que la función se crea desde un string y es pasada en tiempo de ejecución.

Las declaraciones anteriores nos obliga a nosotros, los programadores, a escribir el código de la función en el script.

Pero new Function nos permite convertir cualquier string en una función. Por ejemplo, podemos recibir una nueva función desde el servidor y ejecutarlo.

```
let str = ... recibir el código de un servidor dinámicamente ...

let func = new Function(str);
func();
```

Se utilizan en casos muy específicos, como cuando recibimos código de un servidor, o compilar dinámicamente una función a partir de una plantilla. La necesidad surge en etapas avanzadas de desarrollo.

## `Closure`

Normalmente, una función recuerda dónde nació en una propiedad especial llamada [[Environment]], que hace referencia al entorno léxico desde dónde se creó.

Pero cuando una función es creada usando new Function, su [[Environment]] no hace referencia al entorno léxico actual, sino al global.

Entonces, tal función no tiene acceso a las variables externas, solo a las globales.

```
function getFunc() {
  let valor = "test";

  let func = new Function('alert(valor)');

  return func;
}

getFunc()(); // error: valor is not defined
```

Compáralo con el comportamiento normal:

```
function getFunc() {
  let valor = "test";

  let func = function() { alert(valor); };

  return func;
}

getFunc()(); // "test", obtenido del entorno léxico de getFunc
```

Esta característica especial de new Function parece extraña, pero resulta muy útil en la práctica.

Imagina que debemos crear una función a partir de una string. El código de dicha función no se conoce al momento de escribir el script (es por eso que no usamos funciones regulares), sino que se conocerá en el proceso de ejecución. Podemos recibirlo del servidor o de otra fuente.

Nuestra nueva función necesita interactuar con el script principal.

¿Qué pasa si pudiera acceder a las variables locales externas?

El problema es que antes de publicar el JavaScript a producción, este es comprimido usando un minifier : un programa especial que comprime código eliminando los comentarios extras, espacios y, lo que es más importante, renombra las variables locales a otras más cortas.

Por ejemplo, si una función tiene let userName, el minifier lo reemplaza con let a (u otra letra si ésta está siendo utilizada), y lo hace en todas partes. Esto normalmente es una práctica segura, porque al ser una variable local, nada de fuera de la función puede acceder a ella. Y dentro de una función, el minifier reemplaza todo lo que la menciona. Los Minificadores son inteligentes, ellos analizan la estructura del código, por lo tanto, no rompen nada. No realizan un simple buscar y reemplazar.

Pero si new Function pudiera acceder a las variables externas, no podría encontrar la variable userName renombrada.

Si new Function tuviera acceso a variables externas, tendríamos problemas con los minificadores

Además, tal código sería una mala arquitectura y propensa a errores.

Para pasar algo a una función creada como new Function, debemos usar sus argumentos.

# `Funcion pura`

Una función pura es un tipo específico de función de producción-de-valores que no solo no tiene efectos secundarios pero que tampoco depende de los efectos secundarios de otro código—por ejemplo, no lee vinculaciones globales cuyos valores puedan cambiar. Una función pura tiene la propiedad agradable de que cuando se le llama con los mismos argumentos, siempre produce el mismo valor (y no hace nada más). Una llamada a tal función puede ser sustituida por su valor de retorno sin cambiar el significado del código. Cuando no estás seguro de que una función pura esté funcionando correctamente, puedes probarla simplemente llamándola, y saber que si funciona en ese contexto, funcionará en cualquier contexto. Las funciones no puras tienden a requerir más configuración para poder ser probadas.

## `Ejemplos`

```
function suma(a, b) {
  return a + b;
}
```

```
function longitud(arr) {
  return arr.length;
}
```

```
function cuadrado(n) {
  return n * n;
}
```

```
function concatena(a, b) {
  return a + b;
}
```

<h2 style='color: green'>Resumen</h2>

Una declaración de función se ve así:

```
function name(parámetros, delimitados, por, coma) {
  /* code */
}
```

- Los valores pasados a una función como parámetros se copian a sus variables locales.
- Una función puede acceder a variables externas. Pero funciona solo de adentro hacia afuera. El código fuera de la función no ve sus variables locales.
- Una función puede devolver un valor. Si no lo hace, entonces su resultado es undefined.
  Para que el código sea limpio y fácil de entender, se recomienda utilizar principalmente variables y parámetros locales en la función, no variables externas.

Siempre es más fácil entender una función que obtiene parámetros, trabaja con ellos y devuelve un resultado que una función que no obtiene parámetros, pero modifica las variables externas como un efecto secundario.

Nomenclatura de funciones:

- Un nombre debe describir claramente lo que hace la función. Cuando vemos una llamada a la función en el código, un buen nombre nos da al instante una comprensión de lo que hace y devuelve.
- Una función es una acción, por lo que los nombres de las funciones suelen ser verbales.
- Existen muchos prefijos de funciones bien conocidos como create…, show…, get…, check… y así. Úsalos para insinuar lo que hace una función.
- Las funciones son los principales bloques de construcción de los scripts. Ahora hemos cubierto los conceptos básicos, por lo que en realidad podemos comenzar a crearlos y usarlos. Pero ese es solo el comienzo del camino. Volveremos a ellos muchas veces, profundizando en sus funciones avanzadas.

[TOP](#funciones)
