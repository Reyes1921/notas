[Volver al Menú](../root.md)

# `Data Types`

**Hay 8 tipos de datos:**

**number** tanto para números de punto flotante como enteros

**bigint** para números enteros de largo arbitrario

**string** para textos

**boolean** para valores lógicos: true/false

**null** un tipo con el valor único null, que significa “vacío” o “no existe”

**undefined** un tipo con el valor único undefined, que significa “no asignado”

**object y symbol** para estructuras de datos complejas e identificadores únicos

Siete de ellos se denominan “primitivos”, porque sus valores contienen solo un dato (sea un string, un número o lo que sea).

Tipos de datos primitivos se comparan por su valor no tiene referencia son inmutables y los objetos si se comparan por referencia no por su valor.

Null es primitivo pero es de tipo objeto es decir es especial.

El operador typeof devuelve el tipo de un valor, con dos excepciones:

typeof null == "object" // error del lenguaje
typeof function(){} == "function" // las funciones son tratadas especialmente ya que tambien son un objeto

# `BigInt`

BigInt es un tipo numérico especial que provee soporte a enteros de tamaño arbitrario. (ES DECIR NUMEROS MUY GRANDES)

Un bigint se crea agregando n al final del literal entero o llamando a la función BigInt que crea bigints desde cadenas, números, etc.

```
const bigint = 1234567890123456789012345678901234567890n;

const sameBigint = BigInt("1234567890123456789012345678901234567890");

const bigintFromNumber = BigInt(10); // lo mismo que 10n
```

## `Operadores matemáticos`

BigInt puede ser usado mayormente como un número regular, por ejemplo:

```
alert(1n + 2n); // 3

alert(5n / 2n); // 2
```

Por favor, ten en cuenta: la división 5/2 devuelve el resultado redondeado a cero, sin la parte decimal. Todas las operaciones sobre bigints devuelven bigints.

`No podemos mezclar bigints con números regulares:`

`alert(1n + 2); // Error: No se puede mezclar BigInt y otros tipos.`

Podemos convertirlos explícitamente cuando es necesario: usando `BigInt()` o `Number()` como aquí:

```
let bigint = 1n;
let number = 2;

// De number a bigint
alert(bigint + BigInt(number)); // 3

// De bigint a number
alert(Number(bigint) + number); // 3
```

Las operaciones de conversión siempre son silenciosas, nunca dan error, pero si el bigint es tan gigante que no podrá ajustarse al tipo numérico, los bits extra serán recortados, entonces deberíamos ser cuidadosos al hacer tal conversión.

## `Comparaciones`

Comparaciones tales como `<, >` funcionan bien entre bigints y numbers:

Por favor, nota que como number y bigint pertenecen a diferentes tipos, ellos pueden ser iguales ==, pero no estrictamente iguales ===:

## `Operaciones booleanas`

Cuando están dentro de un if u otra operación booleana, los bigints se comportan como numbers.

# `Strings`

```
No poseen metodos o propiedades, se comparan por valor y son inmutables.

let single = 'comillas simples';
let double = "comillas dobles";
let backticks = `backticks`;

let guestList = `Invitados:
 * Juan
 * Pedro
 * Maria
`;

alert(guestList); // una lista de invitados, en múltiples líneas

let str1 = "Hello\nWorld"; // dos líneas usando el "símbolo de nueva línea"
```

## `Largo del string`

```
alert(`Mi\n`.length); // 3
```

Por favor notar que str.length es una propiedad numérica, no una función.
No hay necesidad de agregar un paréntesis después de ella.

## `Accediendo caracteres:`

Para acceder a un carácter en la posición pos, se debe usar corchetes, `[pos]`, o llamar al método str.at(pos). El primer carácter comienza desde la posición cero:

```
let str = `Hola`;

// el primer carácter
alert( str[0] ); // H
alert( str.at(0) ); // H

// el último carácter
alert( str[str.length - 1] ); // a
alert( str.at(-1) );
```

Como puedes ver, el método `.at(pos)` tiene el beneficio de permitir una posición negativa. Si pos es negativa, se cuenta desde el final del string.

Así, `.at(-1)` significa el último carácter, y `.at(-2)` es el anterior a él, etc.

Los corchetes siempre devuelven undefined para índices negativos:

```
let str = `Hola`;

alert( str[-2] ); // undefined
alert( str.at(-2) ); // l
```

Podemos además iterar sobre los caracteres usando for..of:

```
for (let char of 'Hola') {
  alert(char); // H,o,l,a (char se convierte en "H", luego "o", luego "l" etc)
}
```

## `Los strings son inmutables`

Los strings no pueden ser modificados en JavaScript. Es imposible modificar un carácter.

Intentémoslo para demostrar que no funciona:

```
let str = 'Hola';

str[0] = 'h'; // error
alert(str[0]); // no funciona
```

## `Cambiando capitalización`

Cambiando mayúsculas y minúsculas
Los métodos toLowerCase() y toUpperCase() cambian los caracteres a minúscula y mayúscula respectivamente:

```
alert('Interfaz'.toUpperCase()); // INTERFAZ
alert('Interfaz'.toLowerCase()); // interfaz
```

## `Buscando una subcadena de caracteres`

`str.indexOf`

El primer método es str.indexOf(substr, pos).

Este busca un substr en str, comenzando desde la posición entregada pos, y retorna la posición donde es encontrada la coincidencia o -1 en caso de no encontrar nada.

Por ejemplo:

```
let str = 'Widget con id';
alert(str.indexOf('Widget')); // 0, ya que 'Widget' es encontrado al comienzo
alert(str.indexOf('widget')); // -1, no es encontrado, la búsqueda toma en cuenta minúsculas y mayúsculas.
alert(str.indexOf('id')); // 1, "id" es encontrado en la posición 1 (..idget con id)
```

`str.lastIndexOf(substr, position)`

Existe también un método similar str.lastIndexOf(substr, position) que busca desde el final del string hasta el comienzo.

Este imprimirá las ocurrencias en orden invertido.

`includes, startsWith, endsWith`

El método más moderno str.includes(substr, pos) retorna true/false dependiendo si str contiene substr dentro.
Es la opción correcta, si lo que necesitamos es encontrar el substr pero no necesitamos su posición.

```
alert('Widget con id'.includes('Widget')); // true
alert('Hola'.includes('Adiós')); // false
```

Los métodos str.startsWith (comienza con) y str.endsWith (termina con) hacen exactamente lo que dicen:

```
alert( "Widget".startsWith("Wid") ); // true, "Widget" comienza con "Wid"
alert( "Widget".endsWith("get") ); // true, "Widget" termina con "get"
```

Obteniendo un substring
Existen 3 métodos en JavaScript para obtener un substring: substring, substr y slice.

`str.slice(comienzo [, final]):`

Retorna la parte del string desde comienzo hasta (pero sin incluir) final.

Por ejemplo:

```
let str = "stringify";
alert( str.slice(0, 5) ); // 'strin', el substring desde 0 hasta 5 (sin incluir 5)
alert( str.slice(0, 1) ); // 's', desde 0 hasta 1, pero sin incluir 1, por lo que sólo el carácter en 0
```

`str.substring(comienzo [, final]):`

Devuelve la parte del string entre comienzo y final.

Esto es casi lo mismo que slice, pero permite que comienzo sea mayor que final.
Por ejemplo:

```
let str = "stringify";

// esto es lo mismo para substring
alert( str.substring(2, 6) ); // "ring"
alert( str.substring(6, 2) ); // "ring"

// ...pero no para slice:
alert( str.slice(2, 6) ); // "ring" (lo mismo)
alert( str.slice(6, 2) ); // "" (un string vacío)
```

`str.substr(comienzo [, largo]):`

Retorna la parte del string desde comienzo, con el largo dado.
A diferencia de los métodos anteriores, este nos permite especificar el largo en lugar de la posición final:

```
let str = "stringify";
alert( str.substr(2, 4) ); // ring, desde la 2nda posición toma 4 caracteres
```

El primer argumento puede ser negativo, para contar desde el final:

```
let str = "stringify";
alert( str.substr(-4, 2) ); // gi, desde la 4ta posición toma 2 caracteres
```

## `Comparando strings`

Una letra minúscula es siempre mayor que una mayúscula:

```
alert('a' > 'Z'); // true
```

Letras con marcas diacríticas están “fuera de orden”:

```
alert('Österreich' > 'Zealand'); // true

let str = '';

for (let i = 65; i <= 220; i++) {
  str += String.fromCodePoint(i);
}
alert(str);
// ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyz{|}~
// ¡¢£¤¥¦§¨©ª«¬­®¯°±²³´µ¶·¸¹º»¼½¾¿ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÚÛÜ
```

¿Lo ves? Caracteres capitalizados (mayúsculas) van primero, luego unos cuantos caracteres especiales, luego las minúsculas.

Ahora se vuelve obvio por qué a > Z.

Todas las letras minúsculas van después de las mayúsculas ya que sus códigos son mayores.
Algunas letras como Ö se mantienen apartadas del alfabeto principal. Aquí el código es mayor que cualquiera desde a hasta z.

- Existen 3 tipos de entrecomillado. Los backticks permiten que una cadena abarque varias líneas e incorporar expresiones ${…}.
- Strings en JavaScript son codificados usando UTF-16.
- Podemos usar caracteres especiales como \n e insertar letras por su código único usando \u ....
- Para obtener un carácter, usa: [].
- Para obtener un substring, usa: slice o substring.
- Para convertir un string en minúsculas/mayúsculas, usa: toLowerCase/toUpperCase.
- Para buscar por un substring, usa: indexOf, o includes/startsWith/endsWith para chequeos simples.
- Para comparar strings de acuerdo al lenguaje, usa: localeCompare, de otra manera serán comparados como códigos de carácter.

Existen varios otros métodos útiles en cadenas:

- str.trim() – remueve (“recorta”) espacios desde el comienzo y final de un string.

- str.repeat(n) – repite el string n veces.

What String.raw actually does is taking a template literal, processing all substitutions (${variable}, e.g.), but ignoring well-known escape-sequences.

```
const str = String.raw`${varOne}\t\n${varTwo}` // => "Hey\t\nthere"
```

# `Numeros`

En JavaScript moderno, hay dos tipos de números:

Los números regulares en JavaScript son almacenados con el formato de 64-bit IEEE-754, conocido como “números de doble precisión de coma flotante”.
Estos números son los que estaremos usando la mayor parte del tiempo, y hablaremos de ellos en este capítulo.

Los números BigInt representan enteros de longitud arbitraria.
A veces son necesarios porque un número regular no puede exceder 253 ni ser menor a -253 manteniendo la precisión, algo que mencionamos antes en el capítulo Tipos de datos.
Como los bigints son usados en algunas áreas especiales, les dedicamos un capítulo especial BigInt.

También podemos usar guion bajo \_ como separador:

`let billion = 1_000_000_000;`
Aquí `_` es “azúcar sintáctica”, hace el número más legible. El motor JavaScript simplemente ignora `_` entre dígitos, así que es exactamente igual al “billion” de más arriba.

En JavaScript, acortamos un número agregando la letra "`e`" y especificando la cantidad de ceros:

`let billion = 1e9;` // 1 billion, literalmente: 1 y 9 ceros

`alert( 7.3e9 ); ` // 7.3 billions (tanto 7300000000 como 7_300_000_000)

Ahora escribamos algo muy pequeño. Digamos 1 microsegundo (un millonésimo de segundo):

`let mсs = 0.000001;`

Igual que antes, el uso de "e" puede ayudar. Si queremos evitar la escritura de ceros explícitamente, podríamos expresar lo mismo como:

`let mcs = 1e-6;` // cinco ceros a la izquierda de 1

Si contamos los ceros en 0.000001, hay 6 de ellos en total. Entonces naturalmente es 1e-6.

`1.23e6 === 1.23 * 1000000;` // e6 significa \*1000000

`1.23e-6 === 1.23 / 1000000;` // 0.00000123

Los sistemas binario y octal son raramente usados, pero también soportados mediante el uso de los prefijos 0b y 0o:

`let a = 0b11111111;` // binario de 255

`let b = 0o377; //` octal de 255

`alert( a == b );` // true, el mismo número 255 en ambos lados

Dos puntos para llamar un método
Por favor observa que los dos puntos en `123456..toString(36`) no son un error tipográfico. Si queremos llamar un método directamente sobre el número, como toString del ejemplo anterior, necesitamos ubicar los dos puntos .. tras él.

Si pusiéramos un único punto: `123456.toString(36)`, habría un error, porque la sintaxis de JavaScript implica una parte decimal después del primer punto. Al poner un punto más, JavaScript reconoce que la parte decimal está vacía y luego va el método.

También podríamos escribir `(123456).toString(36)`.

El método toFixed(n) redondea el número a n dígitos después del punto decimal y devuelve una cadena que representa el resultado.

```
let num = 12.34;
alert( num.toFixed(1) ); // "12.3"
```

```
alert( 0.1 + 0.2 == 0.3 ); // false
```

Es así, al comprobar si la suma de 0.1 y 0.2 es 0.3, obtenemos false.
This is not a JavaScript quirk but actually based on floating point arithmetic.

¡Qué extraño! ¿Qué es si no 0.3?

Un número es almacenado en memoria en su forma binaria, una secuencia de bits, unos y ceros.
Pero decimales como 0.1, 0.2 que se ven simples en el sistema decimal son realmente fracciones sin fin en su forma binaria.

Simplemente no hay manera de guardar exactamente 0.1 o exactamente 0.2 usando el sistema binario,
así como no hay manera de guardar un tercio en fracción decimal.

`parseInt('5e-7');    // => 5`
Floats smaller than 10-6 (e.g. 0.0000005 which is same as 5\*10-7) conversed to a string are written in the exponential notation (e.g. 5e-7 is the exponential notation of 0.0000005).
That's why using such small floats with parseInt() leads to unexpected results: only the significat part (e.g. 5 of 5e-7) of the exponential notiation is parsed.

```
alert( isNaN(NaN) ); // true
alert( isNaN("str") ); // true

alert( isFinite("15") ); // true
alert( isFinite("str") ); // false, porque es un valor especial: NaN
alert( isFinite(Infinity) ); // false, porque es un valor especial: Infinity

alert( parseInt('100px') ); // 100
alert( parseFloat('12.5em') ); // 12.5

alert( parseInt('12.3') ); // 12, devuelve solo la parte entera
alert( parseFloat('12.3.4') ); // 12.3, el segundo punto detiene la lectura
```

- Math.floor /piso
- Math.ceil /cielo
- Math.round /mas cerca
- Math.trunc /ninguno
- Math.random() /aleatorio
- Math.max() /maximo const arr = [1, 2, 3]; const max = Math.max(...arr);
- Math.min() /minimo
- Math.pow() /potencia
- Math.abs() /retorna el valor absoluto de un número
  -5 -4 -3 -2 -1 0 1 2 3 4 5

# `Symbol`

Según la especificación, solo dos de los tipos primitivos pueden servir como clave de propiedad de objetos:

string, o
symbol.

Un symbol es un “valor primitivo único” con una descripción opcional, se usa para crear valores unicos e irrepetibles.

Se crean de la siguiente manera

```
let id = Symbol();
```

Al crearlo, podemos agregarle una descripción (también llamada symbol name), que será útil en la depuración de código:

```
// id es un symbol con la descripción "id"
let id = Symbol("id");
```

Cada valor unico es unico, incluso si tienen la misma descripción.

Se garantiza que los símbolos son únicos. Aunque declaremos varios Symbols con la misma descripción, éstos tendrán valores distintos. La descripción es solamente una etiqueta que no afecta nada más.

Por ejemplo, aquí hay dos Symbols con la misma descripción… pero no son iguales:

```
let id1 = Symbol("id");
let id2 = Symbol("id");

alert(id1 == id2); // false
```

## `Claves “Ocultas”`

Los Symbols nos permiten crear propiedades “ocultas” en un objeto, a las cuales ninguna otra parte del código puede accesar ni sobrescribir accidentalmente.

Si queremos usar un Symbol en un objeto literal, debemos usar llaves.

```
 let user = {
  name: "John",
  [id]: 123 // no "id": 123
};
```

Las claves de Symbol no participan dentro de los ciclos for..in.

## `Symbols Globales`

Como hemos visto, normalmente todos los Symbols son diferentes aunque tengan el mismo nombre. Pero algunas veces necesitamos que symbols con el mismo nombre sean la misma entidad.

Para lograr esto, existe un global symbol registry. Ahí podemos crear symbols y accesarlos después, lo cual nos garantiza que cada vez que se acceda a la clave con el mismo nombre, esta te devuelva exactamente el mismo symbol.

Para crear u accesar a un symbol en el registro global, usa Symbol.for(key).

Esta llamada revisa el registro global, y si existe un symbol descrito como key, lo retornará; de lo contrario creará un nuevo symbol Symbol(key) y lo almacenará en el registro con el key dado.

Por ejemplo:

```
// leer desde el registro global
let id = Symbol.for("id"); // si el símbolo no existe, se crea

// léelo nuevamente (tal vez de otra parte del código)
let idAgain = Symbol.for("id");

// el mismo symbol
alert( id === idAgain ); // true
```

Los Symbols dentro de este registro son llamados global symbols y están disponibles y al alcance de todo el código en la aplicación.

## `System symbols`

Existen varios symbols del sistema que JavaScript utiliza internamente, y que podemos usar para ajustar varios aspectos de nuestros objetos.

Se encuentran listados en Well-known symbols :

- Symbol.hasInstance
- Symbol.isConcatSpreadable
- Symbol.iterator
- Symbol.toPrimitive

…y así.
Por ejemplo, Symbol.toPrimitive nos permite describir el objeto para su conversión primitiva.

<h2 style='color: green'>Resumen</h2>

Symbol es un tipo de dato primitivo para identificadores únicos.

Symbols son creados al llamar Symbol() con una descripción opcional.

Symbols son siempre valores distintos aunque tengan el mismo nombre. Si queremos que symbols con el mismo nombre tengan el mismo valor, entonces debemos guardarlos en el registro global: Symbol.for(key) retornará un symbol (en caso de no existir, lo creará) con el key como su nombre. Todas las llamadas de Symbol.for con ese nombre retornarán siempre el mismo symbol.

Symbols se utilizan principalmente en dos casos:

- Propiedades de objeto “Ocultas”

Si queremos agregar una propiedad a un objeto que “pertenece” a otro script u otra librería, podemos crear un symbol y usarlo como clave. Una clave symbol no aparecerá en los ciclos for..in, por lo que no podrá ser procesada accidentalmente junto con las demás propiedades. Tampoco puede ser accesada directamente, porque un script ajeno no tiene nuestro symbol. Por lo tanto la propiedad estará protegida contra uso y escritura accidentales.

Podemos “ocultar” ciertos valores dentro de un objeto que solo estarán disponibles dentro de ese script usando las claves de symbol.

- Existen diversos symbols del sistema que utiliza Javascript, a los cuales podemos accesar por medio de Symbol.\*. Podemos usarlos para alterar algunos comportamientos. Por ejemplo, más adelante en el tutorial, usaremos Symbol.iterator para iterables, Symbol.toPrimitive para configurar object-to-primitive conversion.

Técnicamente, los symbols no están 100% ocultos. Existe un método incorporado Object.getOwnPropertySymbols(obj) que nos permite obtener todos los symbols. También existe un método llamado Reflect.ownKeys(obj) que devuelve todas las claves de un objeto, incluyendo las que son de tipo symbol. Pero la mayoría de las librerías, los métodos incorporados y las construcciones de sintaxis no usan estos métodos.

# `Objetos`

```
let user = new Object(); // sintaxis de "constructor de objetos"
let user = {};  // sintaxis de "objeto literal"
```

Agregar
`user.isAdmin = true;`

Eliminar
`delete user.age;`

-También podemos nombrar propiedades con más de una palabra. Pero, de ser así, debemos colocar la clave entre comillas "...":

```
let user = {
  name: "John",
  age: 30,
  "likes birds": true  // Las claves con más de una palabra deben ir entre comillas
};
```

-La notación de punto no funciona para acceder a propiedades con claves de más de una palabra:

Esto nos daría un error de sintaxis `user.likes birds = true`

<h2 style="color: red">Nota</h2>

The main difference between using obj.prop and obj[prop] is that the former requires the property name to be a valid identifier, while the latter allows you to use any string value as an index. This means that with obj.prop you can only access properties that have valid identifier names, such as 'foo' or 'bar', while with obj[prop] you can use any string value as an index, such as '1' or 'some string'. Additionally, the bracket notation allows you to access properties whose names are stored in variables, which is not possible with the dot notation.

-Referencias de objetos y copia
Una de las diferencias fundamentales entre objetos y primitivos es que los objetos son almacenados y copiados “por referencia”,
en cambio los primitivos: strings, number, boolean, etc.; son asignados y copiados “como un valor completo”.

-Comparación por referencia
Dos objetos son iguales solamente si ellos son el mismo objeto.

Por ejemplo, aquí a y b tienen referencias al mismo objeto, por lo tanto son iguales:

```
let a = {};
let b = a; // copia la referencia

alert( a == b ); // true, verdadero. Ambas variables hacen referencia al mismo objeto
alert( a === b ); // true
```

-“this” en métodos
Es común que un método de objeto necesite acceder a la información almacenada en el objeto para cumplir su tarea.
Por ejemplo, el código dentro de user.sayHi() puede necesitar el nombre del usuario user.
Para acceder al objeto, un método puede usar la palabra clave this.
El valor de this es el objeto “antes del punto”, el usado para llamar al método.

-“this” no es vinculado
En JavaScript, la palabra clave this se comporta de manera distinta a la mayoría de otros lenguajes de programación. Puede ser usado en cualquier función, incluso si no es el método de un objeto.

No hay error de sintaxis en el siguiente ejemplo:

```
function sayHi() {
  alert( this.name );
}
```

## `La prueba de propiedad existente, el operador “in”`

La sintaxis es:

```
"key" in object
```

Por ejemplo:

```
let user = { name: "John", age: 30 };

alert( "age" in user );    // mostrará "true", porque user.age sí existe
alert( "blabla" in user ); // mostrará false, porque user.blabla no existe
```

## `Clonación y mezcla, Object.assign`

Entonces copiar una variable de objeto crea una referencia adicional al mismo objeto.

Pero ¿y si necesitamos duplicar un objeto?

Podemos crear un nuevo objeto y replicar la estructura del existente iterando a través de sus propiedades y copiándolas en el nivel primitivo.

Como esto:

```
let user = {
  name: "John",
  age: 30
};

let clone = {}; // el nuevo objeto vacío

// copiemos todas las propiedades de user en él
for (let key in user) {
  clone[key] = user[key];
}

// ahora clone es un objeto totalmente independiente con el mismo contenido
clone.name = "Pete"; // cambiamos datos en él

alert( user.name ); // John aún está en el objeto original
```

También podemos usar el método Object.assign.

La sintaxis es:

```
Object.assign(dest, ...sources)
```

El primer argumento dest es el objeto destinatario.
Los argumentos que siguen son una lista de objetos fuentes.
Esto copia las propiedades de todos los objetos fuentes dentro del destino dest y lo devuelve como resultado

Por ejemplo, tenemos el objeto user, agreguemos un par de permisos:

```
let user = { name: "John" };

let permissions1 = { canView: true };
let permissions2 = { canEdit: true };

// copia todas las propiedades desde permissions1 y permissions2 en user
Object.assign(user, permissions1, permissions2);

// ahora es user = { name: "John", canView: true, canEdit: true }
alert(user.name); // John
alert(user.canView); // true
alert(user.canEdit); // true
```

Si la propiedad por copiar ya existe, se sobrescribe:

```
let user = { name: "John" };

Object.assign(user, { name: "Pete" });

alert(user.name); // ahora user = { name: "Pete" }
```

También podemos usar Object.assign para hacer una clonación simple:

```
let user = {
  name: "John",
  age: 30
};

let clone = Object.assign({}, user);

alert(clone.name); // John
alert(clone.age); // 30
```

Aquí, copia todas las propiedades de user en un objeto vacío y lo devuelve.

También hay otras formas de clonar un objeto, por ejemplo usando la sintaxis spread clone = {...user}, cubierto más adelante en el tutorial.

## `Funcion constructora`

La función constructora es técnicamente una función normal. Aunque hay dos convenciones:

Son nombradas con la primera letra mayúscula.
Sólo deben ejecutarse con el operador "new".
Por ejemplo:

```
function User(name) {
  this.name = name;
  this.isAdmin = false;
}

let user = new User("Jack");

alert(user.name); // Jack
alert(user.isAdmin); // false
```

Tomemos nota otra vez: técnicamente cualquier función (excepto las de flecha pues no tienen this) puede ser utilizada como constructor.
Puede ser llamada con new, y ejecutará el algoritmo de arriba.
La “primera letra mayúscula” es un acuerdo general, para dejar en claro que la función debe ser ejecutada con new.

Si tenemos muchas líneas de código todas sobre la creación de un único objeto complejo, podemos agruparlas en un constructor de función que es llamado inmediatamente de esta manera:

Crea una función e inmediatamente la llama con new

```
let user = new function() {
  this.name = "John";
  this.isAdmin = false;

  // ...otro código para creación de usuario
  // tal vez lógica compleja y sentencias
  // variables locales etc
};
```

Este constructor no puede ser llamado de nuevo porque no es guardado en ninguna parte, sólo es creado y llamado. Por lo tanto este truco apunta a encapsular el código que construye el objeto individual, sin reutilización futura.

Normalmente, los constructores no tienen una sentencia return. Su tarea es escribir todo lo necesario al this, y automáticamente este se convierte en el resultado.

Pero si hay una sentencia return, entonces la regla es simple:

Si return es llamado con un objeto, entonces se devuelve tal objeto en vez de this.
Si return es llamado con un tipo de dato primitivo, es ignorado.
En otras palabras, return con un objeto devuelve ese objeto, en todos los demás casos se devuelve this.

Por ejemplo, aquí return anula this al devolver un objeto:

```
function BigUser() {

  this.name = "John";

  return { name: "Godzilla" };  // <-- devuelve este objeto
}

alert( new BigUser().name );  // Godzilla, recibió ese objeto
```

Y aquí un ejemplo con un return vacío (o podemos colocar un primitivo después de él, no importa):

```
function SmallUser() {

  this.name = "John";

  return; // <-- devuelve this
}

alert( new SmallUser().name );  // John
```

Normalmente los constructores no tienen una sentencia return. Aquí mencionamos el comportamiento especial con devolución de objetos principalmente por el bien de la integridad.

Por cierto, podemos omitir paréntesis después de new, si no tiene argumentos:

```
let user = new User; // <-- sin paréntesis
// lo mismo que
let user = new User();
```

Omitir paréntesis aquí no se considera “buen estilo”, pero la especificación permite esa sintaxis.

### `Encadenamiento opcional '?.'`

El encadenamiento opcional ?. es una forma a prueba de errores para acceder a las propiedades anidadas de los objetos, incluso si no existe una propiedad intermedia.

En otras palabras, value?.prop:

funciona como value.prop si value existe,
de otro modo (cuando value es undefined/null) devuelve undefined.
Aquí está la forma segura de acceder a user.address.street usando ?.:

```
let user = {}; // El usuario no tiene dirección

alert( user?.address?.street ); // undefined (no hay error)
```

Deberíamos usar ?. solo donde está bien que algo no exista.

Por ejemplo, si de acuerdo con la lógica de nuestro código, el objeto user debe existir, pero address es opcional, entonces deberíamos escribir ` user.address?.street` y no `user?.address?.street. `

De esta forma, si por un error user no está definido, lo sabremos y lo arreglaremos. De lo contrario, los errores de codificación pueden silenciarse donde no sea apropiado y volverse más difíciles de depurar.

Otros casos: ?.(), ?.[]
El encadenamiento opcional ?. no es un operador, es una construcción de sintaxis especial que también funciona con funciones y corchetes.

Por ejemplo, ?.() se usa para llamar a una función que puede no existir.

```
let userAdmin = {
  admin() {
    alert("I am admin");
  }
};

let userGuest = {};

userAdmin.admin?.(); // I am admin

userGuest.admin?.(); // no pasa nada (no existe tal método)
```

La sintaxis de encadenamiento opcional ?. tiene tres formas:

obj?.prop – devuelve obj.prop si obj existe, si no, undefined.
obj?.[prop] – devuelve obj[prop] si obj existe, si no, undefined.
obj.method?.() – llama a obj.method() si obj.method existe, si no devuelve undefined.

## `Prototipos y herencia (delegacion de objeto)`

### `Herencia prototípica`

En programación, a menudo queremos tomar algo y extenderlo.

Por ejemplo: tenemos un objeto user con sus propiedades y métodos, y queremos hacer que admin y guest sean variantes ligeramente modificadas del mismo. Nos gustaría reutilizar lo que tenemos en user; no queremos copiar ni reimplementar sus métodos, sino solamente construir un nuevo objeto encima del existente.

En JavaScript, los objetos tienen una propiedad oculta especial `[[Prototype]]` (como se menciona en la especificación); que puede ser null, o hacer referencia a otro objeto llamado “prototipo”:

Cuando leemos una propiedad de object, si JavaScript no la encuentra allí la toma automáticamente del prototipo. En programación esto se llama “herencia prototípica”.

La propiedad [[Prototype]] es interna y está oculta, pero hay muchas formas de configurarla.

Una de ellas es usar el nombre especial **proto**, así:

<h2 style='color: green'>Resumen</h2>

- En JavaScript, todos los objetos tienen una propiedad oculta [[Prototype]] que es: otro objeto, o null.
- Podemos usar obj.**proto** para acceder a ella (un getter/setter histórico, también hay otras formas que se cubrirán pronto).
- El objeto al que hace referencia [[Prototype]] se denomina “prototipo”.
- Si en obj queremos leer una propiedad o llamar a un método que no existen, entonces JavaScript intenta encontrarlos en el prototipo.
- Las operaciones de escritura/eliminación actúan directamente sobre el objeto, no usan el prototipo (suponiendo que sea una propiedad de datos, no un setter).
- Si llamamos a obj.method(), y method se toma del prototipo, this todavía hace referencia a obj. Por lo tanto, los métodos siempre funcionan con el objeto actual, incluso si se heredan.
- El bucle for..in itera sobre las propiedades propias y heredadas. Todos los demás métodos de obtención de valor/clave solo operan en el objeto mismo.

### `F.prototype`

[mas informacion](https://es.javascript.info/function-prototype)

### `Prototipos nativos`

La propiedad "prototype" es ampliamente utilizada por el núcleo de JavaScript mismo. Todas las funciones de constructor integradas lo usan.

<img src="native-prototypes-classes.svg" width="600">

<h2 style='color: green'>Resumen</h2>

- Todos los objetos integrados siguen el mismo patrón:
- Los métodos se almacenan en el prototipo (Array.prototype, Object.prototype, Date.prototype, etc.)
- El objeto en sí solo almacena los datos (elementos de arreglo, propiedades de objeto, la fecha)
- Los primitivos también almacenan métodos en prototipos de objetos contenedores: Number.prototype, String.prototype y Boolean.prototype. Solo undefined y null no tienen objetos contenedores.
- Los prototipos integrados se pueden modificar o completar con nuevos métodos. Pero no se recomienda cambiarlos. El único caso permitido es probablemente cuando agregamos un nuevo estándar que aún no es soportado por el motor de JavaScript.

### `Métodos prototipo, objetos sin __proto__`

- Para crear un objeto con un prototipo dado, use:

1. sintaxis literal: { **proto**: ... }, permite especificar multiples propiedades
2. o Object.create(proto, [descriptors]), permite especificar descriptores de propiedad.
   El Object.create brinda una forma fácil de hacer la copia superficial de un objeto con todos sus descriptores:

```
let clone = Object.create(Object.getPrototypeOf(obj), Object.getOwnPropertyDescriptors(obj));
```

- Los métodos modernos para obtener y establecer el prototipo son:

1. `Object.getPrototypeOf(obj)` – devuelve el [[Prototype]] de obj (igual que el getter de **proto**).

2. `Object.setPrototypeOf(obj, proto)` – establece el [[Prototype]] de obj en proto (igual que el setter de **proto**).

- No está recomendado obtener y establecer el prototipo usando los getter/setter nativos de **proto**. Ahora están en el Anexo B de la especificación.

- También hemos cubierto objetos sin prototipo, creados con Object.create(null) o {**proto**: null}.

Estos objetos son usados como diccionarios, para almacenar cualquier (posiblemente generadas por el usuario) clave.

- Normalmente, los objetos heredan métodos nativos y getter/setter de **proto** desde Object.prototype, haciendo sus claves correspondientes “ocupadas” y potencialmente causar efectos secundarios. Con el prototipo null, los objetos están verdaderamente vacíos.

## `Built-in objects`

Built-in objects, or "global objects", are those built into the language specification itself. There are numerous built-in objects with the JavaScript language, all of which are accessible at the global scope. Some examples are:

**-Number**

**-Math**

**-Date**: Este objeto almacena la fecha, la hora, y brinda métodos para administrarlas. Por ejemplo, podemos usarlo para almacenar horas de creación o modificación, medir tiempo, o simplemente mostrar en pantalla la fecha actual.

-Creación
Para crear un nuevo objeto Date se lo instancia con new Date() junto con uno de los siguientes argumentos `new Date()`

Sin argumentos – crea un objeto Date para la fecha y la hora actuales:

```
let now = new Date();
alert( now ); // muestra en pantalla la fecha y la hora actuales
```

`new Date(año, mes, fecha, horas, minutos, segundos, ms)`

Crea una fecha con los componentes pasados como argumentos en la zona horaria local. Sólo los primeros dos parámetros son obligatorios.

El año debería tener 4 dígitos. Por compatibilidad, aquí 2 dígitos serán considerados ‘19xx’, pero 4 dígitos es lo firmemente sugerido.
La cuenta del mes comienza desde el 0 (enero), y termina en el 11 (diciembre).
El parámetro fecha efectivamente es el día del mes, si está ausente se asume su valor en 1.
Si los parámetros horas/minutos/segundos/ms están ausentes, se asumen sus valores iguales a 0.

```
new Date(2011, 0, 1, 0, 0, 0, 0); // 1 Jan 2011, 00:00:00
new Date(2011, 0, 1); // Igual que la línea de arriba, sólo que a los últimos 4 parámetros se les asigna '0' por defecto.
```

Acceso a los componentes de la fecha
Existen métodos que sirven para obtener el año, el mes, y los demás componentes a partir de un objeto de tipo Date:

- getFullYear(): Devuelve el año (4 dígitos)
- getMonth(): Devuelve el mes, de 0 a 11.
- getDate(): Devuelve el día del mes desde 1 a 31. Nótese que el nombre del método no es muy intuitivo.
- getHours(), getMinutes(), getSeconds(), getMilliseconds(): Devuelve los componentes del horario correspondientes.
- getDay(): Devuelve el día de la semana, partiendo de 0 (Domingo) hasta 6 (Sábado). El primer día siempre es el Domingo. Por más que en algunos países no sea así, no se puede modificar.

Todos los métodos mencionados anteriormente devuelven los componentes correspondientes a la zona horaria local.

También existen sus contrapartes UTC, que devuelven el día, mes, año, y demás componentes, para la zona horaria UTC+0: getUTCFullYear(), getUTCMonth(), getUTCDay(). Solo debemos agregarle el "UTC" justo después de "get".

- getTime()
  Devuelve el timestamp para una fecha determinada – cantidad de milisegundos transcurridos a partir del 1° de Enero de 1970 UTC+0.

- getTimezoneOffset()
  Devuelve la diferencia entre UTC y el huso horario de la zona actual, en minutos:

-Estableciendo los componentes de la fecha
Los siguientes métodos permiten establecer los componentes de fecha y hora:

- setFullYear(year, [month], [date])
- setMonth(month, [date])
- setDate(date)
- setHours(hour, [min], [sec], [ms])
- setMinutes(min, [sec], [ms])
- setSeconds(sec, [ms])
- setMilliseconds(ms)
- setTime(milliseconds) (Establece la cantidad de segundos transcurridos desde 01.01.1970 GMT+0)

A excepción de setTime(), todos los demás métodos poseen una variante UTC, por ejemplo: setUTCHours().

Como podemos ver, algunos métodos nos permiten fijar varios componentes al mismo tiempo, por ej. setHours. Los componentes que no son mencionados no se modifican.

-`Autocorrección`: La autocorrección es una característica muy útil de los objetos Date. Podemos fijar valores fuera de rango, y se ajustarán automáticamente.

-`Date.now()`: Podemos utilizar el método especial Date.now() que nos devuelve el timestamp actual.

Es el equivalente semántico a new Date().getTime(), pero no crea una instancia intermediaria del objeto Date. De esta manera, el proceso es mas rápido y, por consiguiente, no afecta a la recolección de basura.

Mayormente se utiliza por conveniencia o cuando la performance del código es fundamental, como por ejemplo en juegos de JavaScript u otras aplicaciones específicas.

-`Benchmarking`

Si queremos realizar una medición de performance confiable de una función que vaya a consumir muchos recursos de CPU, debemos hacerlo con precaución.

En este caso, vamos a medir dos funciones que calculen la diferencia entre dos fechas determinadas: ¿Cuál es la más rápida?

Estas evaluaciones de performance son comúnmente denominadas “benchmarks”.

```
// Tenemos date1 y date2. ¿Cuál de las siguientes funciones nos devuelve su diferencia, expresada en ms, más rápido?
function diffSubtract(date1, date2) {
  return date2 - date1;
}

// o
function diffGetTime(date1, date2) {
  return date2.getTime() - date1.getTime();
}
```

Es mas rapido `getTime()`

**-String**

**-Error**

**-Function**

**-Boolean**

# `TypeOf Operator`

You can use the `typeof` operator to find the data type of a JavaScript variable. Devuelve un string.

```
typeof undefined // "undefined"

typeof 0 // "number"

typeof 10n // "bigint"

typeof true // "boolean"

typeof "foo" // "string"

typeof Symbol("id") // "symbol"

typeof Math // "object"  (1)

typeof null // "object"  (2)

typeof alert // "function"  (3)
```

[TOP](#data-types)
