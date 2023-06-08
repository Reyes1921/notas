[Volver al Menú](../root.md)

# `Classes`

En informática, una clase es una plantilla para la creación de objetos de datos según un modelo predefinido. Las clases se utilizan para representar entidades o conceptos, como los sustantivos en el lenguaje. Cada clase es un modelo que define un conjunto de variables —el estado—, y métodos apropiados para operar con dichos datos —el comportamiento—.

## `La sintaxis “class”`

La sintaxis básica es:
```
class MyClass {
  // métodos de clase
  constructor() { ... }
  method1() { ... }
  method2() { ... }
  method3() { ... }
  ...
}
```

Entonces usamos new MyClass() para crear un objeto nuevo con todos los métodos listados.

El método constructor() es llamado automáticamente por new, así podemos inicializar el objeto allí.

Por ejemplo:

```
class User {

  constructor(name) {
    this.name = name;
  }

  sayHi() {
    alert(this.name);
  }

}

// Uso:
let user = new User("John");
user.sayHi();
```

<h2 style="color: red">No va una coma entre métodos de clase</h2>

Un tropiezo común en desarrolladores principiantes es poner una coma entre los métodos de clase, lo que resulta en un error de sintaxis.

La notación aquí no debe ser confundida con la sintaxis de objeto literal. Dentro de la clase no se requieren comas.

## `¿Qué es una clase?`

En JavaScript, una clase es un tipo de función.

Veamos:

```
class User {
  constructor(name) { this.name = name; }
  sayHi() { alert(this.name); }
}

// La prueba: User es una función
alert(typeof User); // function
```

Lo que la construcción class User {...} hace realmente es:

- Crea una función llamada User, la que se vuelve el resultado de la declaración de la clase. El código de la función es tomado del método constructor (se asume vacío si no se escribe tal método).
- Almacena los métodos de clase, tales como sayHi, en User.prototype.

## `Expresión de clases`

Al igual que las funciones, las clases pueden ser definidas dentro de otra expresión, pasadas, devueltas, asignadas, etc.

```
let User = class {
  sayHi() {
    alert("Hello");
  }
};
```

Si una expresión de clase tiene un nombre, este es visible solamente dentro de la clase.

```
// Expresiones de clase con nombre
// ("Named Class Expression" no figura así en la especificación, pero es equivalente a "Named Function Expression")
let User = class MyClass {
  sayHi() {
    alert(MyClass); // El nombre de MyClass solo es visible dentro de la clase
  }
};

new User().sayHi(); // Funciona, muestra la definición de MyClass

alert(MyClass); // error, el nombre de MyClass no es visible fuera de la clase
```

## `Getters/setters`

Al igual que los objetos literales, las clases pueden incluir getters/setters, propiedades calculadas, etc.

## `Nombres calculados […]`

Aquí hay un ejemplo con un nombre de método calculado usando corchetes `[...]`:

```
class User {

  ['say' + 'Hi']() {
    alert("Hello");
  }

}

new User().sayHi();
```

## `Campos de clase (Class fields)`

Antes, nuestras clases tenían solamente métodos.

“Campos de clase” es una sintaxis que nos permite agregar una propiedad cualquiera.

Por ejemplo, agreguemos la propiedad name a la clase User:

```
class User {
  name = "John";

  sayHi() {
    alert(`Hello, ${this.name}!`);
  }
}

new User().sayHi(); // Hello, John!
```

La diferencia importante de las propiedades definidas como “campos de clase” es que estas son establecidas en los objetos individuales, no compartidas en User.prototype:

```
class User {
  name = "John";
}

let user = new User();
alert(user.name); // John
alert(User.prototype.name); // undefined
```

## `Vinculación de métodos (binding) usando campos de clase`

Como se demostró en el capítulo Función bind: vinculación de funciones, las funciones en JavaScript tienen un this dinámico. Este depende del contexto del llamado.

Entonces si un método de objeto es pasado y llamado en otro contexto, this ya no será una referencia a su objeto.

```
class Button {
  constructor(value) {
    this.value = value;
  }

  click() {
    alert(this.value);
  }
}

let button = new Button("hello");

setTimeout(button.click, 1000); // undefined
```

<h2 style="color: red">Resumen</h2>

La sintaxis básica de clase se ve así:

```
class MyClass {
  prop = value; // propiedad

  constructor(...) { // constructor
    // ...
  }

  method(...) {} // método

  get something(...) {} // método getter
  set something(...) {} // método setter

  [Symbol.iterator]() {} // método con nombre calculado (aquí, symbol)
  // ...
}
```

# `Herencia de clase`

La herencia de clase es el modo para que una clase extienda a otra. De esta manera podemos añadir nueva funcionalidad a la ya existente.

## `La palabra clave “extends”`

```
class Animal {
  constructor(name) {
    this.speed = 0;
    this.name = name;
  }
  run(speed) {
    this.speed = speed;
    alert(`${this.name} corre a una velocidad de ${this.speed}.`);
  }
  stop() {
    this.speed = 0;
    alert(`${this.name} se queda quieto.`);
  }
}

let animal = new Animal("Mi animal");
```


Como los conejos son animales, la clase ‘Rabbit’ debería basarse en ‘Animal’ y así tener acceso a métodos animales, para que los conejos puedan hacer lo que los animales “genéricos” pueden hacer.

La sintaxis para extender otra clase es: class Hijo extends Padre.

```
class Rabbit extends Animal {
  hide() {
    alert(`¡${this.name} se esconde!`);
  }
}

let rabbit = new Rabbit("Conejo Blanco");

rabbit.run(5); // Conejo Blanco corre a una velocidad de 5.
rabbit.hide(); // ¡Conejo Blanco se esconde!
```

Los objetos de la clase Rabbit tienen acceso a los métodos de Rabbit, como `rabbit.hide()`, y también a los métodos Animal, como `rabbit.run()`.

Internamente, la palabra clave extends funciona con la buena mecánica de prototipo: establece `Rabbit.prototype.[[Prototype]]` a `Animal.prototype`. Entonces, si no se encuentra un método en `Rabbit.prototype`, JavaScript lo toma de `Animal.prototype`.

<h2 style="color: red">Cualquier expresión está permitida después de extends</h2>

La sintaxis de clase permite especificar no solo una clase, sino cualquier expresión después de extends.

Por ejemplo, una llamada a función que genera la clase padre:

```
function f(phrase) {
  return class {
    sayHi() { alert(phrase); }
  };
}

class User extends f("Hola") {}

new User().sayHi(); // Hola
```

Observa que class User hereda del resultado de f("Hola").

Eso puede ser útil para patrones de programación avanzados cuando usamos funciones para generar clases dependiendo de muchas condiciones y podamos heredar de ellas.

## `Sobrescribir un método`

Ahora avancemos y sobrescribamos un método. Por defecto, todos los métodos que no están especificados en la clase Rabbit se toman directamente “tal cual” de la clase Animal.

Pero Si especificamos nuestro propio método stop() en Rabbit, es el que se utilizará en su lugar:

```
class Rabbit extends Animal {
  stop() {
    // ...esto se usará para rabbit.stop()
    // en lugar de stop() de la clase Animal
  }
}
```

Sin embargo, no siempre queremos reemplazar totalmente un método padre sino construir sobre él, modificarlo o ampliar su funcionalidad. Hacemos algo con nuestro método, pero queremos llamar al método padre antes, después o durante el proceso.

Las clases proporcionan la palabra clave "super" para eso.

- `super.metodo(...)` llama un método padre.
- `super(...)` llama un constructor padre (solo dentro de nuestro constructor).

<h2 style="color">Las funciones de flecha no tienen super</h2>

Como se mencionó en el capítulo Funciones de flecha revisadas, las funciones de flecha no tienen super.

## `Sobrescribir un constructor`

Con los constructores se pone un poco complicado.

Hasta ahora, Rabbit no tenía su propio constructor.

De acuerdo con la especificación, si una clase extiende otra clase y no tiene constructor, se genera el siguiente constructor “vacío”.

Ahora agreguemos un constructor personalizado a Rabbit. Especificará earLength además de name.

¡Vaya! Tenemos un error. Ahora no podemos crear conejos. ¿Qué salió mal?

…¿Pero por qué? ¿Qué está pasando aquí? De hecho, el requisito parece extraño.

En JavaScript, hay una distinción entre una función constructora de una clase heredera (llamada “constructor derivado”) y otras funciones. Un constructor derivado tiene una propiedad interna especial `[[ConstructorKind]]:"derived"`. Esa es una etiqueta interna especial.

Esa etiqueta afecta su comportamiento con new.

- Cuando una función regular se ejecuta con new, crea un objeto vacío y lo asigna a this.
- Pero cuando se ejecuta un constructor derivado, no hace esto. Espera que el constructor padre haga este trabajo.

Entonces un constructor derivado debe llamar a super para ejecutar su constructor padre (base), de lo contrario no se creará el objeto para this. Y obtendremos un error.

## `Sobrescribiendo campos de clase: una nota con trampa`

[Mas Información](https://es.javascript.info/class-inheritance#sobrescribiendo-campos-de-clase-una-nota-con-trampa)

## `Super: internamente, [[HomeObject]]`

[Mas Información](https://es.javascript.info/class-inheritance#super-internamente-homeobject)

<h2 style="color: red">Resumen</h2>

- Para extender una clase: class Hijo extends Padre:      – Eso significa que `Hijo.prototype.__proto__` será Padre.prototype, por lo que los métodos se heredan.
- Al sobrescribir un constructor:      – Debemos llamar al constructor del padre super() en el constructor de Hijo antes de usar this.
- Al sobrescribir otro método:      – Podemos usar super.method() en un método Hijo para llamar al método Padre.
- Características internas:      – Los métodos recuerdan su clase/objeto en la propiedad interna `[[HomeObject]]`. Así es como super resuelve los métodos padres.      – Por lo tanto, no es seguro copiar un método con super de un objeto a otro.

También:

- Las funciones de flecha no tienen su propio this o super, por lo que se ajustan de manera transparente al contexto circundante.

# `Propiedades y métodos estáticos.`

También podemos asignar un método a la clase como un todo. Dichos métodos se llaman estáticos.

```
class User {
  static staticMethod() {
    alert(this === User);
  }
}

User.staticMethod(); // verdadero
```

Por lo general, los métodos estáticos se utilizan para implementar funciones que pertenecen a la clase como un todo, no a un objeto particular de la misma.

<h2 style="color: red">Los métodos estáticos no están disponibles para objetos individuales</h2>

Los métodos estáticos son llamados sobre las clases, no sobre los objetos individuales.

## `Propiedades estáticas`

Las propiedades estáticas también son posibles, se ven como propiedades de clase regular, pero precedidas por static:

```
class Article {
  static publisher = "Ilya Kantor";
}

alert( Article.publisher ); // Ilya Kantor
```

## `Herencia de propiedades y métodos estáticos`

Las propiedades y métodos estáticos son heredados.

<h2 style="color:red">Resumen</h2>

Los métodos estáticos se utilizan en la funcionalidad propia de la clase “en su conjunto”. No se relaciona con una instancia de clase concreta.

Las propiedades estáticas se utilizan cuando queremos almacenar datos a nivel de clase, también no vinculados a una instancia.

Técnicamente, la declaración estática es lo mismo que asignar a la clase misma:

```
MyClass.property = ...
MyClass.method = ...
```

# `Propiedades y métodos privados y protegidos`

Uno de los principios más importantes de la programación orientada a objetos: delimitar la interfaz interna de la externa.

## `Interfaz interna y externa`

En la programación orientada a objetos, las propiedades y los métodos se dividen en dos grupos:

- `Interfaz interna` – métodos y propiedades, accesibles desde otros métodos de la clase,-  pero no desde el exterior.
- `Interfaz externa` – métodos y propiedades, accesibles también desde fuera de la clase.- 

En JavaScript, hay dos tipos de campos de objeto (propiedades y métodos):

- `Público`: accesible desde cualquier lugar. Comprenden la interfaz externa. Hasta ahora solo estábamos usando propiedades y métodos públicos.
- `Privado`: accesible solo desde dentro de la clase. Estos son para la interfaz interna.

## `Proteger “waterAmount”`

Hagamos primero una clase de cafetera simple:

```
class CoffeeMachine {
  waterAmount = 0; // la cantidad de agua adentro

  constructor(power) {
    this.power = power;
    alert( `Se creó una máquina de café, poder: ${power}` );
  }

}

// se crea la máquina de café
let coffeeMachine = new CoffeeMachine(100);

// agregar agua
coffeeMachine.waterAmount = 200;
```
En este momento las propiedades `waterAmount` y `power` son públicas. Podemos obtenerlos/configurarlos fácilmente desde el exterior a cualquier valor.

Cambiemos la propiedad `waterAmount` a protegida para tener más control sobre ella. Por ejemplo, no queremos que nadie lo ponga por debajo de cero.

`Las propiedades protegidas generalmente tienen el prefijo de subrayado _.`

Eso no se aplica a nivel de lenguaje, pero existe una convención bien conocida entre los programadores de que no se debe acceder a tales propiedades y métodos desde el exterior.

<h2 style="color: red"> Los campos protegidos son heredados.</h2>

Si heredamos class MegaMachine extends CoffeeMachine, entonces nada nos impide acceder a `this._waterAmount` o `this._power` desde los métodos de la nueva clase.

Por lo tanto, los campos protegidos son naturalmente heredables. A diferencia de los privados que veremos a continuación.

## `“#waterLimit” Privada`

<h2 style="color: red">Una adición reciente</h2>

Esta es una adición reciente al lenguaje. No es compatible con motores de JavaScript, o es compatible parcialmente todavía, requiere polyfilling.

Hay una propuesta de JavaScript terminada, casi en el estándar, que proporciona soporte a nivel de lenguaje para propiedades y métodos privados.

Los privados deberían comenzar con `#`. Solo son accesibles desde dentro de la clase.

A diferencia de los protegidos, los campos privados son aplicados por el propio lenguaje. Eso es bueno.

# `Ampliación de clases integradas`

Las clases integradas como Array, Map y otras también son extensibles.

```
// se agrega un método más (puedes hacer más)
class PowerArray extends Array {
  isEmpty() {
    return this.length === 0;
  }
}

let arr = new PowerArray(1, 2, 5, 10, 50);
alert(arr.isEmpty()); // falso

let filteredArr = arr.filter(item => item >= 10);
alert(filteredArr); // 10, 50
alert(filteredArr.isEmpty()); // falso
```

## `Sin herencia estática en incorporados`

Los objetos nativos tienen sus propios métodos estáticos, por ejemplo, `Object.keys`, `Array.isArray`, etc.

Como ya sabemos, las clases nativas se extienden entre sí. Por ejemplo, Array extiende Object.

Normalmente, cuando una clase extiende a otra, se heredan los métodos estáticos y no estáticos. Eso se explicó a fondo en el artículo Propiedades y métodos estáticos..

Pero las clases nativas son una excepción. No heredan estáticos el uno del otro.

Por ejemplo, tanto `Array` como `Date` heredan de `Object`, por lo que sus instancias tienen métodos de `Object.prototype`. Pero `Array.[[Prototype]]` no hace referencia a `Object`, por lo que no existe, por ejemplo, el método estático `Array.keys()` (o `Date.keys()`).

# `Comprobación de clase: "instanceof"`

El operador instanceof permite verificar si un objeto pertenece a una clase determinada. También tiene en cuenta la herencia. Tal verificación puede ser necesaria en muchos casos. Aquí lo usaremos para construir una función polimórfica, la que trata los argumentos de manera diferente dependiendo de su tipo.

## `El operador instanceof`

```
obj instanceof Class
```

Devuelve true si obj pertenece a la Class o una clase que hereda de ella.

Por ejemplo:
```
class Rabbit {}
let rabbit = new Rabbit();

// ¿Es un objeto de la clase Rabbit?
alert( rabbit instanceof Rabbit ); // verdadero
```
También funciona con funciones de constructor:
```
// en lugar de clase
function Rabbit() {}

alert( new Rabbit() instanceof Rabbit ); // verdadero
```

…Y con clases integradas como Array:

```
let arr = [1, 2, 3];
alert( arr instanceof Array ); // verdadero
alert( arr instanceof Object ); // verdadero
```

Normalmente, `instanceof` examina la cadena de prototipos para la verificación. También podemos establecer una lógica personalizada en el método estático Symbol.hasInstance.

El algoritmo de obj `instanceof` Class funciona más o menos de la siguiente manera:

- Si hay un método estático Symbol.hasInstance, simplemente llámelo: `Class[Symbol.hasInstance](obj)`. Debería devolver true o false, y hemos terminado. Así es como podemos personalizar el comportamiento de `instanceof`.

```
// Instalar instancia de verificación que asume que
// cualquier cosa con propiedad canEat es un animal

class Animal {
  static [Symbol.hasInstance](obj) {
    if (obj.canEat) return true;
  }
}

let obj = { canEat: true };

alert(obj instanceof Animal); // verdadero: Animal[Symbol.hasInstance](obj) es llamada
```

- La mayoría de las clases no tienen Symbol.hasInstance. En ese caso, se utiliza la lógica estándar: obj instanceOf Class comprueba si Class.prototype es igual a uno de los prototipos en la cadena de prototipos obj.

```
obj.__proto__ === Class.prototype?
obj.__proto__.__proto__ === Class.prototype?
obj.__proto__.__proto__.__proto__ === Class.prototype?
...
// si alguna respuesta es verdadera, devuelve true
// de lo contrario, si llegamos al final de la cadena, devuelve false
```

Por cierto, también hay un método `objA.isPrototypeOf(objB)`, que devuelve true si objA está en algún lugar de la cadena de prototipos para objB. Por lo tanto, la prueba de obj instanceof Class se puede reformular como `Class.prototype.isPrototypeOf(obj)`.

Es divertido, ¡pero el constructor Class en sí mismo no participa en el chequeo! Solo importa la cadena de prototipos y `Class.prototype`.

Eso puede llevar a consecuencias interesantes cuando se cambia una propiedad prototype después de crear el objeto.

Como aquí:

```
function Rabbit() {}
let rabbit = new Rabbit();

// cambió el prototipo
Rabbit.prototype = {};

// ...ya no es un conejo!
alert( rabbit instanceof Rabbit ); // falso
```

## `Bonificación: Object.prototype.toString para el tipo`

Ya sabemos que los objetos simples se convierten en cadenas como `[objetc Objetc]`:

```
let obj = {};

alert(obj); // [object Object]
alert(obj.toString()); // lo mismo
```

Esa es su implementación de toString. Pero hay una característica oculta que hace que toString sea mucho más poderoso que eso. Podemos usarlo como un typeof extendido y una alternativa para instanceof.

Por esta especificación, el toString incorporado puede extraerse del objeto y ejecutarse en el contexto de cualquier otro valor. Y su resultado depende de ese valor.

- Para un número, será `[object Number]`
- Para un booleano, será `[objetc Boolean]`
- Para null: `[objetc Null]`
- Para undefined: `[objetc Undefined]`
- Para matrices: `[Object Array]`
- … etc (personalizable).

```
// copie el método toString en una variable a conveniencia
let objectToString = Object.prototype.toString;

// ¿que tipo es este?
let arr = [];

alert( objectToString.call(arr) ); // [object Array]
```

Internamente, el algoritmo toString examina this y devuelve el resultado correspondiente. Más ejemplos:

```
let s = Object.prototype.toString;

alert( s.call(123) ); // [object Number]
alert( s.call(null) ); // [object Null]
alert( s.call(alert) ); // [object Function]
```

## `Symbol.toStringTag`

El comportamiento del objeto `toString` se puede personalizar utilizando una propiedad de objeto especial `Symbol.toStringTag`.

```
let user = {
  [Symbol.toStringTag]: "User"
};

alert( {}.toString.call(user) ); // [object User]
```

Para la mayoría de los objetos específicos del entorno, existe dicha propiedad. Aquí hay algunos ejemplos específicos del navegador:

```
// toStringTag para el objeto y clase específicos del entorno:
alert( window[Symbol.toStringTag]); // ventana
alert( XMLHttpRequest.prototype[Symbol.toStringTag] ); // XMLHttpRequest

alert( {}.toString.call(window) ); // [object Window]
alert( {}.toString.call(new XMLHttpRequest()) ); // [object XMLHttpRequest]
```

<h2 style="color: green">Resumen</h2>

Resumamos los métodos de verificación de tipos que conocemos:

<table>
<thead>
<tr>
<th></th>
<th>trabaja para</th>
<th>retorna</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>typeof</code></td>
<td>primitivos</td>
<td>cadena</td>
</tr>
<tr>
<td><code>{}.toString</code></td>
<td>primitivos, objetos incorporados, objetos con <code>Symbol.toStringTag</code></td>
<td>cadena</td>
</tr>
<tr>
<td><code>instanceof</code></td>
<td>objetos</td>
<td>true/false</td>
</tr>
</tbody>
</table>

Como podemos ver, `{}.toString` es técnicamente un `typeof` “más avanzado”.

Y el operador `instanceof` realmente brilla cuando estamos trabajando con una jerarquía de clases y queremos verificar si la clase tiene en cuenta la herencia.

# `Los Mixins`

En JavaScript podemos heredar de un solo objeto. Solo puede haber un `[[Prototype]]` para un objeto. Y una clase puede extender únicamente otra clase.

Pero a veces eso se siente restrictivo. Por ejemplo, tenemos una clase `StreetSweeper` y una clase `Bicycle`, y queremos hacer su combinación: un `StreetSweepingBicycle`.

O tenemos una clase `User` y una clase `EventEmitter` que implementa la generación de eventos, y nos gustaría agregar la funcionalidad de `EventEmitter` a User, para que nuestros usuarios puedan emitir eventos.

Hay un concepto que puede ayudar aquí, llamado `“mixins”`.

Como se define en Wikipedia, un `mixin` es una clase que contiene métodos que pueden ser utilizados por otras clases sin necesidad de heredar de ella.

En otras palabras, un `mixin` proporciona métodos que implementan cierto comportamiento, pero su uso no es exclusivo, lo usamos para agregar el comportamiento a otras clases.

## `Un ejemplo de mixin`

La forma más sencilla de implementar un mixin en JavaScript es hacer un objeto con métodos útiles, para que podamos combinarlos fácilmente en un prototipo de cualquier clase.

Por ejemplo, aquí el mixin `sayHiMixin` se usa para agregar algo de “diálogo” a `User`:

```
// mixin
let sayHiMixin = {
  sayHi() {
    alert(`Hola ${this.name}`);
  },
  sayBye() {
    alert(`Adiós ${this.name}`);
  }
};

// uso:
class User {
  constructor(name) {
    this.name = name;
  }
}

// copia los métodos
Object.assign(User.prototype, sayHiMixin);

// Ahora el User puede decir hola
new User("tío").sayHi(); // Hola tío!
```

No hay herencia, sino un simple método de copia. Entonces, User puede heredar de otra clase y también incluir el mixin para “mezclar” los métodos adicionales, como este:

## `EventMixin`

Ahora hagamos un mixin para la vida real.

Una característica importante de muchos objetos del navegador (por ejemplo) es que pueden generar eventos. Los eventos son una excelente manera de “transmitir información” a cualquiera que lo desee. Así que hagamos un mixin que nos permita agregar fácilmente funciones relacionadas con eventos a cualquier clase/objeto.

[Mas Información](https://es.javascript.info/mixins)

`Mixin` – es un término genérico de programación orientado a objetos: una clase que contiene métodos para otras clases.

Algunos lenguajes permiten la herencia múltiple. JavaScript no admite la herencia múltiple, pero los mixins se pueden implementar copiando métodos en el prototipo.

Podemos usar mixins como una forma de expandir una clase agregando múltiples comportamientos, como el manejo de eventos que hemos visto anteriormente.

Los mixins pueden convertirse en un punto de conflicto si sobrescriben accidentalmente los métodos de clase existentes. Por lo tanto, generalmente debes planificar correctamente la definición de métodos de un mixin, para minimizar la probabilidad de que suceda.

[TOP](#classes)
