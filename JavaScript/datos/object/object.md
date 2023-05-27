[Volver al Menú](../datatypes.md)

# `Objetos`

En contraste, los objetos son usados para almacenar colecciones de varios datos y entidades más complejas asociados con un nombre clave. En JavaScript, los objetos penetran casi todos los aspectos del lenguaje. Por lo tanto, debemos comprenderlos primero antes de profundizar en cualquier otro lugar.

Podemos crear un objeto usando las llaves {…} con una lista opcional de propiedades. Una propiedad es un par `“key:value”`, donde key es un string (también llamado “nombre clave”), y value puede ser cualquier cosa. P.D. Para fines prácticos de la lección, nos referiremos a este par de conceptos como `“clave:valor”`.

Se puede crear un objeto vacío (“gabinete vacío”) utilizando una de estas dos sintaxis:

```
let user = new Object(); // sintaxis de "constructor de objetos"
let user = {};  // sintaxis de "objeto literal"
```

Normalmente se utilizan las llaves {...}. Esa declaración se llama `objeto literal`.

## `Literales y propiedades`

Podemos poner inmediatamente algunas propiedades dentro de {...} como pares “clave:valor”:

```
let user = {     // un objeto
  name: "John",  // En la clave "name" se almacena el valor "John"
  age: 30        // En la clave "age" se almacena el valor 30
};
```

Una propiedad tiene una clave (también conocida como “nombre” o “identificador”) antes de los dos puntos `":"` y un valor a la derecha.

En el objeto `user` hay dos propiedades:

- La primera propiedad tiene la clave `"name"` y el valor `"John"`.
- La segunda tienen la clave `"age"` y el valor `30`.

Podemos agregar, eliminar y leer archivos de él en cualquier momento.

Agregar
`user.isAdmin = true;`

Eliminar
`delete user.age;`

También podemos nombrar propiedades con más de una palabra. Pero, de ser así, debemos colocar la clave entre comillas "...":

```
let user = {
  name: "John",
  age: 30,
  "likes birds": true  // Las claves con más de una palabra deben ir entre comillas
};
```
La última propiedad en la lista puede terminar con una coma:
```
let user = {
  name: "John",
  age: 30,
}
```
Eso se llama una coma “final” o “colgante”. Facilita agregar, eliminar y mover propiedades, porque todas las líneas se vuelven similares.

## `Corchetes`

La notación de punto no funciona para acceder a propiedades con claves de más de una palabra:

```
// Esto nos daría un error de sintaxis
user.likes birds = true
```

JavaScript no entiende eso. Piensa que hemos accedido a user.likes y entonces nos da un error de sintaxis cuando aparece el inesperado birds.

El punto requiere que la clave sea un identificador de variable válido. Eso implica que: no contenga espacios, no comience con un dígito y no incluya caracteres especiales ($ y _ sí se permiten).

Existe una “notación de corchetes” alternativa que funciona con cualquier string:

```
let user = {};

// asignando
user["likes birds"] = true;

// obteniendo
alert(user["likes birds"]); // true

// eliminando
delete user["likes birds"];
```

Ahora todo está bien. Nota que el string dentro de los corchetes está adecuadamente entre comillas (cualquier tipo de comillas servirían).

Los corchetes también brindan una forma de obtener el nombre de la propiedad desde el resultado de una expresión (a diferencia de la cadena literal). Por ejemplo, a través de una variable:
```
let key = "likes birds";

// Tal cual: user["likes birds"] = true;
user[key] = true;
```

### `Propiedades calculadas`

Podemos usar corchetes en un objeto literal al crear un objeto. A esto se le llama propiedades calculadas.

Por ejemplo:
```
let fruit = prompt("¿Qué fruta comprar?", "Manzana");

let bag = {
  [fruit]: 5, // El nombre de la propiedad se obtiene de la variable fruit
};

alert( bag.apple ); // 5 si fruit es="apple"
```

Podemos usar expresiones más complejas dentro de los corchetes:

```
let fruit = 'apple';
let bag = {
  [fruit + 'Computers']: 5 // bag.appleComputers = 5
};
```

Los corchetes son mucho más potentes que la notación de punto. Permiten cualquier nombre de propiedad, incluso variables. Pero también es más engorroso escribirlos.

Entonces, la mayoría de las veces, cuando los nombres de propiedad son conocidos y simples, se utiliza el punto. Y si necesitamos algo más complejo, entonces cambiamos a corchetes.

## `Atajo para valores de propiedad`

En el código real, a menudo usamos variables existentes como valores de los nombres de propiedades.

Por ejemplo:
```
function makeUser(name, age) {
  return {
    name: name,
    age: age,
    // ...otras propiedades
  };
}

let user = makeUser("John", 30);
alert(user.name); // John
```

En el ejemplo anterior las propiedades tienen los mismos nombres que las variables. El uso de variables para la creación de propiedades es tán común que existe un atajo para valores de propiedad especial para hacerla más corta.

En lugar de name:name, simplemente podemos escribir name, tal cual:
```
function makeUser(name, age) {
  return {
    name, // igual que name:name
    age,  // igual que age:age
    // ...
  };
}
```

Podemos usar ambos tipos de notación en un mismo objeto, la normal y el atajo:

```
let user = {
  name,  // igual que name:name
  age: 30
};
```

## `Limitaciones de nombres de propiedad`

Como sabemos, una variable no puede tener un nombre igual a una de las palabras reservadas del lenguaje, como “for”, “let”, “return”, etc.

Pero para una propiedad de objeto no existe tal restricción:
```
// Estas propiedades están bien
let obj = {
  for: 1,
  let: 2,
  return: 3
};

alert( obj.for + obj.let + obj.return );  // 6
```
En resumen, no hay limitaciones en los nombres de propiedades. Pueden ser cadenas o símbolos (un tipo especial para identificadores que se cubrirán más adelante).

## `La prueba de propiedad existente, el operador “in”`

Una notable característica de los objetos en JavaScript, en comparación con muchos otros lenguajes, es que es posible acceder a cualquier propiedad. ¡No habrá error si la propiedad no existe!

La lectura de una propiedad no existente solo devuelve undefined. Así que podemos probar fácilmente si la propiedad existe:
```
let user = {};

alert( user.noSuchProperty === undefined ); // true significa que "no existe tal propiedad"
```

También existe un operador especial para ello: "in".

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

Nota que a la izquierda de in debe estar el nombre de la propiedad que suele ser un string entre comillas.

Si omitimos las comillas, significa que es una variable. Esta variable debe almacenar la clave real que será probada. Por ejemplo:
```
let user = { age: 30 };

let key = "age";
alert( key in user ); // true, porque su propiedad "age" sí existe dentro del objeto
```

Pero… ¿Por qué existe el operador in? ¿No es suficiente comparar con undefined?

La mayoría de las veces las comparaciones con undefined funcionan bien. Pero hay un caso especial donde esto falla y aún así "in" funciona correctamente.

Es cuando existe una propiedad de objeto, pero almacena undefined:
```
let obj = {
  test: undefined
};

alert( obj.test ); // es undefined, entonces... ¿Quiere decir realmente existe tal propiedad?

alert( "test" in obj ); //es true, ¡La propiedad sí existe!
```
En el código anterior, la propiedad obj.test técnicamente existe. Entonces el operador in funciona correctamente.

Situaciones como esta suceden raramente ya que undefined no debe ser explícitamente asignado. Comúnmente usamos null para valores “desconocidos” o “vacíos”. Por lo que el operador in es un invitado exótico en nuestro código.

## `El bucle "for..in"`

Para recorrer todas las claves de un objeto existe una forma especial de bucle: for..in. Esto es algo completamente diferente a la construcción for(;;) que estudiaremos más adelante.

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
Nota que todas las construcciones “for” nos permiten declarar variables para bucle dentro del bucle, como let key aquí.

Además podríamos usar otros nombres de variables en lugar de key. Por ejemplo, "for (let prop in obj)" también se usa bastante.

<h2 style="color: green">Resumen</h2>

Los objetos son arreglos asociativos con varias características especiales.

Almacenan propiedades (pares de clave-valor), donde:

- Las claves de propiedad deben ser cadenas o símbolos (generalmente strings).
- Los valores pueden ser de cualquier tipo.

Para acceder a una propiedad, podemos usar:

- La notación de punto: obj.property.
- La notación de corchetes `obj["property"]`. Los corchetes permiten tomar la clave de una variable, como `obj[varWithKey]`.

Operadores adicionales:

- Para eliminar una propiedad: delete obj.prop.
- Para comprobar si existe una propiedad con la clave proporcionada: "key" in obj.
- Para crear bucles sobre un objeto: bucle for (let key in obj).

Lo que hemos estudiado en este capítulo se llama “`objeto simple`”, o solamente `Object`.

Hay muchos otros tipos de objetos en JavaScript:

- `Array` para almacenar colecciones de datos ordenados,
- `Date` para almacenar la información sobre fecha y hora,
- `Error` para almacenar información sobre un error.
- …Y así.

Los objetos en JavaScript son muy poderosos. Aquí acabamos de arañar la superficie de un tema que es realmente enorme. Trabajaremos estrechamente con los objetos y aprenderemos más sobre ellos en otras partes del tutorial.

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

# `Prototipos y herencia (delegacion de objeto)`

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

# `Built-in objects`

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

El operador `typeof` devuelve el tipo de dato del operando. Es útil cuando queremos procesar valores de diferentes tipos de forma diferente o simplemente queremos hacer una comprobación rápida.

La llamada a `typeof` x devuelve una cadena con el nombre del tipo. Devuelve un string.

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

Las últimas tres líneas pueden necesitar una explicación adicional:


- Math es un objeto incorporado que proporciona operaciones matemáticas. Lo aprenderemos en el capítulo Números. Aquí sólo sirve como ejemplo de un objeto.

- El resultado de `typeof` `null` es "object". Esto está oficialmente reconocido como un error de comportamiento de `typeof` que proviene de los primeros días de JavaScript y se mantiene por compatibilidad. Definitivamente `null` no es un objeto. Es un valor especial con un tipo propio separado.

- El resultado de `typeof` alert es "function" porque alert es una función. Estudiaremos las funciones en los próximos capítulos donde veremos que no hay ningún tipo especial “function” en JavaScript. Las funciones pertenecen al tipo objeto. Pero `typeof` las trata de manera diferente, devolviendo function. Además proviene de los primeros días de JavaScript. Técnicamente dicho comportamiento es incorrecto, pero puede ser conveniente en la práctica.

<h2 style="color: red">Sintaxis de typeof(x)</h2>
Se puede encontrar otra sintaxis en algún código: typeof(x). Es lo mismo que typeof x.

Para ponerlo en claro: typeof es un operador, no una función. Los paréntesis aquí no son parte del operador typeof. Son del tipo usado en agrupamiento matemático.

Usualmente, tales paréntesis contienen expresiones matemáticas tales como (2 + 2), pero aquí solo tienen un argumento (x). Sintácticamente, permiten evitar el espacio entre el operador typeof y su argumento, y a algunas personas les gusta así.

Algunos prefieren typeof(x), aunque la sintaxis typeof x es mucho más común.

[TOP](#objetos)


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