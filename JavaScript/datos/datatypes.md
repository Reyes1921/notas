[Volver al Menú](../root.md)

# `Data Types`

Data type refers to the type of data that a JavaScript variable can hold. There are seven primitive data types in JavaScript (`Number`, `BigInt`, `String`, `Boolean`, `Null`, `Undefined` and `Symbol`). `Objects` are non-primitives.

## `Hay 8 tipos de datos:`

- `number` tanto para números de punto flotante como enteros

- `bigint` para números enteros de largo arbitrario

- `string` para textos

- `boolean` para valores lógicos: true/false

- `null` un tipo con el valor único null, que significa “vacío” o “no existe”

- `undefined` un tipo con el valor único undefined, que significa “no asignado”

- `object y symbol` para estructuras de datos complejas e identificadores únicos

Siete de ellos se denominan `“primitivos”`, porque sus valores contienen solo un dato (sea un string, un número o lo que sea).

Tipos de datos primitivos se comparan por su valor no tiene referencia son inmutables y los objetos si se comparan por referencia no por su valor.

`Null` es primitivo pero es de tipo objeto es decir es especial.

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

En JavaScript, los datos textuales son almacenados como strings (cadena de caracteres). No hay un tipo de datos separado para caracteres unitarios.

El formato interno para strings es siempre UTF-16, no está vinculado a la codificación de la página.

## `Comillas`

No poseen metodos o propiedades, se comparan por valor y son inmutables.

```
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

```
let str = 'Hola';
str[0] = 'h'; // error
alert(str[0]); // no funciona
```

## `Cambiando capitalización`

Cambiando mayúsculas y minúsculas
Los métodos `toLowerCase()` y `toUpperCase()` cambian los caracteres a minúscula y mayúscula respectivamente:

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

Existen varios otros métodos útiles en cadenas:

- str.`trim()` – remueve (“recorta”) espacios desde el comienzo y final de un string.

- str.`repeat(n)` – repite el string n veces.

- str.`padStart(n,y)` - The padStart() method pads the current string with another string (multiple times, if needed) until the resulting string reaches the given length. The padding is applied from the start of the current string.

What `String.raw` actually does is taking a template literal, processing all substitutions (${variable}, e.g.), but ignoring well-known escape-sequences.

```
const str = String.raw`${varOne}\t\n${varTwo}` // => "Hey\t\nthere"
```

# `Number`

En JavaScript moderno, hay dos tipos de números:

- Los números regulares en JavaScript son almacenados con el formato de 64-bit IEEE-754, conocido como “números de doble precisión de coma flotante”.
Estos números son los que estaremos usando la mayor parte del tiempo, y hablaremos de ellos en este capítulo.

- Los números `BigInt` representan enteros de longitud arbitraria. A veces son necesarios porque un número regular no puede exceder 253 ni ser menor a -253 manteniendo la precisión, algo que mencionamos antes en el capítulo Tipos de datos. Como los bigints son usados en algunas áreas especiales, les dedicamos un capítulo especial BigInt.

## `Más formas de escribir un número`

También podemos usar guion bajo \_ como separador:

```
let billion = 1_000_000_000;
```

Aquí `_` es “azúcar sintáctica”, hace el número más legible. El motor JavaScript simplemente ignora `_` entre dígitos, así que es exactamente igual al “billion” de más arriba.

En JavaScript, acortamos un número agregando la letra "`e`" y especificando la cantidad de ceros:

```
let billion = 1e9; // 1 billion, literalmente: 1 y 9 ceros
alert( 7.3e9 );  // 7.3 billions (tanto 7300000000 como 7_300_000_000)
```

Ahora escribamos algo muy pequeño. Digamos 1 microsegundo (un millonésimo de segundo):

```
let mсs = 0.000001;
```
Igual que antes, el uso de "e" puede ayudar. Si queremos evitar la escritura de ceros explícitamente, podríamos expresar lo mismo como:

```
let mcs = 1e-6; // cinco ceros a la izquierda de 1
```

Si contamos los ceros en 0.000001, hay 6 de ellos en total. Entonces naturalmente es 1e-6.

En otras palabras, un número negativo detrás de "e" significa una división por el 1 seguido de la cantidad dada de ceros:

```
// -3 divide por 1 con 3 ceros
1e-3 === 1 / 1000; // 0.001

// -6 divide por 1 con 6 ceros
1.23e-6 === 1.23 / 1000000; // 0.00000123

// un ejemplo con un número mayor
1234e-2 === 1234 / 100; // 12.34, el punto decimal se mueve 2 veces
```

## `Números hexadecimales, binarios y octales`

Los números Hexadecimales son ampliamente usados en JavaScript para representar colores, codificar caracteres y muchas otras cosas. Es natural que exista una forma breve de escribirlos: 0x y luego el número.

Por ejemplo:
```
alert( 0xff ); // 255
alert( 0xFF ); // 255 (lo mismo en mayúsculas o minúsculas )
```

Los sistemas binario y octal son raramente usados, pero también soportados mediante el uso de los prefijos 0b y 0o:

```
let a = 0b11111111; // binario de 255
let b = 0o377; // octal de 255

alert( a == b ); // true, el mismo número 255 en ambos lados
```

`Solo 3 sistemas numéricos tienen tal soporte. Para otros sistemas numéricos, debemos usar la función parseInt`

## `toString(base)`

El método `num.toString(base)` devuelve la representación num en una cadena, en el sistema numérico con la base especificada.

```
let num = 255;

alert( num.toString(16) );  // ff
alert( num.toString(2) );   // 11111111
500..toString(2); //111110100
```

La base puede variar entre 2 y 36. La predeterminada es 10.

Casos de uso común son:

- `base=16` usada para colores hex, codificación de caracteres, etc; los dígitos pueden ser 0..9 o A..F.
- `base=2` mayormente usada para el debug de operaciones de bit, los dígitos pueden ser 0 o 1.
- `base=36` Es el máximo, los dígitos pueden ser 0..9 o A..Z. Aquí el alfabeto inglés completo es usado para representar un número. Un uso peculiar pero práctico para la base 36 es cuando necesitamos convertir un largo identificador numérico en algo más corto, por ejemplo para abreviar una url. Podemos simplemente representarlo en el sistema numeral de base 36:

<h2 style="color:red">Dos puntos para llamar un método</h2>

Por favor observa que los dos puntos en `123456..toString(36)` no son un error tipográfico. Si queremos llamar un método directamente sobre el número, como toString del ejemplo anterior, necesitamos ubicar los dos puntos .. tras él.

Si pusiéramos un único punto: `123456.toString(36)`, habría un error, porque la sintaxis de JavaScript implica una parte decimal después del primer punto. Al poner un punto más, JavaScript reconoce que la parte decimal está vacía y luego va el método.

También podríamos escribir `(123456).toString(36)`.

## `Redondeo`

- `Math.floor`
Redondea hacia abajo: 3.1 se convierte en 3, y -1.1 se hace -2.
- `Math.ceil`
Redondea hacia arriba: 3.1 torna en 4, y -1.1 torna en -1.
- `Math.round`
Redondea hacia el entero más cercano: 3.1 redondea a 3, 3.6 redondea a 4, el caso medio 3.5 redondea a 4 también.
- `Math.trunc` (no soportado en Internet Explorer)
Remueve lo que haya tras el punto decimal sin redondear: 3.1 torna en 3, -1.1 torna en -1.

Estas funciones cubren todas las posibles formas de lidiar con la parte decimal de un número. Pero ¿si quisiéramos redondear al enésimo n-th dígito tras el decimal?

El método `toFixed(n)` redondea el número a `n` dígitos después del punto decimal y devuelve una cadena que representa el resultado.

```
let num = 12.34;
alert( num.toFixed(1) ); // "12.3"
```

## `Cálculo impreciso`

```
alert( 0.1 + 0.2 == 0.3 ); // false
```

Es así, al comprobar si la suma de 0.1 y 0.2 es 0.3, obtenemos false.
This is not a JavaScript quirk but actually based on floating point arithmetic.

¡Qué extraño! ¿Qué es si no 0.3?

Un número es almacenado en memoria en su forma binaria, una secuencia de bits, unos y ceros.Pero decimales como 0.1, 0.2 que se ven simples en el sistema decimal son realmente fracciones sin fin en su forma binaria.

Simplemente no hay manera de guardar exactamente 0.1 o exactamente 0.2 usando el sistema binario, así como no hay manera de guardar un tercio en fracción decimal.

Podemos verlo en acción:
```
alert( 0.1.toFixed(20) ); // 0.10000000000000000555
```
Y cuando sumamos dos números, se apilan sus “pérdidas de precisión”. Y es por ello que 0.1 + 0.2 no es exactamente 0.3.

<h2 style="color:red">Algo peculiar</h2>

Prueba ejecutando esto:

```
// ¡Hola! ¡Soy un número que se autoincrementa!
alert( 9999999999999999 ); // muestra 10000000000000000
```
Esto sufre del mismo problema: Una pérdida de precisión. Hay 64 bits para el número, 52 de ellos pueden ser usados para almacenar dígitos, pero no es suficiente. Entonces los dígitos menos significativos desaparecen.

JavaScript no dispara error en tales eventos. Hace lo mejor que puede para ajustar el número al formato deseado, pero desafortunadamente este formato no es suficientemente grande.

<h2 style="color:red">Dos ceros</h2>
Otra consecuencia peculiar de la representación interna de los números es la existencia de dos ceros: 0 y -0.

Esto es porque el signo es representado por un bit, así cada número puede ser positivo o negativo, incluyendo al cero.

En la mayoría de los casos la distinción es imperceptible, porque los operadores están adaptados para tratarlos como iguales.

## `Tests: isFinite e isNaN`

- `Infinity` (y -`Infinity`) es un valor numérico especial que es mayor (menor) que cualquier otra cosa.
- `NaN` (“No un Número”) representa un error.

Ambos pertenecen al tipo `number`, pero no son números “normales”, así que hay funciones especiales para chequearlos:

- `isNaN`(value) convierte su argumento a número entonces testea si es `NaN`:

```
alert( isNaN(NaN) ); // true
alert( isNaN("str") ); // true
```

Pero ¿necesitamos esta función? ¿No podemos simplemente usar la comparación `=== NaN?` Desafortunadamente no. El valor `NaN` es único en que no es igual a nada, incluyendo a sí mismo:

```
alert( NaN === NaN ); // false
```

- `isFinite`(value) convierte su argumento a un número y devuelve true si es un número regular, no NaN/Infinity/-Infinity:

```
alert( isFinite("15") ); // true
alert( isFinite("str") ); // false, porque es un valor especial: NaN
alert( isFinite(Infinity) ); // false, porque es un valor especial: Infinity
```

## `parseInt y parseFloat`

La conversión numérica usando un más + o `Number()` es estricta. Si un valor no es exactamente un número, falla:
```
alert( +"100px" ); // NaN
```
Siendo la única excepción los espacios al principio y al final del string, pues son ignorados.

Pero en la vida real a menudo tenemos valores en unidades como "`100px`" o "`12pt`" en CSS. También el símbolo de moneda que en varios países va después del monto, tenemos "19€" y queremos extraerle la parte numérica.

Para eso sirven `parseInt` y `parseFloat`.

Estas “leen” el número desde un string hasta que dejan de poder hacerlo. Cuando se topa con un error devuelve el número que haya registrado hasta ese momento. La función parseInt devuelve un entero, mientras que parseFloat devolverá un punto flotante:

```
alert( parseInt('100px') ); // 100
alert( parseFloat('12.5em') ); // 12.5

alert( parseInt('12.3') ); // 12, devuelve solo la parte entera
alert( parseFloat('12.3.4') ); // 12.3, el segundo punto detiene la lectura

parseInt('5e-7');    // => 5
```

Hay situaciones en que parseInt/parseFloat devolverán NaN. Ocurre cuando no puedo encontrar dígitos:
```
alert( parseInt('a123') ); // NaN, 
```

<h2 style="color:red">El segundo argumento de parseInt(str, radix)</h2>

La función `parseInt`() tiene un segundo parámetro opcional. Este especifica la base de sistema numérico, entonces parseInt puede también analizar cadenas de números hexa, binarios y otros:
```
alert( parseInt('0xff', 16) ); // 255
alert( parseInt('ff', 16) ); // 255, sin 0x también funciona
parseInt(111110100,2); //500
alert( parseInt('2n9c', 36) ); // 123456
```

Floats smaller than 10-6 `(e.g. 0.0000005 which is same as 5\*10-7)` conversed to a string are written in the exponential notation (e.g. 5e-7 is the exponential notation of 0.0000005).
That's why using such small floats with `parseInt()` leads to unexpected results: only the significat part (e.g. 5 of 5e-7) of the exponential notiation is parsed.


## `Otras funciones matemáticas`
JavaScript tiene un objeto incorporado `Math` que contiene una pequeña biblioteca de funciones matemáticas y constantes.

Unos ejemplos:

- `Math.floor()` /piso
- `Math.ceil()` /cielo
- `Math.round()` /mas cerca
- `Math.trunc()` /ninguno
- `Math.random()` /aleatorio
- `Math.max()` /maximo const arr = [1, 2, 3]; const max = Math.max(...arr);
- `Math.min()` /minimo
- `Math.pow()` /potencia
- `Math.abs()` /retorna el valor absoluto de un número

# `Symbol`

Según la especificación, solo dos de los tipos primitivos pueden servir como clave de propiedad de objetos: `string`, o `symbol`.

Un symbol es un “valor primitivo único” con una descripción opcional, se usa para crear valores unicos e irrepetibles.

Se crean de la siguiente manera:

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

Para crear u accesar a un symbol en el registro global, usa `Symbol.for(key)`.

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
Por ejemplo, `Symbol.toPrimitive` nos permite describir el objeto para su conversión primitiva.

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

# `Boolean (tipo lógico)`

El tipo boolean tiene sólo dos valores posibles: `true` y `false`.

# `El valor “null” (nulo)`

El valor especial `null` no pertenece a ninguno de los tipos descritos anteriormente.

En JavaScript, `null` no es una “referencia a un objeto inexistente” o un “puntero nulo” como en otros lenguajes.

Es sólo un valor especial que representa “nada”, “vacío” o “valor desconocido”.

El código anterior indica que el valor de age es desconocido o está vacío por alguna razón.

# `El valor “undefined” (indefinido)`

El valor especial `undefined` también se distingue. Hace un tipo propio, igual que `null`.

El significado de `undefined` es “valor no asignado”.

Si una variable es declarada, pero no asignada, entonces su valor es `undefined`

[Objects](object/object.md)

[TOP](#data-types)