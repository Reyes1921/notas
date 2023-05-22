[Volver al Menú](../root.md)

# `Data Structures`

A Data structure is a format to organize, manage and store data in a way that allows efficient access and modification. JavaScript has primitive (built-in) and non-primitive (not built-in) data structures. Primitive data structures come by default with the programming language and you can implement them out of the box (like arrays and objects). Non-primitive data structures don't come by default and you have to code them up if you want to use them.

# `Keyed Collections`

Keyed collections are data collections that are ordered by key not index. They are associative in nature. Map and set objects are keyed collections and are iterable in the order of insertion.

## `MAP`

Map es, al igual que Objet, una colección de datos identificados por claves. Pero la principal diferencia es que Map permite claves de cualquier tipo.

Los métodos y propiedades son:

- new Map() – crea el mapa.
- map.set(clave, valor) – almacena el valor asociado a la clave.
- map.get(clave) – devuelve el valor de la clave. Será undefined si la clave no existe en map.
- map.has(clave) – devuelve true si la clave existe en map, false si no existe.
- map.delete(clave) – elimina el valor de la clave.
- map.clear() – elimina todo de map.
- map.size – tamaño, devuelve la cantidad actual de elementos.

```
let map = new Map();

map.set('1', 'str1');   // un string como clave
map.set(1, 'num1');     // un número como clave
map.set(true, 'bool1'); // un booleano como clave

// ¿recuerda el objeto regular? convertiría las claves a string.
// Map mantiene el tipo de dato en las claves, por lo que estas dos son diferentes:
alert( map.get(1)   ); // 'num1'
alert( map.get('1') ); // 'str1'

alert( map.size ); // 3
```

Aunque map[clave] también funciona (por ejemplo podemos establecer map[clave] = 2), esto es tratar a map como un objeto JavaScript simple,
lo que implica tener todas las limitaciones correspondientes (que solo se permita string/symbol como clave, etc.).

Por lo tanto, debemos usar los métodos de Map: set, get y demás.

Iteración sobre Map
Para recorrer un map, hay 3 métodos:

- map.keys() –- devuelve un iterable para las claves.
- map.values() -– devuelve un iterable para los valores.
- map.entries() -– devuelve un iterable para las entradas [clave, valor]. Es el que usa por defecto en for..of.

Además, Map tiene un método forEach incorporado, similar al de Array:

```
// recorre la función para cada par (clave, valor)
recipeMap.forEach( (value, key, map) => {
  alert(`${key}: ${value}`); // pepino: 500 etc
});
```

`Object.entries`: Map desde Objeto

Si tenemos un objeto plano y queremos crear un Map a partir de él, podemos usar el método incorporado Object.entries(obj) que devuelve un
array de pares clave/valor para un objeto exactamente en ese formato.

`Object.fromEntries`: Objeto desde Map

Existe el método Object.fromEntries que hace lo contrario: dado un array de pares [clave, valor], crea un objeto a partir de ellos:

## `SET`

Un Set es una colección de tipo especial: “conjunto de valores” (sin claves), donde cada valor puede aparecer solo una vez.

Sus principales métodos son:

- new Set(iterable) – crea el set. El argumento opcional es un objeto iterable (generalmente un array) con valores para inicializarlo.
- set.add(valor) – agrega un valor, y devuelve el set en sí.
- set.delete(valor) – elimina el valor, y devuelve true si el valor existía al momento de la llamada; si no, devuelve false.
- set.has(valor) – devuelve true si el valor existe en el set, si no, devuelve false.
- set.clear() – elimina todo el continido del set.
- set.size – es la cantidad de elementos.

La característica principal es que llamadas repetidas de set.add(valor) con el mismo valor no hacen nada. Esa es la razón por la cual cada valor aparece en Set solo una vez.

Por ejemplo, vienen visitantes y queremos recordarlos a todos. Pero las visitas repetidas no deberían llevar a duplicados. Un visitante debe ser “contado” solo una vez.

Set es lo correcto para eso:

```
let set = new Set();

let john = { name: "John" };
let pete = { name: "Pete" };
let mary = { name: "Mary" };

// visitas, algunos usuarios lo hacen varias veces
set.add(john);
set.add(pete);
set.add(mary);
set.add(john);
set.add(mary);

// set solo guarda valores únicos
alert( set.size ); // 3

for (let user of set) {
  alert(user.name); // John (luego Pete y Mary)
}
```

Iteración sobre Set
Podemos recorrer Set con for..of o usando forEach:

```
let set = new Set(["oranges", "apples", "bananas"]);

for (let value of set) alert(value);

// lo mismo que forEach:
set.forEach((value, valueAgain, set) => {
  alert(value);
});
```

<h2 style='color: green'>Resumen</h2>

**Map**: es una colección de valores con clave.

Métodos y propiedades:

- new Map() – crea el mapa.
- map.set(clave, valor) – almacena el valor para la clave.
- map.get(clave) – devuelve el valor de la clave: será undefined si la clave no existe en Map.
- map.has(clave) – devuelvetrue si la clave existe, y false si no existe.
- map.delete(clave) – elimina el valor de esa clave.
- map.clear() – limpia el Map.
- map.size – devuelve la cantidad de elementos en el Map.

La diferencia con un Objeto regular:

Cualquier clave. Los objetos también pueden ser claves.

Métodos adicionales convenientes, y la propiedad size.

**Set**: es una colección de valores únicos.

Métodos y propiedades:

- new Set(iterable) – crea el set. Tiene un argumento opcional, un objeto iterable (generalmente un array) de valores para inicializarlo.
- set.add(valor) – agrega un valor, devuelve el set en sí.
- set.delete(valor) – elimina el valor, devuelve true si valor existe al momento de la llamada; si no, devuelve false.
- set.has(valor) – devuelve true si el valor existe en el set, si no, devuelve false.
- set.clear() – elimina todo del set.
- set.size – es la cantidad de elementos.

La iteración sobre Map y Set siempre está en el orden de inserción, por lo que no podemos decir que estas colecciones están desordenadas, pero no podemos reordenar elementos u obtener un elemento directamente por su número.

# `WeakMap y WeakSet`

WeakMap es una colección similar a Map que permite solo objetos como propiedades y los elimina junto con el valor asociado una vez que se vuelven inaccesibles por otros medios.

WeakSet es una colección tipo Set que almacena solo objetos y los elimina una vez que se vuelven inaccesibles por otros medios.

Sus principales ventajas son que tienen referencias débiles a los objetos, así pueden ser fácilmente eliminados por el recolector de basura.

Esto viene al costo de no tener soporte para clear, size, keys, values…

WeakMap yWeakSet se utilizan como estructuras de dato “secundarias” además del almacenamiento de objetos “principal”.
Una vez que el objeto se elimina del almacenamiento principal, si solo se encuentra como la clave de WeakMap o en unWeakSet, se limpiará automáticamente.

## `Structured Data`

Structured data is used by search-engines, like Google, to understand the content of the page, as well as to gather information about the web and the world in general.

It is also coded using in-page markup on the page that the information applies to.

## `JSON`

JavaScript Object Notation (JSON) is a standard text-based format for representing structured data based on JavaScript object syntax. It is commonly used for transmitting data in web applications (e.g., sending some data from the server to the client, so it can be displayed on a web page, or vice versa).

Es un formato general para representar valores y objetos. Se lo describe como el estándar RFC 4627. En un principio fue creado para Javascript, pero varios lenguajes tienen librerías para manejarlo también. Por lo tanto es fácil utilizar JSON para intercambio de información cuando el cliente utiliza JavaScript y el servidor está escrito en Ruby, PHP, Java, lo que sea.

Estructura del JSON

```
{
  "squadName": "Super hero squad",
  "homeTown": "Metro City",
  "formed": 2016,
  "secretBase": "Super tower",
  "active": true,
  "members": [
    {
      "name": "Molecule Man",
      "age": 29,
      "secretIdentity": "Dan Jukes",
      "powers": [
        "Radiation resistance",
        "Turning tiny",
        "Radiation blast"
      ]
    },
    {
      "name": "Madame Uppercut",
      "age": 39,
      "secretIdentity": "Jane Wilson",
      "powers": [
        "Million tonne punch",
        "Damage resistance",
        "Superhuman reflexes"
      ]
    },
    {
      "name": "Eternal Flame",
      "age": 1000000,
      "secretIdentity": "Unknown",
      "powers": [
        "Immortality",
        "Heat Immunity",
        "Inferno",
        "Teleportation",
        "Interdimensional travel"
      ]
    }
  ]
}
```

JSON no admite comentarios. Agregar un comentario a JSON lo hace inválido.

JavaScript proporciona métodos:

- JSON.stringify para convertir objetos a JSON.
- JSON.parse para convertir JSON de vuelta a un objeto.

**Workin with JSON**

-`JSON.stringify`

Aquí hacemos JSON.stringify a student:

```
let student = {
  name: 'John',
  age: 30,
  isAdmin: false,
  courses: ['html', 'css', 'js'],
  spouse: null
};

let json = JSON.stringify(student);

alert(typeof json); // ¡obtenemos un string!

alert(json);
/* Objeto JSON-codificado:
{
  "name": "John",
  "age": 30,
  "isAdmin": false,
  "courses": ["html", "css", "js"],
  "spouse": null
}
*/
```

El método JSON.stringify(student) toma al objeto y lo convierte a un string.

-Excluyendo y transformando: sustituto

La sintaxis completa de JSON.stringify es:

```
let json = JSON.stringify(value[, replacer, space])
```

**value**

Un valor para codificar.

**replacer**

Array de propiedades para codificar o una función de mapeo function(propiedad, valor).

**space**

Cantidad de espacio para usar para el formateo

Ejemplo:

```
let room = {
  number: 23
};

let meetup = {
  title: "Conference",
  participants: [{name: "John"}, {name: "Alice"}],
  place: room // meetup hace referencia a room
};

room.occupiedBy = meetup; // room hace referencia a meetup

alert( JSON.stringify(meetup, ['title', 'participants']) );
// {"title":"Conference","participants":[{},{}]}
```

-Formato: espacio

El tercer argumento de JSON.stringify(value, replacer, space) es el número de espacios a utilizar para un formato agradable.

Anteriormente todos los objetos convertidos a String no tenían sangría ni espacios adicionales. Eso está bien si queremos enviar un objeto por la red. El argumento space es utilizado exclusivamente para una salida agradable.

```
let user = {
  name: "John",
  age: 25,
  roles: {
    isAdmin: false,
    isEditor: true
  }
};

alert(JSON.stringify(user, null, 2));
/* sangría de dos espacios:
{
  "name": "John",
  "age": 25,
  "roles": {
    "isAdmin": false,
    "isEditor": true
  }
}
*/

/* para JSON.stringify(user, null, 4) el resultado sería más indentado:
{
    "name": "John",
    "age": 25,
    "roles": {
        "isAdmin": false,
        "isEditor": true
    }
}
*/
```

-“toJSON” Personalizado

Tal como toString para conversión de String, un objeto puede proporcionar el método toJSON para conversión a JSON. JSON.stringify automáticamente la llama si está disponible.

-`JSON.parse`

Para decodificar un string JSON, necesitamos otro método llamado JSON.parse. Es decir pasar de json a objeto.

```
let value = JSON.parse(str, [reviver]);
```

str
string JSON para analizar.
reviver
function(key,value) opcional que será llamado para cada par (propiedad, valor) y puede transformar el valor.

Por ejemplo:

```
// array convertido en String
let numbers = "[0, 1, 2, 3]";

numbers = JSON.parse(numbers);

alert( numbers[1] ); // 1
```

<h2 style='color: green'>Resumen</h2>

- JSON es un formato de datos que tiene su propio estándar independiente y librerías para la mayoría de los lenguajes de programación.
- JSON admite objetos simples, arrays, strings, números, booleanos y null.
- JavaScript proporciona los métodos JSON.stringify para serializar en JSON y JSON.parse para leer desde JSON.
- Ambos métodos admiten funciones transformadoras para lectura/escritura inteligente.
- Si un objeto tiene toJSON, entonces es llamado porJSON.stringify.

# Indexed collections

Indexed Collections are collections that have numeric indices i.e. the collections of data that are ordered by an index value. In JavaScript, an array is an indexed collection. An array is an ordered set of values that has a numeric index.

## Typed Arrays

In Javascript, a typed array is an array-like buffer of binary data. There is no JavaScript property or object named TypedArray, but properties and methods can be used with typed array objects.

Los arreglos tipados en JavaScript son objetos similares a arreglos que proporcionan un mecanismo para leer y escribir datos binarios sin procesar en búferes de memoria. Como ya sabrás, los objetos Arreglo crecen y se encogen dinámicamente y pueden tener cualquier valor de JavaScript. Los motores de JavaScript realizan optimizaciones para que estos arreglos sean rápidos.

Sin embargo, a medida que las aplicaciones web se vuelven cada vez más poderosas, agregando características como manipulación de audio y video, acceso a datos sin procesar usando WebSockets, etc., ha quedado claro que hay momentos en los que sería útil que el código JavaScript pudiera manipular rápida y fácilmente datos binarios sin procesar. Aquí es donde entran en juego los arreglos tipados. Cada entrada en un arreglo tipado de JavaScript es un valor binario sin procesar en uno de los formatos admitidos, desde números enteros de 8 bits hasta números de punto flotante de 64 bits.

Sin embargo, los arreglos tipados no se deben confundir con los arreglos normales, ya que llamar a Array.isArray() en un arreglo tipado devuelve false. Además, no todos los métodos disponibles para arreglos normales son compatibles con arreglos tipados (por ejemplo, push y pop).

## [Arrays](arrays.md)

[TOP](#data-structures)
