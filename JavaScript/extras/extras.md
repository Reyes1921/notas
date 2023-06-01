[Volver al Menú](../root.md)

# `Estructura Sintactica`

## `Declaraciones`

Las declaraciones en JavaScript son sentencias que definen la creación de una variable, función o clase. Podríamos decir que las declaraciones son como las instrucciones que le damos a JavaScript para que haga algo.

Por ejemplo, una declaración de variable es una sentencia que le da un nombre y un valor a una variable. El siguiente código es un ejemplo de una declaración de variable:

```
let nombre = "Juan"
```

Este código no lo puedes usar con el método console.log, ya que no produce ningún valor. Si lo intentas, obtendrás un error:

```
console.log(let nombre = "Juan") // SyntaxError
```

## `Expresiones`

Unidades de codigo que producen un valor al ser evaluadas. Las expresiones en JavaScript son sentencias que producen un valor. Las expresiones pueden ser tan simples como un solo número o una cadena de texto, o tan complejas como el cálculo de una operación matemática, la evaluación de diferentes valores o la llamada a una función.

```
2 + 2 * 3 / 2

(Math.random() * (100 - 20)) + 20

functionCall()

window.history ? useHistory() : noHistoryFallback()

1+1, 2+2, 3+3

declaredVariable

true && functionCall()

true && declaredVariable
```

### `Expresiones Primarias / Palabras`

Cualquier palabra pequena que por si sola produzca un valor. Ejemplo los valores de tipo primitivo.

## `¿Por qué es importante la diferencia entre expresiones y declaraciones?`

La diferencia entre declaraciones y expresiones es importante ya que no podemos usar una declaración donde se espera una expresión y viceversa.

Por ejemplo, ya hemos conocido las estructuras de control if y while. Ambas esperan una expresión que se evalúa a un valor booleano. Por lo tanto, no podemos usar una declaración en su lugar:

```
// ❌ Ambos códigos están mal y sirven para
// ilustrar que no debes usar declaraciones
// cuando espera expresiones

if (let nombre = "Juan") { // ❌ SyntaxError
  console.log("Hola, Juan")
}

while (let i = 0) { // ❌ SyntaxError
  console.log("Iteración")
  i = i + 1
}
```


## `Sentencias(Statement) / Oraciones`

Acciones que son ejecutadas para que nuestro programa siga la logica que queremos.

## `These are all javascript statements:`

- if

- if-else

- while

- do-while

- for

- switch

- for-in

- with (deprecated)

- debugger

- variable declaration

# `Librerias para los Tests`

-En este tutorial estamos usando las siguientes librerías JavaScript para los tests:

- Mocha: El framework central: provee funciones para test comunes como describe e it y la función principal que ejecuta los tests.
- Chai: Una librería con muchas funciones de comprobación (assertions). Permite el uso de diferentes comprobaciones. De momento usaremos assert.equal.
- Sinon: Una librería para espiar funciones. Simula funciones incorporadas al lenguaje y mucho más. La necesitaremos a menudo más adelante.

# `Métodos en tipos primitivos`

Aquí el dilema que enfrentó el creador de JavaScript:

Hay muchas cosas que uno querría hacer con los tipos primitivos, como un string o un number. Sería grandioso accederlas usando métodos.
Los Primitivos deben ser tan rápidos y livianos como sea posible.
La solución es algo enrevesada, pero aquí está:

Los primitivos son aún primitivos. Con un valor único, como es deseable.
El lenguaje permite el acceso a métodos y propiedades de strings, numbers, booleans y symbols.
Para que esto funcione, se crea una envoltura especial, un “object wrapper” (objeto envoltorio) que provee la funcionalidad extra y luego es destruido.
Los “object wrappers” son diferentes para cada primitivo y son llamados: String, Number, Boolean, Symbol y BigInt. Así, proveen diferentes sets de métodos.

Los objetos siempre son true en un if

Los primitivos especiales null y undefined son excepciones. No tienen “wrapper objects” correspondientes y no proveen métodos. En ese sentido son “lo más primitivo”.

El intento de acceder a una propiedad de tal valor daría error:

alert(null.test); // error

# `Object.keys, values, entries`

Object.keys(obj) – devuelve un array de propiedades.

Object.values(obj) – devuelve un array de valores.

Object.entries(obj) – devuelve un array de pares [propiedad, valor].

# `Destructuring assignment`

## `Arrays`

```
let arr = ["John", "Smith"]

// asignación desestructurante
// fija firstName = arr[0]
// y surname = arr[1]
let [firstName, surname] = arr;

alert(firstName); // John
alert(surname);  // Smith
```

- Los elementos no deseados de un array también pueden ser descartados por medio de una coma extra:

```
let [firstName, , title] = ["Julius", "Caesar", "Consul", "of the Roman Republic"];
alert( title ); // Consul
```

- Podemos usar cualquier “asignable” en el lado izquierdo.

```
let user = {};
[user.name, user.surname] = "John Smith".split(' ');

alert(user.name); // John
alert(user.surname); // Smith
```

- Hay un conocido truco para intercambiar los valores de dos variables usando asignación desestructurante:

```
let guest = "Jane";
let admin = "Pete";

// Intercambiemos valores: hagamos guest=Pete, admin=Jane
[guest, admin] = [admin, guest];

alert(`${guest} ${admin}`); // Pete Jane (¡intercambiados con éxito!)
```

Aquí creamos un array temporal de dos variables e inmediatamente lo desestructuramos con el orden cambiado.

- Si queremos también obtener todo lo que sigue, podemos agregarle un parámetro que obtiene “el resto” usando puntos suspensivos “…”`:

```
let [name1, name2, ...rest] = ["Julius", "Caesar", "Consul", "of the Roman Republic"];

// `rest` es un array de ítems, comenzando en este caso por el tercero.
alert(rest[0]); // Consul
alert(rest[1]); // of the Roman Republic
alert(rest.length); // 2
```

- Si el array es más corto que la lista de variables a la izquierda, no habrá errores. Los valores ausentes son considerados undefined:

```
let [firstName, surname] = [];

alert(firstName); // undefined
alert(surname); // undefined
```

- Si queremos un valor “predeterminado” para reemplazar el valor faltante, podemos proporcionarlo utilizando =:

```
let [name = "Guest", surname = "Anonymous"] = ["Julius"];

alert(name);    // Julius (desde array)
alert(surname); // Anonymous (predeterminado utilizado)
```

## `Objetos`

```
let {var1, var2} = {var1:…, var2:…}
```

- Debemos tener un símil-objeto en el lado derecho, el que queremos separar en variables.

```
let options = {
  title: "Menu",
  width: 100,
  height: 200
};

let {title, width, height} = options;

alert(title);  // Menu
alert(width);  // 100
alert(height); // 200
```

- No importa el orden sino los nombres. Esto también funciona:

```
let {height, width, title} = { title: "Menu", height: 200, width: 100 }
```

- Si queremos asignar una propiedad a una variable con otro nombre, por ejemplo que options.width vaya en la variable llamada w, lo podemos establecer usando dos puntos:
- Para propiedades potencialmente faltantes podemos establecer valores predeterminados utilizando "=" al igual que el array.
- Al igual que con arrays o argumentos de función, los valores predeterminados pueden ser cualquier expresión e incluso llamados a función, las que serán evaluadas si el valor no ha sido proporcionado.
- Podemos usar el patrón resto de la misma forma que lo usamos con arrays. Esto no es soportado en algunos navegadores antiguos (para IE, use el polyfill Babel), pero funciona en los navegadores modernos.

```
let options = {
  title: "Menu",
  height: 200,
  width: 100
};

// title = propiedad llamada title
// rest = objeto con el resto de las propiedades
let {title, ...rest} = options;

// ahora title="Menu", rest={height: 200, width: 100}
alert(rest.height);  // 200
alert(rest.width);   // 100
```

## `Desestructuración anidada`

Si un objeto o array contiene objetos y arrays anidados, podemos utilizar patrones del lado izquierdo más complejos para extraer porciones más profundas.

```
let options = {
  size: {
    width: 100,
    height: 200
  },
  items: ["Cake", "Donut"],
  extra: true
};

// la asignación desestructurante fue dividida en varias líneas para mayor claridad
let {
  size: { // colocar tamaño aquí
    width,
    height
  },
  items: [item1, item2], // asignar ítems aquí
  title = "Menu" // no se encuentra en el objeto (se utiliza valor predeterminado)
} = options;

alert(title);  // Menu
alert(width);  // 100
alert(height); // 200
alert(item1);  // Cake
alert(item2);  // Donut
```

- También podemos usar desestructuración más compleja con objetos anidados y mapeo de dos puntos:

```
let options = {
  title: "My menu",
  items: ["Item1", "Item2"]
};

function showMenu({
  title = "Untitled",
  width: w = 100,  // width va a w
  height: h = 200, // height va a h
  items: [item1, item2] // el primer elemento de items va a item1, el segundo a item2
}) {
  alert( `${title} ${w} ${h}` ); // My Menu 100 200
  alert( item1 ); // Item1
  alert( item2 ); // Item2
}

showMenu(options);
```

- Por favor observe que tal desestructuración supone que showMenu() tiene un argumento. Si queremos todos los valores predeterminados, debemos especificar un objeto vacío:

```
showMenu({}); // ok, todos los valores son predeterminados

showMenu(); // esto daría un error
```

- Podemos solucionar esto, poniendo {} como valor predeterminado para todo el objeto de argumentos:

```
function showMenu({ title = "Menu", width = 100, height = 200 } = {}) {
  alert( `${title} ${width} ${height}` );
}

showMenu(); // Menu 100 200
```

# `Objeto Global`

- El objeto global contiene variables que deberían estar disponibles en todas partes.

- Eso incluye JavaScript incorporado, tales como Array y valores específicos del entorno, o como window.innerHeight: la altura de la ventana en el navegador.

- El objeto global tiene un nombre universal: globalThis.

- … Pero con mayor frecuencia se hace referencia a nombres específicos del entorno de la “vieja escuela”, como window (en el navegador) y global (en Node.js).

- Deberíamos almacenar valores en el objeto global solo si son verdaderamente globales para nuestro proyecto. Y manteniendo su uso al mínimo.

- En el navegador, a menos que estemos utilizando módulos, las funciones globales y las variables declaradas con var se convierten en propiedades del objeto global.

- Para que nuestro código esté preparado para el futuro y sea más fácil de entender, debemos acceder a las propiedades del objeto global directamente, como window.x.

# `Indicadores y descriptores de propiedad`

Como sabemos, los objetos pueden almacenar propiedades.

Hasta ahora, para nosotros una propiedad era un simple par “clave-valor”. Pero una propiedad de un objeto es algo más flexible y poderoso.

En este capítulo vamos a estudiar opciones adicionales de configuración, y en el siguiente veremos como convertirlas invisiblemente en funciones ‘getter/setter’ para obtener/asignar valores.

## `Indicadores de propiedad`

Las propiedades de objeto, aparte de un value, tienen tres atributos especiales (también llamados “indicadores”):

- `writable` – si es true, puede ser editado, de otra manera es de solo lectura.
- `enumerable` – si es true, puede ser listado en bucles, de otro modo no puede serlo.
- `configurable` – si es true, la propiedad puede ser borrada y estos atributos pueden ser modificados, de otra forma no.
  No los vimos hasta ahora porque generalmente no se muestran. Cuando creamos una propiedad “de la forma usual”, todos ellos son true. Pero podemos cambiarlos en cualquier momento.

Mas informacion [aqui](https://es.javascript.info/property-descriptors)

# `"Getters" y "setters" de propiedad`

Hay dos tipos de propiedades de objetos.

El primer tipo son las propiedades de datos. Ya sabemos cómo trabajar con ellas. Todas las propiedades que hemos estado usando hasta ahora eran propiedades de datos.

El segundo tipo de propiedades es algo nuevo. Son las propiedades de acceso o accessors. Son, en esencia, funciones que se ejecutan para obtener (“get”) y asignar (“set”) un valor, pero que para un código externo se ven como propiedades normales.

Mas informacion [aqui](https://es.javascript.info/property-accessors)

# `Currificación`

La Currificación es una técnica avanzada de trabajo con funciones. No solo se usa en JavaScript, sino también en otros lenguajes.

La currificación es una transformación de funciones que traduce una función invocable como ` f(a, b, c)` a invocable como `f(a)(b)(c)`.

La currificación no llama a una función. Simplemente la transforma.

Veamos primero un ejemplo, para comprender mejor de qué estamos hablando, y luego sus aplicaciones prácticas.

Crearemos una función auxiliar `curry(f)` que realice el curry para una f de dos argumentos. En otras palabras, `curry(f)` para dos argumentos `f(a, b)` lo traduce en una función que se ejecuta como `f(a)(b)`:

```
function curry(f) { // curry (f) realiza la transformación curry
  return function(a) {
    return function(b) {
      return f(a, b);
    };
  };
}

// uso
function sum(a, b) {
  return a + b;
}

let curriedSum = curry(sum);

alert( curriedSum(1)(2) ); // 3
```

Como se puede ver, la implementación es sencilla: son solo dos contenedores.

- El resultado de curry(func) es un contenedor function(a).

- Cuando se llama como curriedSum(1), el argumento se guarda en el entorno léxico y se devuelve un nuevo contenedor function(b).

- Luego se llama a este contenedor con 2 como argumento, y pasa la llamada a la función sum original.

Las implementaciones más avanzadas de currificación, como \_.curry de la librería lodash, devuelven un contenedor que permite llamar a una función de manera normal y parcial:

```
function sum(a, b) {
  return a + b;
}

let curriedSum = _.curry(sum); // usando _.curry desde la librería lodash

alert( curriedSum(1, 2) ); // 3, todavía se puede llamar normalmente
alert( curriedSum(1)(2) ); // 3, llamada parcial
```

[Mas Informacion](https://es.javascript.info/currying-partials)

<h2 style="color: green">Resumen</h2>

Currificación es una transformación que hace que f(a, b, c) sea invocable como f(a)(b)(c). Las implementaciones de JavaScript generalmente mantienen la función invocable normalmente y devuelven el parcial si el conteo de argumentos no es suficiente.

La currificación nos permite obtener parciales fácilmente. Como hemos visto en el ejemplo de registro, después de aplicar currificación a la función universal de tres argumentos log(fecha, importancia, mensaje) nos da parciales cuando se llama con un argumento (como log(fecha)) o dos argumentos (como log(fecha, importancia)).

# `Eval: ejecutando una cadena de código`

La función incorporada eval permite ejecutar una cadena de código.

La sintaxis es:

```
let result = eval(code);
```

Por ejemplo:

```
let code = 'alert("Hello")';
eval(code); // Hello
```

## `Usando “eval”`

En programación moderna `eval` es usado muy ocasionalmente. Se suele decir que “`eval` is evil” – juego de palabras en inglés que significa en español: “`eval` es malvado”.

La razón es simple: largo, largo tiempo atrás JavaScript era un lenguaje mucho más débil, muchas cosas podían ser concretadas solamente con `eval`. Pero aquel tiempo pasó hace una década.

Ahora casi no hay razones para usar `eval`. Si alguien lo está usando, hay buena chance de que pueda ser reemplazado con una construcción moderna del lenguaje o un Módulo JavaScript.

Por favor ten en cuenta que su habilidad para acceder a variables externas tiene efectos colaterales.

Los Code minifiers (minimizadores de código, herramientas usadas antes de poner JS en producción para comprimirlo) renombran las variables locales acortándolas (como a, b etc) para achicar el código. Usualmente esto es seguro, pero no si `eval` es usado porque las variables locales pueden ser accedidas desde la cadena de código `eval`uada. Por ello los minimizadores no hacen tal renombrado en todas las variables potencialmente visibles por `eval`. Esto afecta negativamente en el índice de compresión.

<h2 style="color: green">Resumen</h2>
Un llamado a eval(code) ejecuta la cadena de código y devuelve el resultado de la última sentencia.

- Es raramente usado en JavaScript moderno, y usualmente no es necesario.

- Puede acceder a variables locales externas. Esto es considerado una mala práctica.

- En su lugar, para evaluar el código en el entorno global, usa window.eval(code).

- O, si tu código necesita algunos datos de el entorno externo, usa new Function y pásalos como argumentos.

# `Tipo de Referencia`

[Mas Informacion](https://es.javascript.info/reference-type)

# `Unicode, String internals`

[Mas Informacion](https://es.javascript.info/unicode)

[TOP](#expresiones)
