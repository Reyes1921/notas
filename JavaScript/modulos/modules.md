[Volver al Menú](../root.md)

# `Modulos`

A medida que nuestra aplicación crece, queremos dividirla en múltiples archivos, llamados “módulos”. Un módulo puede contener una clase o una biblioteca de funciones para un propósito específico.

Durante mucho tiempo, JavaScript existió sin una sintaxis de módulo a nivel de lenguaje. Eso no fue un problema, porque inicialmente los scripts eran pequeños y simples, por lo que no era necesario.

Pero con el tiempo los scripts se volvieron cada vez más complejos, por lo que la comunidad inventó una variedad de formas de organizar el código en módulos, bibliotecas especiales para cargar módulos a pedido.

Para nombrar algunos (por razones históricas):

- `AMD` – uno de los sistemas de módulos más antiguos, implementado inicialmente por la biblioteca require.js.

- `CommonJS` – el sistema de módulos creado para el servidor Node.js.

- `UMD` – un sistema de módulos más, sugerido como universal, compatible con AMD y CommonJS.

Ahora, todo esto se convierte lentamente en una parte de la historia, pero aún podemos encontrarlos en viejos scripts.

El sistema de módulos a nivel de idioma apareció en el estándar en 2015, evolucionó gradualmente desde entonces y ahora es compatible con todos los principales navegadores y en Node.js. Así que estudiaremos los módulos modernos de Javascript de ahora en adelante.

## `Qué es un módulo?`

Un módulo es solo un archivo. Un script es un módulo. Tan sencillo como eso.

Los módulos pueden cargarse entre sí y usar directivas especiales export e import para intercambiar funcionalidad, llamar a funciones de un módulo de otro:

- La palabra clave `export` etiqueta las variables y funciones que deberían ser accesibles desde fuera del módulo actual.

- `import` permite importar funcionalidades desde otros módulos.

Por ejemplo, si tenemos un archivo sayHi.js que exporta una función:

```
// 📁 sayHi.js
export function sayHi(user) {
  alert(`Hello, ${user}!`);
}
```

…Luego, otro archivo puede importarlo y usarlo:

```
// 📁 main.js
import {sayHi} from './sayHi.js';

alert(sayHi); // function...
sayHi('John'); // Hello, John!
```

La directiva `import` carga el módulo por la ruta `./sayHi.js` relativo con el archivo actual, y asigna la función exportada sayHi a la variable correspondiente.

Como los módulos admiten palabras clave y características especiales, debemos decirle al navegador que un script debe tratarse como un módulo, utilizando el atributo `<script type =" module ">`.

<h2 style="color: red">Nota</h2>

Los módulos funcionan solo a través de HTTP(s), no localmente

Si intenta abrir una página web localmente a través del protocolo file://, encontrará que las directivas import y export no funcionan. Use un servidor web local, como static-server o use la capacidad de “servidor en vivo” de su editor, como VS Code Live Server Extension para probar los módulos.

## `Características del módulo central`

### `Siempre en modo estricto`

Los módulos siempre trabajan en modo estricto. Por ejemplo, asignar a una variable sin declarar nos dará un error.

```
<script type="module">
  a = 5; // error
</script>
```

### `Alcance a nivel de módulo`

Cada módulo tiene su propio alcance de nivel superior. En otras palabras, las variables y funciones de nivel superior de un módulo no se ven en otros scripts.

### `Un código de módulo se evalúa solo la primera vez cuando se importa`

Si el mismo módulo se importa en varios otros módulos, su código se ejecuta solo una vez: en el primer import. Luego, sus exportaciones se otorgan a todos los importadores que siguen.

Eso tiene consecuencias importantes para las que debemos estar prevenidos.

Echemos un vistazo usando ejemplos:

Primero, si ejecutar un código de módulo trae efectos secundarios, como mostrar un mensaje, importarlo varias veces lo activará solo una vez, la primera vez:

```
// 📁 alert.js
alert("Módulo es evaluado!");
// Importar el mismo módulo desde archivos distintos

// 📁 1.js
import `./alert.js`; // Módulo es evaluado!

// 📁 2.js
import `./alert.js`; // (no muestra nada)
```

El segundo import no muestra nada, porque el módulo ya fue evaluado.

### `import.meta`

El objeto `import.meta` contiene la información sobre el módulo actual.

Su contenido depende del entorno. En el navegador, contiene la URL del script, o la URL de una página web actual si está dentro de HTML:

```
<script type="module">
  alert(import.meta.url); // script URL
  // para un script inline es la URL de la página HTML actual
</script>
```

## `En un módulo, “this” es indefinido (undefined)`

Esa es una característica menor, pero para completar, debemos mencionarla.

En un módulo, el nivel superior this no está definido.

Compárelo con scripts que no sean módulos, donde this es un objeto global:

```
<script>
  alert(this); // window
</script>

<script type="module">
  alert(this); // undefined
</script>
```

## `Funciones específicas del navegador`

También hay varias diferencias de scripts específicas del navegador con type =" module " en comparación con las normales.

### `Los módulos son diferidos`

Los módulos están siempre diferidos, el mismo efecto que el atributo `defer` (descrito en el capítulo Scripts: async, defer), para ambos scripts externos y en línea.

En otras palabras:

- descargar módulos externo `<script type="module" src="...">` no bloquea el procesamiento de HTML, se cargan en paralelo con otros recursos.

- los módulos esperan hasta que el documento HTML esté completamente listo (incluso si son pequeños y cargan más rápido que HTML), y luego lo ejecuta.

- se mantiene el orden relativo de los scripts: los scripts que van primero en el documento, se ejecutan primero.

### `Async funciona en scripts en línea`

Para los scripts que no son módulos, el atributo async solo funciona en scripts externos. Los scripts asíncronos se ejecutan inmediatamente cuando están listos, independientemente de otros scripts o del documento HTML.

Para los scripts de módulo, también funciona en scripts en línea.

Por ejemplo, el siguiente script en línea tiene async, por lo que no espera nada.

Realiza la importación (extrae ./Analytics.js) y se ejecuta cuando está listo, incluso si el documento HTML aún no está terminado o si aún hay otros scripts pendientes.

Eso es bueno para la funcionalidad que no depende de nada, como contadores, anuncios, detectores de eventos a nivel de documento.

### `Scripts externos`

Los scripts externos que tengan type="module" son diferentes en dos aspectos:

Los scripts externos con el mismo src sólo se ejecutan una vez:

```
<!-- el script my.js se extrae y ejecuta sólo una vez -->
<script type="module" src="my.js"></script>
<script type="module" src="my.js"></script>
```

Los scripts externos que se buscan desde otro origen (p.ej. otra sitio web) require encabezados CORS, como se describe en el capítulo Fetch: Cross-Origin Requests. En otras palabras, si un script de módulo es extraído desde otro origen, el servidor remoto debe proporcionar un encabezado Access-Control-Allow-Origin permitiendo la búsqueda.

```
<!-- otro-sitio-web.com debe proporcionar Access-Control-Allow-Origin -->
<!-- si no, el script no se ejecutará -->
<script type="module" src="http://otro-sitio-web.com/otro.js"></script>
```

Esto asegura mejor seguridad de forma predeterminada.

### `No se permiten módulos sueltos`

En el navegador, import debe obtener una URL relativa o absoluta. Los módulos sin ninguna ruta se denominan módulos sueltos. Dichos módulos no están permitidos en import.

Por ejemplo, este import no es válido:

```
import {sayHi} from 'sayHi'; // Error, módulo suelto
// el módulo debe tener una ruta, por ejemplo './sayHi.js' o dondequiera que el módulo esté
```

Ciertos entornos, como Node.js o herramientas de paquete permiten módulos simples sin ninguna ruta, ya que tienen sus propias formas de encontrar módulos y hooks para ajustarlos. Pero los navegadores aún no admiten módulos sueltos.

### `Compatibilidad, “nomodule”`

Los navegadores antiguos no entienden type = "module". Los scripts de un tipo desconocido simplemente se ignoran. Para ellos, es posible proporcionar un respaldo utilizando el atributo nomodule:

```
<script type="module">
  alert("Ejecuta en navegadores modernos");
</script>

<script nomodule>
  alert("Los navegadores modernos conocen tanto type=module como nomodule, así que omita esto")
  alert("Los navegadores antiguos ignoran la secuencia de comandos con type=module desconocido, pero ejecutan esto.");
</script>
```

## `Herramientas de Ensamblaje`

En la vida real, los módulos de navegador rara vez se usan en su forma “pura”. Por lo general, los agrupamos con una herramienta especial como `Webpack` y los implementamos en el servidor de producción.

Uno de los beneficios de usar empaquetadores – dan más control sobre cómo se resuelven los módulos, permitiendo módulos simples y mucho más, como los módulos `CSS/HTML`.

Las herramientas de compilación hacen lo siguiente:

- Toman un módulo “principal”, el que se pretende colocar en `<script type="module">` en HTML.

- Analiza sus dependencias: las importa y luego importaciones de importaciones etcétera.

- Compila un único archivo con todos los módulos (o múltiples archivos, eso es ajustable), reemplazando los llamados nativos de import con funciones del empaquetador para que funcione. Los módulos de tipo “Especial” como módulos HTML/CSS también son supported.

- Durante el proceso, otras transformaciones y optimizaciones se pueden aplicar:

  - Se elimina código inaccesible

  - Se elimina exportaciones sin utilizar (“tree-shaking”)

  - Sentencias específicas de desarrollo tales como console y debugger se eliminan

  - La sintaxis JavaScript moderna puede transformarse en una sintaxis más antigua con una funcionalidad similar utilizando Babel

  - El archivo resultante se minimiza. (se eliminan espacios, las variables se reemplazan con nombres cortos, etc).

Si utilizamos herramientas de ensamblaje, entonces, a medida que los scripts se agrupan en un solo archivo (o pocos archivos), las declaraciones import/export dentro de esos scripts se reemplazan por funciones especiales de ensamblaje. Por lo tanto, el script “empaquetado” resultante no contiene ninguna import/export, no requiere type="module", y podemos ponerla en un script normal:

```
<!-- Asumiendo que obtenemos bundle.js desde una herramienta como Webpack -->
<script src="bundle.js"></script>
```

Dicho esto, los módulos nativos también se pueden utilizar. Por lo tanto no estaremos utilizando Webpack aquí: tú lo podrás configurar más adelante.

<h2 style="color: green">Resumen</h2>

Para resumir, los conceptos centrales son:

- Un módulo es un archivo. Para que funcione `import/export`, los navegadores necesitan `<script type="module">`. Los módulos tienen varias diferencias:
  - Diferido por defecto.
  - Async funciona en scripts en línea.
  - Para cargar scripts externos de otro origen (dominio/protocolo/puerto), se necesitan encabezados CORS.
  - Se ignoran los scripts externos duplicados.
- Los módulos tienen su propio alcance local de alto nivel y funcionalidad de intercambio a través de ‘`import/export`’.
- Los módulos siempre usan use strict.
- El código del módulo se ejecuta solo una vez. Las exportaciones se crean una vez y se comparten entre los importadores.

Cuando usamos módulos, cada módulo implementa la funcionalidad y la exporta. Luego usamos import para importarlo directamente donde sea necesario. El navegador carga y evalúa los scripts automáticamente.

En la producción, las personas a menudo usan paquetes como Webpack para agrupar módulos por rendimiento y otras razones.

# `Export e Import`

Las directivas export e import tienen varias variantes de sintaxis.

En el artículo anterior vimos un uso simple, ahora exploremos más ejemplos.

## `Export antes de las sentencias`

Podemos etiquetar cualquier sentencia como exportada colocando ‘export’ antes, ya sea una variable, función o clase.

Por ejemplo, aquí todas las exportaciones son válidas:

```
// exportar un array
export let months = ['Jan', 'Feb', 'Mar','Apr', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

// exportar una constante
export const MODULES_BECAME_STANDARD_YEAR = 2015;

// exportar una clase
export clase User {
  constructor(name) {
    this.name = name;
  }
}
```

## `Sin punto y coma después de export clase/función`

Tenga en cuenta que export antes de una clase o una función no la hace una expresión de función. Sigue siendo una declaración de función, aunque exportada.

La mayoría de las guías de estilos JavaScript no recomiendan los punto y comas después de declarar funciones y clases.

Es por esto que no hay necesidad de un punto y coma al final de export class y export function:

````
export function sayHi(user) {
  alert(`Hello, ${user}!`);
}  // no ; at the end```
````

# `Export separado de la declaración`

También podemos colocar export por separado.

Aquí primero declaramos y luego exportamos:

```
// 📁 say.js
function sayHi(user) {
  alert(`Hello, ${user}!`);
}

function sayBye(user) {
  alert(`Bye, ${user}!`);
}

export {sayHi, sayBye}; // una lista de variables exportadas
```

…O, técnicamente podemos colocar export arriba de las funciones también.

# `Import *`

Generalmente, colocamos una lista de lo que queremos importar en llaves import {...}, de esta manera:

```
// 📁 main.js
import {sayHi, sayBye} from './say.js';

sayHi('John'); // Hello, John!
sayBye('John'); // Bye, John!
```

Pero si hay mucho para importar, podemos importar todo como un objeto utilizando import \* as <obj>, por ejemplo:

```
// 📁 main.js
import * as say from './say.js';

say.sayHi('John');
say.sayBye('John');
```

A primera vista, “importar todo” parece algo tan genial, corto de escribir, por qué deberíamos listar explícitamente lo que necesitamos importar?

Pues hay algunas razones.

- Listar explícitamente qué importar da nombres más cortos: `sayHi()` en lugar de say.`sayHi()`.

- La lista explícita de importaciones ofrece una mejor visión general de la estructura del código: qué se usa y dónde. Facilita el soporte de código y la refactorización.

## `No temas importar demasiado`

Las herramientas de empaquetado modernas, como webpack y otras, construyen los módulos juntos y optimizan la velocidad de carga. También eliminan las importaciones no usadas.

Por ejemplo, si importas import \* as library desde una librería de código enorme, y usas solo unos pocos métodos, los que no se usen no son incluidos en el paquete optimizado.

# `Importar “as”`

También podemos utilizar as para importar bajo nombres diferentes.

Por ejemplo, importemos sayHi en la variable local hi para brevedad, e importar sayBye como bye:

```
// 📁 main.js
import {sayHi as hi, sayBye as bye} from './say.js';

hi('John'); // Hello, John!
bye('John'); // Bye, John!
```

# `Exportar “as”`

Existe un sintaxis similar para export.

Exportemos funciones como hi y bye:

```
// 📁 say.js
...
export {sayHi as hi, sayBye as bye};
```

Ahora hi y bye son los nombres oficiales para desconocidos, a ser utilizados en importaciones:

```
// 📁 main.js
import * as say from './say.js';

say.hi('John'); // Hello, John!
say.bye('John'); // Bye, John!
```

# `Export default`

En la práctica, existen principalmente dos tipos de módulos.

- Módulos que contienen una librería, paquete de funciones, como say.js de arriba.

- Módulos que declaran una entidad simple, por ejemplo un módulo user.js exporta únicamente class User.

Principalmente, se prefiere el segundo enfoque, de modo que cada “cosa” reside en su propio módulo.

Naturalmente, eso requiere muchos archivos, ya que todo quiere su propio módulo, pero eso no es un problema en absoluto. En realidad, la navegación de código se vuelve más fácil si los archivos están bien nombrados y estructurados en carpetas.

Los módulos proporcionan una sintaxis especial ‘export default’ (“la exportación predeterminada”) para que la forma de “una cosa por módulo” se vea mejor.

Poner `export default` antes de la entidad a exportar:

```
// 📁 user.js
export default class User { // sólo agregar "default"
  constructor(name) {
    this.name = name;
  }
}
```

Sólo puede existir un sólo `export default` por archivo.

…Y luego importarlo sin llaves:

```
// 📁 main.js
import User from './user.js'; // no {User}, sólo User

new User('John');
```

Las importaciones sin llaves se ven mejor. Un error común al comenzar a usar módulos es olvidarse de las llaves. Entonces, recuerde, `import` necesita llaves para las exportaciones con nombre y no las necesita para la predeterminada.

| Export con nombre       | Export predeterminada           |
| ----------------------- | ------------------------------- |
| export class User {...} | export default class User {...} |
| import {User} from ...  | import User from ...            |

Técnicamente, podemos tener exportaciones predeterminadas y con nombre en un solo módulo, pero en la práctica la gente generalmente no las mezcla. Un módulo tiene exportaciones con nombre o la predeterminada.

## `El nombre “default”`

En algunas situaciones, la palabra clave `default` se usa para hacer referencia a la exportación predeterminada.

Por ejemplo, para exportar una función por separado de su definición:

```
function sayHi(user) {
  alert(`Hello, ${user}!`);
}

// lo mismo que si agregamos "export default" antes de la función
export {sayHi as default};
```

## `Unas palabras contra exportaciones predeterminadas`

Las exportaciones con nombre son explícitas. Nombran exactamente lo que importan, así que tenemos esa información de ellos; Eso es bueno.

Las exportaciones con nombre nos obligan a usar exactamente el nombre correcto para importar:

```
import {User} from './user.js';
// import {MyUser} no funcionará, el nombre debe ser {User}
```

…Mientras que para una exportación predeterminada siempre elegimos el nombre al importar:

```
import User from './user.js'; // funciona
import MyUser from './user.js'; // también funciona
// puede ser import Cualquiera... y aun funcionaría
```

Por lo tanto, los miembros del equipo pueden usar diferentes nombres para importar lo mismo, y eso no es bueno.

Por lo general, para evitar eso y mantener el código consistente, existe una regla que establece que las variables importadas deben corresponder a los nombres de los archivos, por ejemplo:

```
import User from './user.js';
import LoginForm from './loginForm.js';
import func from '/path/to/func.js';
...
```

Aún así, algunos equipos lo consideran un serio inconveniente de las exportaciones predeterminadas. Por lo tanto, prefieren usar siempre exportaciones con nombre. Incluso si solo se exporta una sola cosa, todavía se exporta con un nombre, sin `default`.

# `Reexportación`

La sintaxis ` “Reexportar” export ... from ...` permite importar cosas e inmediatamente exportarlas (posiblemente bajo otro nombre), de esta manera:

```
export {sayHi} from './say.js'; // reexportar sayHi

export {default as User} from './user.js'; // reexportar default
```

¿Por qué se necesitaría eso? Veamos un caso de uso práctico.

Imagine que estamos escribiendo un “paquete”: una carpeta con muchos módulos, con algunas de las funciones exportadas al exterior (herramientas como NPM nos permiten publicar y distribuir dichos paquetes pero no estamos obligados a usarlas), y muchos módulos son solo “ayudantes”, para uso interno en otros módulos de paquete.

La estructura de archivos podría ser algo así:

```
auth/
    index.js
    user.js
    helpers.js
    tests/
        login.js
    providers/
        github.js
        facebook.js
        ...
```

Nos gustaría exponer la funcionalidad del paquete a través de un único punto de entrada.

En otras palabras, una persona que quiera usar nuestro paquete, debería importar solamente el archivo principal `auth/index.js`.

Como esto:

```
import {login, logout} from 'auth/index.js'
```

El “archivo principal”, `auth/index.js`, exporta toda la funcionalidad que queremos brindar en nuestro paquete.

La idea es que los extraños, los desarrolladores que usan nuestro paquete, no deben entrometerse con su estructura interna, buscar archivos dentro de nuestra carpeta de paquetes. Exportamos solo lo que es necesario en `auth/index.js` y mantenemos el resto oculto a miradas indiscretas.

## `Reexportando la exportación predeterminada`

La exportación predeterminada necesita un manejo separado cuando se reexporta.

Digamos que tenemos user.js con export default class User, y nos gustaría volver a exportar la clase User de él:

```
// 📁 user.js
export default class User {
  // ...
}
```

Podemos tener dos problemas:

- `export User from './user.js'` no funcionará. Nos dará un error de sintaxis.

Para reexportar la exportación predeterminada, tenemos que escribir export {default as User}, tal como en el ejemplo de arriba.

- `export * from './user.js'` reexporta únicamente las exportaciones con nombre, pero ignora la exportación predeterminada.

Si queremos reexportar tanto la exportación con nombre como la predeterminada, se necesitan dos declaraciones:

```
export \* from './user.js'; // para reexportar exportaciones con nombre
export {default} from './user.js'; // para reexportar la exportación predeterminada
```

Tales rarezas de reexportar la exportación predeterminada son una de las razones por las que a algunos desarrolladores no les gustan las exportaciones predeterminadas y prefieren exportaciones con nombre.

<h2 style="color: green">Resumen</h2>

Aquí están todos los tipos de ‘exportación’ que cubrimos en este y en artículos anteriores.

Puede comprobarlo al leerlos y recordar lo que significan:

- Antes de la declaración de clase/función/…:
  - `export [default] clase/función/variable ...`
- Export independiente:
  - `export {x [as y], ...}`.
- Reexportar:
  - `export {x [as y], ...} from "module"`
  - `export \* from "module"` (no reexporta la predeterminada).
  - `export {default [as y]} from "module"` (reexporta la predeterminada).

Importación:

- Importa las exportaciones con nombre:
  - `import {x [as y], ...} from "module"`
- Importa la exportación predeterminada:
  - `import x from "module"`
  - `import {default as x} from "module"`
- Importa todo:
  - `import \* as obj from "module"`
- Importa el módulo (su código se ejecuta), pero no asigna ninguna de las exportaciones a variables:
  - `import "module"`

Podemos poner las declaraciones `import/export` en la parte superior o inferior de un script, eso no importa.

Entonces, técnicamente este código está bien:

```
sayHi();

// ...

import {sayHi} from './say.js'; // import al final del archivo
```

En la práctica, las importaciones generalmente se encuentran al comienzo del archivo, pero eso es solo para mayor comodidad.

Tenga en cuenta que las declaraciones de import/export no funcionan si están dentro {...}.

Una importación condicional, como esta, no funcionará:

```
if (something) {
import {sayHi} from "./say.js"; // Error: import debe estar en nivel superior
}
```

…Pero, ¿qué pasa si realmente necesitamos importar algo condicionalmente? O en el momento adecuado? Por ejemplo, ¿cargar un módulo a pedido, cuando realmente se necesita?

# `Importaciones dinámicas`

Las declaraciones de exportación e importación que cubrimos en capítulos anteriores se denominan “estáticas”. La sintaxis es muy simple y estricta.

Primero, no podemos generar dinámicamente ningún parámetro de `import`.

La ruta del módulo debe ser una cadena primitiva, no puede ser una llamada de función. Esto no funcionará:

```
import ... from getModuleName(); // Error, from sólo permite "string"
```

En segundo lugar, no podemos importar condicionalmente o en tiempo de ejecución:

```
if(...) {
  import ...; // ¡Error, no permitido!
}

{
  import ...; // Error, no podemos poner importación en ningún bloque.
}
```

Esto se debe a que `import/export` proporcionan una columna vertebral para la estructura del código. Eso es algo bueno, ya que la estructura del código se puede analizar, los módulos se pueden reunir y agrupar en un archivo mediante herramientas especiales, las exportaciones no utilizadas se pueden eliminar (“tree-shaken”). Eso es posible solo porque la estructura de las importaciones/exportaciones es simple y fija.

Pero, ¿cómo podemos importar un módulo dinámicamente, a petición?

## `La expresión import()`

La expresión `import(module)` carga el módulo y devuelve una promesa que se resuelve en un objeto de módulo que contiene todas sus exportaciones. Se puede llamar desde cualquier lugar del código.

Podemos usarlo dinámicamente en cualquier lugar del código, por ejemplo:

```
let modulePath = prompt("¿Qué modulo cargar?");

import(modulePath)
  .then(obj => <module object>)
  .catch(err => <loading error, e.g. if no such module>)
```

O, podríamos usar `let module = await import(modulePath)` si está dentro de una función asíncrona.

Por ejemplo, si tenemos el siguiente módulo `say.js`:

```
// 📁 say.js
export function hi() {
  alert(`Hola`);
}

export function bye() {
  alert(`Adiós`);
}
```

…Entonces la importación dinámica puede ser así:

```
let {hi, bye} = await import('./say.js');

hi();
bye();
```

O, si say.js tiene la exportación predeterminada:

```
// 📁 say.js
export default function() {
  alert("Módulo cargado (export default)!");
}
```

…Luego, para acceder a él, podemos usar la propiedad default del objeto del módulo:

```
let obj = await import('./say.js');
let say = obj.default;
// o, en una línea: let {default: say} = await import('./say.js');

say();
```

Aquí está el ejemplo completo:

```
<!doctype html>
<script>
  async function load() {
    let say = await import('./say.js');
    say.hi(); // ¡Hola!
    say.bye(); // ¡Adiós!
    say.default(); // Módulo cargado (export default)!
  }
</script>
<button onclick="load()">Click me</button>
```

<h2 style="color: red">Por favor tome nota:</h2>

Las importaciones dinámicas funcionan en scripts normales, no requieren `script type="module"`.

<h2 style="color: red">Por favor tome nota:</h2>

Aunque `import()` parece una llamada de función, es una sintaxis especial que solo usa paréntesis (similar a `super ()`).

Por lo tanto, no podemos copiar `import` a una variable o usar `call/apply` con ella. No es una función.

[TOP](#modulos)
