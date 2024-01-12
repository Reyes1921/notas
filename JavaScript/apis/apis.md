[Volver al Menú](../root.md)

# `Working with APIs`

# `Fetch`

Se utiliza el término global “AJAX” (abreviado Asynchronous JavaScript And XML, en español: “JavaScript y XML Asincrónico”) para referirse a las peticiones de red originadas desde JavaScript. Sin embargo, no estamos necesariamente condicionados a utilizar XML dado que el término es antiguo y es por esto que el acrónimo XML se encuentra aquí. Probablemente lo hayáis visto anteriormente.

Existen múltiples maneras de enviar peticiones de red y obtener información de un servidor.

Comenzaremos con el el método fetch() que es moderno y versátil. Este método no es soportado por navegadores antiguos (sin embargo se puede incluir un polyfill), pero es perfectamente soportado por los navegadores actuales y modernos.

La sintaxis básica es la siguiente:

`let promise = fetch(url, [options])`

- `url` – representa la dirección URL a la que deseamos acceder.

- `options` – representa los parámetros opcionales, como puede ser un método o los encabezados de nuestra petición, etc.

Si no especificamos ningún `options`, se ejecutará una simple petición GET, la cual descargará el contenido de lo especificado en el `url`.

El navegador lanzará la petición de inmediato y devolverá una promesa (promise) que luego será utilizada por el código invocado para obtener el resultado.

Por lo general, obtener una respuesta es un proceso de dos pasos.

`Primero, la promesa promise, devuelta por fetch, resuelve la respuesta con un objeto de la clase incorporada Response tan pronto como el servidor responde con los encabezados de la petición.`

En este paso, podemos chequear el status HTTP para poder ver si nuestra petición ha sido exitosa o no, y chequear los encabezados, pero aún no disponemos del cuerpo de la misma.

La promesa es rechazada si el `fetch` no ha podido establecer la petición HTTP, por ejemplo, por problemas de red o si el sitio especificado en la petición no existe. `Estados HTTP anormales, como el 404 o 500 no generan errores.`

Podemos visualizar los estados HTTP en las propiedades de la respuesta:

- `status` – código de estado HTTP, por ejemplo: 200.

- `ok` – booleana, true si el código de estado HTTP es 200 a 299.

Ejemplo:

```
let response = await fetch(url);

if (response.ok) { // si el HTTP-status es 200-299
  // obtener cuerpo de la respuesta (método debajo)
  let json = await response.json();
} else {
  alert("Error-HTTP: " + response.status);
}
```

`Segundo, para obtener el cuerpo de la respuesta, necesitamos utilizar un método adicional.`

`Response` provee múltiples métodos basados en promesas para acceder al cuerpo de la respuesta en distintos formatos:

- `response.text()` – lee y devuelve la respuesta en formato texto,

- `response.json()` – convierte la respuesta como un JSON,

- `response.formData()` – devuelve la respuesta como un objeto FormData,

- `response.blob()` – devuelve la respuesta como Blob (datos binarios tipados),

- `response.arrayBuffer()` – devuelve la respuesta como un objeto ArrayBuffer (representación binaria de datos de bajo nivel),

- Adicionalmente, `response.body `es un objeto ReadableStream, el cual nos permite acceder al cuerpo como si fuera un stream y leerlo por partes.

Por ejemplo, si obtenemos un objeto de tipo JSON con los últimos commits de GitHub:

```
let url = 'https://api.github.com/repos/javascript-tutorial/en.javascript.info/commits';
let response = await fetch(url);

let commits = await response.json(); // leer respuesta del cuerpo y devolver como JSON

alert(commits[0].author.login);
```

O también usando promesas, en lugar de await:

```
fetch('https://api.github.com/repos/javascript-tutorial/en.javascript.info/commits')
.then(response => response.json())
.then(commits => alert(commits[0].author.login));
```

<h2 style="color: red">Importante</h2>

Podemos elegir un solo método de lectura para el cuerpo de la respuesta.

Si ya obtuvimos la respuesta con response.text(), entonces response.json() no funcionará, dado que el contenido del cuerpo ya ha sido procesado.

```
let text = await response.text(); // cuerpo de respuesta obtenido y procesado
let parsed = await response.json(); // fallo (ya fue procesado)
```

## `Encabezados de respuesta`

Los encabezados de respuesta están disponibles como un objeto de tipo Map dentro del `response.headers`.

No es exactamente un Map, pero posee métodos similares para obtener de manera individual encabezados por nombre o si quisiéramos recorrerlos como un objeto:

```
let response = await fetch('https://api.github.com/repos/javascript-tutorial/en.javascript.info/commits');

// obtenemos un encabezado
alert(response.headers.get('Content-Type')); // application/json; charset=utf-8

// iteramos todos los encabezados
for (let [key, value] of response.headers) {
  alert(`${key} = ${value}`);
}
```

## `Encabezados de petición`

Para especificar un encabezado en nuestro fetch, podemos utilizar la opción headers. La misma posee un objeto con los encabezados salientes, como se muestra en el siguiente ejemplo:

```
let response = fetch(protectedUrl, {
  headers: {
    Authentication: 'secret'
  }
});
```

…Pero existe una lista de encabezados que no pueden ser especificados:

- `Accept-Charset, Accept-Encoding`

- `Access-Control-Request-Headers`

- `Access-Control-Request-Method`

- `Connection`

- `Content-Length`

- `Cookie, Cookie2`

- `Date`

- `DNT`

- `Expect`

- `Host`

- `Keep-Alive`

- `Origin`

- `Referer`

- `TE`

- `Trailer`

- `Transfer-Encoding`

- `Upgrade`

- `Via`

- `Proxy-\_`

- `Sec-\_`

Estos encabezados nos aseguran que nuestras peticiones HTTP sean controladas exclusivamente por el navegador, de manera correcta y segura.

## `Peticiones POST`

Para ejecutar una petición `POST`, o cualquier otro método, utilizaremos las opciones de `fetch`:

- `method` – método HTTP, por ej: `POST`,

- `body` – cuerpo de la respuesta, cualquiera de las siguientes:

  - cadena de texto (ej. JSON-encoded),
  - Objeto FormData, para enviar información como multipart/form-data,
  - Blob/BufferSource para enviar información en formato binario,
  - URLSearchParams, para enviar información en cifrado x-www-form-urlencoded (no utilizado frecuentemente).
  - El formato JSON es el más utilizado.

Por ejemplo, el código debajo envía la información user como un objeto JSON:

```
let user = {
  nombre: 'Juan',
  apellido: 'Perez'
};

let response = await fetch('/article/fetch/post/user', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json;charset=utf-8'
  },
  body: JSON.stringify(user)
});

let result = await response.json();
alert(result.message);
```

Tener en cuenta, si la respuesta del `body` es una cadena de texto, entonces el encabezado `Content-Type` será especificado como `text/plain;charset=UTF-8` por defecto.

Pero, cómo vamos a enviar un objeto JSON, en su lugar utilizaremos la opción `headers` especificada a `application/json`, que es la opción correcta `Content-Type` para información en formato JSON.

## `Enviando una imagen`

También es posible enviar datos binarios con `fetch`, utilizando los objetos `Blob` o `BufferSource`.

En el siguiente ejemplo, utilizaremos un `<canvas>` donde podremos dibujar utilizando nuestro ratón. Haciendo click en el botón “enviar” enviará la imagen al servidor:

```
<body style="margin:0">
  <canvas id="canvasElem" width="100" height="80" style="border:1px solid"></canvas>

  <input type="button" value="Enviar" onclick="submit()">

  <script>
    canvasElem.onmousemove = function(e) {
      let ctx = canvasElem.getContext('2d');
      ctx.lineTo(e.clientX, e.clientY);
      ctx.stroke();
    };

    async function submit() {
      let blob = await new Promise(resolve => canvasElem.toBlob(resolve, 'image/png'));
      let response = await fetch('/article/fetch/post/image', {
        method: 'POST',
        body: blob
      });

      // el servidor responde con una confirmación y el tamaño de nuestra imagen
      let result = await response.json();
      alert(result.message);
    }

  </script>
</body>
```

Una aclaración, aquí no especificamos el `Content-Type` de manera manual, precisamente porque el objeto `Blob` posee un tipo incorporado (en este caso image/png, el cual es generado por la función toBlob). Para objetos Blob ese es el valor por defecto del encabezado `Content-Type`.

Podemos reescribir la función submit() sin utilizar `async/await` de la siguiente manera:

```
function submit() {
  canvasElem.toBlob(function(blob) {
    fetch('/article/fetch/post/image', {
      method: 'POST',
      body: blob
    })
      .then(response => response.json())
      .then(result => alert(JSON.stringify(result, null, 2)))
  }, 'image/png');
}
```

[Mas Informacion](https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch)

# `FormData`

Este capítulo trata sobre el envío de formularios HTML: con o sin archivos, con campos adicionales y cosas similares.

Los objetos FormData pueden ser de ayuda en esta tarea. Tal como habrás supuesto, éste es el objeto encargado de representar los datos de los formularios HTML.

El constructor es:

`let formData = new FormData([form]);`

Si se le brinda un elemento HTML `form`, el objeto automáticamente capturará sus campos.

Lo que hace especial al objeto `FormData` es que los métodos de red, tales como `fetch`, pueden aceptar un objeto `FormData` como el cuerpo. Es codificado y enviado como `Content-Type: multipart/form-data`.

Desde el punto de vista del servidor, se ve como una entrega normal.

## `Enviando un formulario simple`

Enviemos un formulario simple.

Tal como se puede ver, es prácticamente una línea:

```
<form id="formElem">
  <input type="text" name="name" value="John">
  <input type="text" name="surname" value="Smith">
  <input type="submit">
</form>

<script>
  formElem.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch('/article/formdata/post/user', {
      method: 'POST',
      body: new FormData(formElem)
    });

    let result = await response.json();

    alert(result.message);
  };
</script>
```

## `Enviando un formulario con datos Blob`

Tal como pudimos ver en el capítulo Fetch, es fácil enviar datos binarios generados dinámicamente (por ejemplo una imagen) como `Blob`. Podemos proporcionarlos directamente en un `fetch` con el parámetro `body`.

De todos modos, en la práctica suele ser conveniente enviar la imagen como parte del formulario junto a otra metadata tal como el nombre y no de forma separada.

Además los servidores suelen ser más propensos a aceptar formularios multipart, en lugar de datos binarios sin procesar.

Este ejemplo envía una imagen desde un `<canvas>` junto con algunos campos más, como un formulario utilizando FormData:

```
<body style="margin:0">
  <canvas id="canvasElem" width="100" height="80" style="border:1px solid"></canvas>

  <input type="button" value="Submit" onclick="submit()">

  <script>
    canvasElem.onmousemove = function(e) {
      let ctx = canvasElem.getContext('2d');
      ctx.lineTo(e.clientX, e.clientY);
      ctx.stroke();
    };

    async function submit() {
      let imageBlob = await new Promise(resolve => canvasElem.toBlob(resolve, 'image/png'));

      let formData = new FormData();
      formData.append("firstName", "John");
      formData.append("image", imageBlob, "image.png");

      let response = await fetch('/article/formdata/post/image-form', {
        method: 'POST',
        body: formData
      });
      let result = await response.json();
      alert(result.message);
    }

  </script>
</body>
```

# `Fetch: Progreso de la descarga`

El método `fetch` permite rastrear el progreso de descarga.

Ten en cuenta: actualmente no hay forma de que `fetch` rastree el progreso de carga. Para ese propósito, utiliza `XMLHttpRequest`.

Para rastrear el progreso de la descarga, podemos usar la propiedad `response.body`. Esta propiedad es un `ReadableStream`, un objeto especial que proporciona la transmisión del cuerpo fragmento a fragmento tal como viene.

A diferencia de `response.text()`, `response.json()` y otros métodos, `response.body` da control total sobre el proceso de lectura, y podemos contar cuánto se consume en cualquier momento.

Aquí está el bosquejo del código que lee la respuesta de `response.body`:

```
// en lugar de response.json() y otros métodos
const reader = response.body.getReader();

// bucle infinito mientras el cuerpo se descarga
while(true) {
// done es true para el último fragmento
// value es Uint8Array de los bytes del fragmento
const {done, value} = await reader.read();

if (done) {
break;
}

console.log(`Recibí ${value.length} bytes`)
}
```

El resultado de la llamada await `reader.read()` es un objeto con dos propiedades:

- `done` – true cuando la lectura está completa, de lo contrario `false`.

- `value` – una matriz de tipo bytes: `Uint8Array`.

Recibimos fragmentos de respuesta en el bucle, hasta que finaliza la carga, es decir: hasta que `done` se convierte en `true`.

Para registrar el progreso, solo necesitamos que cada `value` de fragmento recibido agregue su longitud al contador.

Aquí está el ejemplo funcional completo que obtiene la respuesta y registra el progreso en la consola, seguido de su explicación:

```
// Paso 1: iniciar la búsqueda y obtener un lector
let response = await fetch('https://api.github.com/repos/javascript-tutorial/es.javascript.info/commits?per_page=100');

const reader = response.body.getReader();

// Paso 2: obtener la longitud total
const contentLength = +response.headers.get('Content-Length');

// Paso 3: leer los datos
let receivedLength = 0; // cantidad de bytes recibidos hasta el momento
let chunks = []; // matriz de fragmentos binarios recibidos (comprende el cuerpo)
while(true) {
  const {done, value} = await reader.read();

  if (done) {
    break;
  }

  chunks.push(value);
  receivedLength += value.length;

  console.log(`Recibí ${receivedLength} de ${contentLength}`)
}

// Paso 4: concatenar fragmentos en un solo Uint8Array
let chunksAll = new Uint8Array(receivedLength); // (4.1)
let position = 0;
for(let chunk of chunks) {
  chunksAll.set(chunk, position); // (4.2)
  position += chunk.length;
}

// Paso 5: decodificar en un string
let result = new TextDecoder("utf-8").decode(chunksAll);

// ¡Hemos terminado!
let commits = JSON.parse(result);
alert(commits[0].author.login);
```

Expliquemos esto paso a paso:

- Realizamos `fetch` como de costumbre, pero en lugar de llamar a `response.json()`, obtenemos un lector de transmisión `response.body.getReader()`.

Ten en cuenta que no podemos usar ambos métodos para leer la misma respuesta: usa un lector o un método de respuesta para obtener el resultado.

- Antes de leer, podemos averiguar la longitud completa de la respuesta del encabezado `Content-Length`.

Puede estar ausente para solicitudes cross-origin (consulta el capítulo `Fetch`: Cross-Origin Requests) y, bueno, técnicamente un servidor no tiene que configurarlo. Pero generalmente está en su lugar.

- Llama a `await reader.read()` hasta que esté listo.

Recopilamos fragmentos de respuesta en la matriz `chunks`. Eso es importante, porque después de consumir la respuesta, no podremos “releerla” usando `response.json()` u otra forma (puedes intentarlo, habrá un error).

- Al final, tenemos `chunks` – una matriz de fragmentos de bytes Uint8Array. Necesitamos unirlos en un solo resultado. Desafortunadamente, no hay un método simple que los concatene, por lo que hay un código para hacerlo:

Creamos `chunksAll = new Uint8Array(selectedLength)` – una matriz del mismo tipo con la longitud combinada.
Luego usa el método .set(chunk, position) para copiar cada chunk uno tras otro en él.

- Tenemos el resultado en `chunksAll`. Sin embargo, es una matriz de bytes, no un string.

Para crear un string, necesitamos interpretar estos bytes. El TextDecoder nativo hace exactamente eso. Luego podemos usar el resultado en JSON.parse, si es necesario.

¿Qué pasa si necesitamos contenido binario en lugar de un string? Eso es aún más sencillo. Reemplaza los pasos 4 y 5 con una sola línea que crea un Blob de todos los fragmentos:

`let blob = new Blob(chunks);`

Al final tenemos el resultado (como un string o un blob, lo que sea conveniente) y el seguimiento del progreso en el proceso.

Una vez más, ten en cuenta que eso no es para el progreso de carga (hasta ahora eso no es posible con `fetch`), solo para el progreso de descarga.

Además, si el tamaño es desconocido, deberíamos chequear `receivedLength` en el bucle y cortarlo en cuanto alcance cierto límite, así los `chunks` no agotarán la memoria.

# `Fetch: Abort`

Como sabemos `fetch` devuelve una promesa. Y generalmente JavaScript no tiene un concepto de “abortar” una promesa. Entonces, ¿cómo podemos abortar una llamada al método `fetch`? Por ejemplo si las acciones del usuario en nuestro sitio indican que `fetch` no se necesitará más.

Existe para esto de forma nativa un objeto especial: `AbortController`. Puede ser utilizado para abortar no solo `fetch` sino otras tareas asincrónicas también.

Su uso es muy sencillo:

## `El objeto AbortController`

Crear un controlador:

```
let controller = new AbortController();
```

Este controlador es un objeto extremadamente simple.

- Tiene un único método abort(),

- y una única propiedad signal que permite establecerle escuchadores de eventos.

Cuando abort() es invocado:

- controller.signal emite el evento "abort".

- La propiedad controller.signal.aborted toma el valor true.

Generalmente tenemos dos partes en el proceso:

- El que ejecuta la operación de cancelación, genera un listener que escucha a controller.signal.

- El que cancela: este llama a controller.abort() cuando es necesario.

Tal como se muestra a continuación (por ahora sin fetch):

```
let controller = new AbortController();
let signal = controller.signal;

// La parte que ejecuta la operación de cancelación
// obtiene el objeto "signal"
// y genera un listener que se dispara cuando es llamado controller.abort()
signal.addEventListener('abort', () => alert("abort!"));

// El que cancela (más tarde en cualquier punto):
controller.abort(); // abort!

// El  evento se dispara y signal.aborted se vuelve true
alert(signal.aborted); // true
```

Como podemos ver, `AbortController` es simplemente la via para pasar eventos `abort` cuando `abort()` es llamado sobre él.

Podríamos implementar alguna clase de escucha de evento en nuestro código por nuestra cuenta, sin el objeto `AbortController` en absoluto.

Pero lo valioso es que fetch sabe cómo trabajar con el objeto `AbortController`, está integrado con él.

## `Uso con fetch`

Para posibilitar la cancelación de fetch, pasa la propiedad signal de un `AbortController` como una opción de fetch:

```
let controller = new AbortController();
fetch(url, {
  signal: controller.signal
});
```

El método fetch conoce cómo trabajar con `AbortController`. Este escuchará eventos abort sobre signal.

Ahora, para abortar, llamamos `controller.abort()`:

`controller.abort();`

Terminamos: `fetch` obtiene el evento desde signal y aborta el requerimiento.

Cuando un `fetch` es abortado, su promesa es rechazada con un error AbortError, así podemos manejarlo, por ejemplo en `try..catch`.

Aquí hay un ejemplo completo con `fetch` abortado después de 1 segundo:

```
// Se abortara en un segundo
let controller = new AbortController();
setTimeout(() => controller.abort(), 1000);

try {
  let response = await fetch('/article/fetch-abort/demo/hang', {
    signal: controller.signal
  });
} catch(err) {
  if (err.name == 'AbortError') { // se maneja el abort()
    alert("Aborted!");
  } else {
    throw err;
  }
}
```

## `AbortController es escalable`

`AbortController` es escalable, permite cancelar múltiples fetch de una vez.

Aquí hay un bosquejo de código que de muchos fetch de url en paralelo, y usa un simple controlador para abortarlos a todos:

```
let urls = [...]; // una lista de urls para utilizar fetch en paralelo

let controller = new AbortController();

// un array de promesas fetch
let fetchJobs = urls.map(url => fetch(url, {
  signal: controller.signal
}));

let results = await Promise.all(fetchJobs);

// si controller.abort() es llamado,
// se abortaran todas las solicitudes fetch
```

En el caso de tener nuestras propias tareas asincrónicas aparte de `fetch`, podemos utilizar un único `AbortController` para detenerlas junto con `fetch`.

Solo es necesario escuchar el evento `abort` en nuestras tareas:

```
let urls = [...];
let controller = new AbortController();

let ourJob = new Promise((resolve, reject) => { // nuestra tarea
  ...
  controller.signal.addEventListener('abort', reject);
});

let fetchJobs = urls.map(url => fetch(url, { // varios fetch
  signal: controller.signal
}));

// Se espera por la finalización de los fetch y nuestra tarea
let results = await Promise.all([...fetchJobs, ourJob]);

// en caso de que se llame al método controller.abort() desde algún sitio,
// se abortan todos los fetch y nuestra tarea.
```

# `Fetch: Cross-Origin Requests`

[Esa info esta aqui](../../Web%20Security%20Knowledge/cors.md)

# `Fetch API`

Veamos el resto de API, para cubrir todas sus capacidades.

<h2 style="color: red">Por favor tome nota:</h2>
Ten en cuenta: la mayoría de estas opciones se utilizan con poca frecuencia. Puedes saltarte este capítulo y seguir utilizando bien fetch.

Aún así, es bueno saber lo que puede hacer fetch, por lo que si surge la necesidad, puedes regresar y leer los detalles.

Aquí está la lista completa de todas las posibles opciones de fetch con sus valores predeterminados (alternativas en los comentarios):

```
let promise = fetch(url, {
  method: "GET", // POST, PUT, DELETE, etc.
  headers: {
    // el valor del encabezado Content-Type generalmente se establece automáticamente
    // dependiendo del cuerpo de la solicitud
    "Content-Type": "text/plain;charset=UTF-8"
  },
  body: undefined, // string, FormData, Blob, BufferSource, o URLSearchParams
  referrer: "about:client", // o "" para no enviar encabezado de Referrer,
  // o una URL del origen actual
  referrerPolicy: "strict-origin-when-cross-origin", // no-referrer-when-downgrade, no-referrer, origin, same-origin...
  mode: "cors", // same-origin, no-cors
  credentials: "same-origin", // omit, include
  cache: "default", // no-store, reload, no-cache, force-cache, o only-if-cached
  redirect: "follow", // manual, error
  integrity: "", // un hash, como "sha256-abcdef1234567890"
  keepalive: false, // true
  signal: undefined, // AbortController para cancelar la solicitud
  window: window // null
});
```

Una lista impresionante, ¿verdad?

Cubrimos completamente method, headers y body en el capítulo Fetch.

La opción signal está cubierta en Fetch: Abort.

## `mode`

La opción mode es una protección que evita solicitudes cross-origin ocasionales:

- "cors" – por defecto, se permiten las solicitudes cross-origin predeterminadas, como se describe en Fetch: Cross-Origin Requests,
- "same-origin" – las solicitudes cross-origin están prohibidas,
- "no-cors" – solo se permiten solicitudes cross-origin seguras.

Esta opción puede ser útil cuando la URL de fetch proviene de un tercero y queremos un “interruptor de apagado” para limitar las capacidades cross-origin.

## `credentials`

La opción credentials especifica si fetch debe enviar cookies y encabezados de autorización HTTP con la solicitud.

- "same-origin" – el valor predeterminado, no enviar solicitudes cross-origin,
- "include" – enviar siempre, requiere Access-Control-Allow-Credentials del servidor cross-origin para que JavaScript acceda a la respuesta, que se cubrió en el capítulo Fetch: Cross-Origin Requests,
- "omit" – nunca enviar, incluso para solicitudes del mismo origen.

[Mas Información](https://es.javascript.info/fetch-api)

# `Objetos URL`

La clase URL incorporada brinda una interfaz conveniente para crear y analizar URLs.

No hay métodos de networking que requieran exactamente un objeto URL, los strings son suficientemente buenos para eso. Así que técnicamente no tenemos que usar URL. Pero a veces puede ser realmente útil.

## `Creando una URL`

```
new URL(url, [base])
```

- `url` – La URL completa o ruta única (si se establece base, mira a continuación),
- `base` – una URL base opcional: si se establece y el argumento url solo tiene una ruta, entonces la URL se genera relativa a base.

Por ejemplo:

```
let url = new URL('https://javascript.info/profile/admin');
```

Estas dos URLs son las mismas:

```
let url1 = new URL('https://javascript.info/profile/admin');
let url2 = new URL('/profile/admin', 'https://javascript.info');
```

El objeto URL inmediatamente nos permite acceder a sus componentes, por lo que es una buena manera de analizar la url, por ej.:

```
let url = new URL('https://javascript.info/url');

alert(url.protocol); // https:
alert(url.host);     // javascript.info
alert(url.pathname); // /url
```
Aquí está la hoja de trucos para los componentes URL:

<img src="url-object.svg">

- `href` es la url completa, igual que url.toString()
- `protocol` acaba con el carácter dos puntos :
- `search` – un string de parámetros, comienza con el signo de interrogación ?
- `hash` comienza con el carácter de hash #
También puede haber propiedades user y password si la autenticación HTTP esta presente: http://login:password@site.com (no mostrados arriba, raramente usados)

## `Parámetros de búsqueda “?…”`

Digamos que queremos crear una url con determinados parámetros de búsqueda, por ejemplo, `https://google.com/search?query=JavaScript.`

Podemos proporcionarlos en el string URL:

`new URL('https://google.com/search?query=JavaScript')`

…Pero los parámetros necesitan estar codificados si contienen espacios, letras no latinas, entre otros (Más sobre eso debajo).

Por lo que existe una propiedad URL para eso: url.searchParams, un objeto de tipo URLSearchParams.

Esta proporciona métodos convenientes para los parámetros de búsqueda:

- `append(name, value)` – añade el parámetro por name,
- `delete(name)` – elimina el parámetro por name,
- `get(name)` – obtiene el parámetro por name,
- `getAll(name)` – obtiene todos los parámetros con el mismo name (Eso es posible, por ej. ?user=John&user=Pete),
- `has(name)` – comprueba la existencia del parámetro por name,
- `set(name, value)` – establece/reemplaza el parámetro,
- `sort()` – ordena parámetros por name, raramente necesitado,
- …y además es iterable, similar a Map.

## `Codificación`

Existe un estándar RFC3986 que define cuales caracteres son permitidos en URLs y cuales no.

Esos que no son permitidos, deben ser codificados, por ejemplo letras no latinas y espacios – reemplazados con sus códigos UTF-8, con el prefijo %, tal como %20 (un espacio puede ser codificado con +, por razones históricas, pero esa es una excepción).

La buena noticia es que los objetos URL manejan todo eso automáticamente. Nosotros sólo proporcionamos todos los parámetros sin codificar, y luego convertimos la URL a string:

```
// Usando algunos caracteres cirílicos para este ejemplo

let url = new URL('https://ru.wikipedia.org/wiki/Тест');

url.searchParams.set('key', 'ъ');
alert(url); //https://ru.wikipedia.org/wiki/%D0%A2%D0%B5%D1%81%D1%82?key=%D1%8A
```

## `Codificando strings`

En los viejos tiempos, antes de que los objetos URL aparecieran, la gente usaba strings para las URL.

A partir de ahora, los objetos URL son frecuentemente más convenientes, pero también aún pueden usarse los strings. En muchos casos usando un string se acorta el código.

Aunque si usamos un string, necesitamos codificar/decodificar caracteres especiales manualmente.

Existen funciones incorporadas para eso:

- `encodeURI` – Codifica la URL como un todo.
- `decodeURI` – La decodifica de vuelta.
- `encodeURIComponent` – Codifica un componente URL, como un parametro de busqueda, un hash, o un pathname.
- `decodeURIComponent` – La decodifica de vuelta.

# `XMLHttpRequest`

`XMLHttpRequest` es un objeto nativo del navegador que permite hacer solicitudes HTTP desde JavaScript.

A pesar de tener la palabra “XML” en su nombre, se puede operar sobre cualquier dato, no solo en formato XML. Podemos cargar y descargar archivos, dar seguimiento y mucho más.

Ahora hay un método más moderno `fetch` que en algún sentido hace obsoleto a `XMLHttpRequest`.

En el desarrollo web moderno `XMLHttpRequest` se usa por tres razones:

- Razones históricas: necesitamos soportar scripts existentes con XMLHttpRequest.
- Necesitamos soportar navegadores viejos, y no queremos polyfills (p.ej. para mantener los scripts pequeños).
- Necesitamos hacer algo que fetch no puede todavía, ej. rastrear el progreso de subida.

## `Lo básico`

XMLHttpRequest tiene dos modos de operación: sincrónica y asíncrona.

Para hacer la petición, necesitamos seguir 3 pasos:

- 1. Crear el objeto XMLHttpRequest:

  `let xhr = new XMLHttpRequest();`
  
- 2. Inicializarlo, usualmente justo después de new XMLHttpRequest:

  `xhr.open(method, URL, [async, user, password])`

Este método especifica los parámetros principales para la petición:

- `method` – método HTTP. Usualmente "GET" o "POST".
- `URL` – la URL a solicitar, una cadena, puede ser un objeto URL.
- `async` – si se asigna explícitamente a false, entonces la petición será asincrónica. Cubriremos esto un poco más adelante.
- `user`, `password` – usuario y contraseña para autenticación HTTP básica (si se requiere).

Por favor, toma en cuenta que la llamada a open, contrario a su nombre, no abre la conexión. Solo configura la solicitud, pero la actividad de red solo empieza con la llamada del método `send`.

- 3. Enviar.

  `xhr.send([body])`

Este método abre la conexión y envía ka solicitud al servidor. El parámetro adicional body contiene el cuerpo de la solicitud.

Algunos métodos como GET no tienen un cuerpo. Y otros como POST usan el parámetro body para enviar datos al servidor.

- 4. Escuchar los eventos de respuesta xhr.

Estos son los tres eventos más comúnmente utilizados:

- `load` – cuando la solicitud está; completa (incluso si el estado HTTP es 400 o 500), y la respuesta se descargó por completo.
- `error` – cuando la solicitud no pudo ser realizada satisfactoriamente, ej. red caída o una URL inválida.
- `progress` – se dispara periódicamente mientras la respuesta está siendo descargada, reporta cuánto se ha descargado.

```
xhr.onload = function() {
  alert(`Cargado: ${xhr.status} ${xhr.response}`);
};

xhr.onerror = function() { // solo se activa si la solicitud no se puede realizar
  alert(`Error de red`);
};

xhr.onprogress = function(event) { // se dispara periódicamente
  // event.loaded - cuántos bytes se han descargado
  // event.lengthComputable = devuelve true si el servidor envía la cabecera Content-Length (longitud del contenido)
  // event.total - número total de bytes (si `lengthComputable` es `true`)
  alert(`Recibido ${event.loaded} of ${event.total}`);
};
```

Aquí un ejemplo completo. El siguiente código carga la URL en /article/xmlhttprequest/example/load desde el servidor e imprime el progreso:

```
// 1. Crea un nuevo objeto XMLHttpRequest
let xhr = new XMLHttpRequest();

// 2. Configuración: solicitud GET para la URL /article/.../load
xhr.open('GET', '/article/xmlhttprequest/example/load');

// 3. Envía la solicitud a la red
xhr.send();

// 4. Esto se llamará después de que la respuesta se reciba
xhr.onload = function() {
  if (xhr.status != 200) { // analiza el estado HTTP de la respuesta
    alert(`Error ${xhr.status}: ${xhr.statusText}`); // ej. 404: No encontrado
  } else { // muestra el resultado
    alert(`Hecho, obtenidos ${xhr.response.length} bytes`); // Respuesta del servidor
  }
};

xhr.onprogress = function(event) {
  if (event.lengthComputable) {
    alert(`Recibidos ${event.loaded} de ${event.total} bytes`);
  } else {
    alert(`Recibidos ${event.loaded} bytes`); // sin Content-Length
  }

};

xhr.onerror = function() {
  alert("Solicitud fallida");
};
```

Una vez el servidor haya respondido, podemos recibir el resultado en las siguientes propiedades de `xhr`:

`status`
Código del estado HTTP (un número): 200, 404, 403 y así por el estilo, puede ser 0 en caso de una falla no HTTP.

`statusText`
Mensaje del estado HTTP (una cadena): usualmente OK para 200, Not Found para 404, Forbidden para 403 y así por el estilo.

`response` (scripts antiguos deben usar responseText)
El cuerpo de la respuesta del servidor.

## `Tipo de respuesta`

Podemos usar la propiedad xhr.responseType para asignar el formato de la respuesta:

- "" (`default`) – obtiene una cadena,
- "`text`" – obtiene una cadena,
- "`arraybuffer`" – obtiene un ArrayBuffer (para datos binarios, ve el capítulo ArrayBuffer, arrays binarios),
- "`blob`" – obtiene un Blob (para datos binarios, ver el capítulo Blob),
- "`document`" – obtiene un documento XML (puede usar XPath y otros métodos XML) o un documento HTML (en base al tipo MIME del dato recibido),
- "`json`" – obtiene un JSON (automáticamente analizado).

## `Estados`

`XMLHttpRequest` cambia entre estados a medida que avanza. El estado actual es accesible como `xhr.readyState`.

Todos los estados, como en la especificación:

```
UNSENT = 0; // estado inicial
OPENED = 1; // llamada abierta
HEADERS_RECEIVED = 2; // cabeceras de respuesta recibidas
LOADING = 3; // la respuesta está cargando (un paquete de datos es recibido)
DONE = 4; // solicitud completa
```

Un objeto `XMLHttpRequest` escala en orden `0` → `1` → `2` → `3` → … → `3` → `4`. El estado 3 se repite cada vez que un paquete de datos se recibe a través de la red.

## `Abortando solicitudes`

Podemos terminar la solicitud en cualquier momento. La llamada a xhr.abort() hace eso:
```
xhr.abort(); // termina la solicitud
```
Este dispara el evento abort, y el xhr.status se convierte en 0.

## `Solicitudes sincrónicas`

Si en el método `open` el tercer parámetro `async` se asigna como `false`, la solicitud se hace sincrónicamente.

En otras palabras, la ejecución de JavaScript se pausa en el `send()` y se reanuda cuando la respuesta es recibida. Algo como los comandos `alert` o `prompt`.

Puede verse bien, pero las llamadas sincrónicas son rara vez utilizadas porque bloquean todo el JavaScript de la página hasta que la carga está completa. En algunos navegadores se hace imposible hacer scroll. Si una llamada síncrona toma mucho tiempo, el navegador puede sugerir cerrar el sitio web “colgado”.

Algunas capacidades avanzadas de XMLHttpRequest, como solicitar desde otro dominio o especificar un tiempo límite, no están disponibles para solicitudes síncronas. Tampoco, como puedes ver, la indicación de progreso.

La razón de esto es que las solicitudes sincrónicas son utilizadas muy escasamente, casi nunca. No hablaremos más sobre ellas.

## `Cabeceras HTTP`

`XMLHttpRequest` permite tanto enviar cabeceras personalizadas como leer cabeceras de la respuesta.

Existen 3 métodos para las cabeceras HTTP:

`setRequestHeader(name, value)`
Asigna la cabecera de la solicitud con los valores name y value provistos.

`getResponseHeader(name)`
Obtiene la cabecera de la respuesta con el name dado (excepto Set-Cookie y Set-Cookie2).

`getAllResponseHeaders()`
Devuelve todas las cabeceras de la respuesta, excepto por Set-Cookie y Set-Cookie2.

## `POST, Formularios`

Para hacer una solicitud POST, podemos utilizar el objeto FormData nativo.

La sintaxis:
```
let formData = new FormData([form]); // crea un objeto, opcionalmente se completa con un <form>
formData.append(name, value); // añade un campo
```

Lo creamos, opcionalmente lleno desde un formulario, append (agrega) más campos si se necesitan, y entonces:
```
xhr.open('POST', ...) – se utiliza el método POST.
xhr.send(formData) para enviar el formulario al servidor.
```

## `Progreso de carga`

El evento `progress` se dispara solo en la fase de descarga.

Esto es: si hacemos un `POST` de algo, `XMLHttpRequest` primero sube nuestros datos (el cuerpo de la respuesta), entonces descarga la respuesta.

Si estamos subiendo algo grande, entonces seguramente estaremos interesados en rastrear el progreso de nuestra carga. Pero `xhr.onprogress` no ayuda aquí.

Hay otro objeto, sin métodos, exclusivamente para rastrear los eventos de subida: `xhr.upload`.

Este genera eventos similares a `xhr`, pero ``xhr.upload`` se dispara solo en las subidas:

- `loadstart` – carga iniciada.
- `progress` – se dispara periódicamente durante la subida.
- `abort` – carga abortada.
- `error` – error no HTTP.
- `load` – carga finalizada con éxito.
- `timeout` – carga caducada (si la propiedad timeout está asignada).
- `loadend` – carga finalizada con éxito o error.

## `Solicitudes de origen cruzado (Cross-origin)`

`XMLHttpRequest` puede hacer solicitudes de origen cruzado, utilizando la misma política CORS que se solicita.

Tal como `fetch`, no envía cookies ni autorización HTTP a otro origen por omisión. Para activarlas, asigna `xhr.withCredentials` como `true`:

```
let xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.open('POST', 'http://anywhere.com/request');
...
```

# `Carga de archivos reanudable`

Con el método fetch es bastante fácil cargar un archivo.

¿Cómo reanudar la carga de un archivo despues de perder la conexión? No hay una opción incorporada para eso, pero tenemos las piezas para implementarlo.

Las cargas reanudables deberían venir con indicación de progreso, ya que esperamos archivos grandes (Si necesitamos reanudar). Entonces, ya que fetch no permite rastrear el progreso de carga, usaremos XMLHttpRequest.

## `Evento de progreso poco útil`

Para reanudar la carga, necesitamos saber cuánto fue cargado hasta la pérdida de la conexión.

Disponemos de xhr.upload.onprogress para rastrear el progreso de carga.

Desafortunadamente, esto no nos ayudará a reanudar la descarga, Ya que se origina cuando los datos son enviados, ¿pero fue recibida por el servidor? el navegador no lo sabe.

Para reanudar una carga, necesitamos saber exactamente el número de bytes recibidos por el servidor. Y eso solo lo sabe el servidor, por lo tanto haremos una solicitud adicional.

## `Algoritmos`

- Primero, crear un archivo id, para únicamente identificar el archivo que vamos a subir:

`let fileId = file.name + '-' + file.size + '-' + file.lastModified;`

Eso es necesario para reanudar la carga, para decirle al servidor lo que estamos reanudando.

Si el nombre o tamaño de la última fecha de modificación cambia, entonces habrá otro fileId.

- Envía una solicitud al servidor, preguntando cuántos bytes tiene, así:

```
let response = await fetch('status', {
  headers: {
    'X-File-Id': fileId
  }
});

// El servidor tiene tanta cantidad de bytes
let startByte = +await response.text();
```

Esto asume que el servidor rastrea archivos cargados por el encabezado X-File-Id. Debe ser implementado en el lado del servidor.

Si el archivo no existe aún en el servidor, entonces su respuesta debe ser 0.

- Entonces, podemos usar el método Blob slice para enviar el archivo desde startByte:

```
xhr.open("POST", "upload");

// Archivo, de modo que el servidor sepa qué archivo subimos
xhr.setRequestHeader('X-File-Id', fileId);

// El byte desde el que estamos reanudando, así el servidor sabe que estamos reanudando
xhr.setRequestHeader('X-Start-Byte', startByte);

xhr.upload.onprogress = (e) => {
  console.log(`Uploaded ${startByte + e.loaded} of ${startByte + e.total}`);
};

// El archivo puede ser de input.files[0] u otra fuente
xhr.send(file.slice(startByte));
```
Aquí enviamos al servidor ambos archivos id como `X-File-Id`, para que de esa manera sepa que archivos estamos cargando, y el byte inicial como` X-Start-Byte`, para que sepa que no lo estamos cargando inicialmente, si no reanudándolo.

El servidor debe verificar sus registros, y si hubo una carga de ese archivo, y si el tamaño de carga actual es exactamente` X-Start-Byte`, entonces agregarle los datos.

## `Sondeo largo`

El “sondeo largo” es la forma más sencilla de tener una conexión persistente con el servidor. No utiliza ningún protocolo específico como “WebSocket” o “SSE”.

[Mas Información](https://es.javascript.info/long-polling)

# `WebSocket`

El protocolo WebSocket, descrito en la especificación RFC 6455, brinda una forma de intercambiar datos entre el navegador y el servidor por medio de una conexión persistente. Los datos pueden ser pasados en ambas direcciones como paquetes “packets”, sin cortar la conexión y sin pedidos adicionales de HTTP “HTTP-requests”.

WebSocket es especialmente bueno para servicios que requieren intercambio de información continua, por ejemplo juegos en línea, sistemas de negocios en tiempo real, entre otros.

## `Un ejemplo simple`

Para abrir una conexión websocket, necesitamos crearla new WebSocket usando el protocolo especial ws en la url:

`let socket = new WebSocket("ws://javascript.info");`

También hay una versión encriptada wss://. Equivale al HTTPS para los websockets.

<h2 style="color: red">Siempre dé preferencia a wss://</h2>

Una vez que el socket es creado, debemos escuchar los eventos que ocurren en él. Hay en total 4 eventos:

- `open` – conexión establecida,
- `message` – datos recibidos,
- `error` – error en websocket,
- `close` – conexión cerrada.

…Y si queremos enviar algo, socket.send(data) lo hará.

Aquí un ejemplo:

```
let socket = new WebSocket("wss://javascript.info/article/websocket/demo/hello");

socket.onopen = function(e) {
  alert("[open] Conexión establecida");
  alert("Enviando al servidor");
  socket.send("Mi nombre es John");
};

socket.onmessage = function(event) {
  alert(`[message] Datos recibidos del servidor: ${event.data}`);
};

socket.onclose = function(event) {
  if (event.wasClean) {
    alert(`[close] Conexión cerrada limpiamente, código=${event.code} motivo=${event.reason}`);
  } else {
    // ej. El proceso del servidor se detuvo o la red está caída
    // event.code es usualmente 1006 en este caso
    alert('[close] La conexión se cayó');
  }
};

socket.onerror = function(error) {
  alert(`[error]`);
};
```

Para propósitos de demostración, tenemos un pequeño servidor server.js, escrito en Node.js, ejecutándose para el ejemplo de arriba. Este responde con “Hello from server, John”, espera 5 segundos, y cierra la conexión.

Entonces verás los eventos `open` → `message` → `close`.

## `Abriendo un websocket`

Cuando se crea new `WebSocket(url)`, comienza la conexión de inmediato.

Durante la conexión, el navegador (usando cabeceras o “header”) le pregunta al servidor: “¿Soportas Websockets?” y si si el servidor responde “Sí”, la comunicación continúa en el protocolo WebSocket, que no es HTTP en absoluto.

Aquí hay un ejemplo de cabeceras de navegador para una petición hecha por `new WebSocket("wss://javascript.info/chat")`.

```
GET /chat
Host: javascript.info
Origin: https://javascript.info
Connection: Upgrade
Upgrade: websocket
Sec-WebSocket-Key: Iv8io/9s+lYFgZWcXczP8Q==
Sec-WebSocket-Version: 13
```

- `Origin` – La página de origen del cliente, ej. https://javascript.info. Los objetos WebSocket son cross-origin por naturaleza. No existen las cabeceras especiales ni otras limitaciones. De cualquier manera los servidores viejos son incapaces de manejar WebSocket, asi que no hay problemas de compatibilidad. Pero la cabecera Origin es importante, pues habilita al servidor decidir si permite o no la comunicación WebSocket con el sitio web.
- `Connection: Upgrade` – señaliza que el cliente quiere cambiar el protocolo.
Upgrade: websocket – el protocolo requerido es “websocket”.
- `Sec-WebSocket-Key` – una clave de aleatoria generada por el navegador, usada para asegurar que el servidor soporta el protocolo WebSocket. Es aleatoria para evitar que servidores proxy almacenen en cache la comunicación que sigue.
- `Sec-WebSocket-Version` – Versión del protocolo WebSocket, 13 es la actual.

<h2 style="color: red">El intercambio WebSocket no puede ser emulado</h2>
No podemos usar XMLHttpRequest o fetch para hacer este tipo de peticiones HTTP, porque JavaScript no tiene permitido establecer esas cabeceras.

## `Extensiones y subprotocolos`

Puede tener las cabeceras adicionales Sec-WebSocket-Extensions y Sec-WebSocket-Protocol que describen extensiones y subprotocolos.

Por ejemplo:

- `Sec-WebSocket-Extensions`: deflate-frame significa que el navegador soporta compresión de datos. una extensión es algo relacionado a la transferencia de datos, funcionalidad que extiende el protocolo WebSocket. La cabecera Sec-WebSocket-Extensions es enviada automáticamente por el navegador, con la lista de todas las extensiones que soporta.

- `Sec-WebSocket-Protocol`: soap, wamp significa que queremos transferir no cualquier dato, sino datos en protocolos SOAP o WAMP (“The WebSocket Application Messaging Protocol”). Los subprotocolos de WebSocket están registrados en el catálogo IANA. Entonces, esta cabecera describe los formatos de datos que vamos a usar.

## `Transferencia de datos`

La comunicación WebSocket consiste de “frames” (cuadros) de fragmentos de datos, que pueden ser enviados de ambos lados y pueden ser de varias clases:

- “`text frames`” – c`ontiene datos de texto que las partes se mandan entre sí.
- “`binary data frames`” – contiene datos binarios que las partes se mandan entre sí.
- “`ping/pong frames`” son usados para testear la conexión; enviados desde el servidor, el navegador responde automáticamente.
- También existe “connection close frame”, y algunos otros frames de servicio.

En el navegador, trabajamos directamente solamente con frames de texto y binarios.

Cuando recibimos datos, el texto siempre viene como string. Y para datos binarios, podemos elegir entre los formatos Blob y ArrayBuffer.

`Blob` es un objeto binario de alto nivel que se integra directamente con `<a>`, `<img>` y otras etiquetas, así que es una opción predeterminada saludable. Pero para procesamiento binario, para acceder a bytes individuales, podemos cambiarlo a "arraybuffer":

## `Limitaciones de velocidad`

Supongamos que nuestra app está generando un montón de datos para enviar. Pero el usuario tiene una conexión de red lenta, posiblemente internet móvil fuera de la ciudad.

Podemos llamar socket.send(data) una y otra vez. Pero los datos serán acumulados en memoria (en un “buffer”) y enviados solamente tan rápido como la velocidad de la red lo permita.

La propiedad socket.bufferedAmount registra cuántos bytes quedan almacenados (“buffered”) hasta el momento esperando a ser enviados a la red.

Podemos examinarla para ver si el “socket” está disponible para transmitir.
```
// examina el socket cada 100ms y envía más datos
// solamente si todos los datos existentes ya fueron enviados
setInterval(() => {
  if (socket.bufferedAmount == 0) {
    socket.send(moreData());
  }
}, 100);
```

## `Cierre de conexión`

Normalmente, cuando una parte quiere cerrar la conexión (servidor o navegador, ambos tienen el mismo derecho), envía un “frame de cierre de conexión” con un código numérico y un texto con el motivo.

El método para eso es:

`socket.close([code], [reason]);`

- `code` es un código especial de cierre de WebSocket (opcional)
- `reason` es un string que describe el motivo de cierre (opcional)

Los códigos más comunes:

- `1000` – cierre normal. Es el predeterminado (usado si no se proporciona code),
- `1006` – no hay forma de establecerlo manualmente, indica que la conexión se perdió (no hay frame de cierre).

Hay otros códigos como:

- `1001` – una parte se va, por ejemplo el server se está apagando, o el navegador deja la página,
- `1009` – el mensaje es demasiado grande para procesar,
- `1011` – error inesperado en el servidor,
- …y así.

## `Estado de la conexión`

Para obtener el estado (state) de la conexión, tenemos la propiedad `socket.readyState` con valores:

- `0` – “CONNECTING”: la conexión aún no fue establecida,
- `1` – “OPEN”: comunicando,
- `2` – “CLOSING”: la conexión se está cerrando,
- `3` – “CLOSED”: la conexión está cerrada.

# `Eventos enviados por el servidor`

La especificación de los Eventos enviados por el servidor describe una clase incorporada `EventSource`, que mantiene la conexión con el servidor y permite recibir eventos de él.

Similar a `WebSocket`, la conexión es persistente.

Pero existen varias diferencias importantes:

<table>
<thead>
<tr>
<th><code>WebSocket</code></th>
<th><code>EventSource</code></th>
</tr>
</thead>
<tbody>
<tr>
<td>Bidireccional: tanto el cliente como el servidor pueden intercambiar mensajes</td>
<td>Unidireccional: solo el servidor envía datos</td>
</tr>
<tr>
<td>Datos binarios y de texto</td>
<td>Solo texto</td>
</tr>
<tr>
<td>Protocolo WebSocket</td>
<td>HTTP regular</td>
</tr>
</tbody>
</table>

EventSource es una forma menos poderosa de comunicarse con el servidor que `WebSocket`.

¿Por qué debería uno usarlo?

El motivo principal: es más sencillo. En muchas aplicaciones, el poder de WebSocket es demasiado.

Necesitamos recibir un flujo de datos del servidor: tal vez mensajes de chat o precios de mercado, o lo que sea. Para eso es bueno EventSource. También admite la reconexión automática, algo que debemos implementar manualmente con WebSocket. Además, es HTTP común, no un protocolo nuevo.

## `Recibir mensajes`

Para comenzar a recibir mensajes, solo necesitamos crear un new EventSource(url).

El navegador se conectará a la url y mantendrá la conexión abierta, esperando eventos.

El servidor debe responder con el estado 200 y el encabezado Content-Type:text/event-stream, entonces mantener la conexión y escribir mensajes en el formato especial.

## `Solicitudes Cross-origin`

`EventSource` admite solicitudes cross-origin, como fetch o cualquier otro método de red. Podemos utilizar cualquier URL:

`let source = new EventSource("https://another-site.com/events");`

El servidor remoto obtendrá el encabezado `Origin` y debe responder con `Access-Control-Allow-Origin` para continuar.

Para pasar las credenciales, debemos configurar la opción adicional withCredentials, así:
```
let source = new EventSource("https://another-site.com/events", {
  withCredentials: true
});
```

## `Reconexión`

Tras la creación con `new EventSource`, el cliente se conecta al servidor y, si la conexión se interrumpe, se vuelve a conectar.

Eso es muy conveniente, ya que no tenemos que preocuparnos por eso.

Hay un pequeño retraso entre las reconexiones, unos segundos por defecto.

El servidor puede establecer la demora recomendada usando retry: dentro de la respuesta (en milisegundos):
```
retry: 15000
data: Hola, configuré el retraso de reconexión en 15 segundos
```
El retry: puede venir junto con algunos datos, o como un mensaje independiente.

<h2 style="color: red">Por favor tome nota:</h2>
Cuando una conexión finalmente se cierra, no hay forma de “reabrirla”. Si queremos conectarnos de nuevo, simplemente crea un nuevo EventSource.

## `ID del mensaje`

Cuando una conexión se interrumpe debido a problemas de red, ninguna de las partes puede estar segura de qué mensajes se recibieron y cuáles no.

Para reanudar correctamente la conexión, cada mensaje debe tener un campo id, así:
```
data: Mensaje 1
id: 1

data: Mensaje 2
id: 2

data: Mensaje 3
data: de dos líneas
id: 3
```

Cuando se recibe un mensaje con `id`:, el navegador:

- Establece la propiedad `eventSource.lastEventId` a su valor.
- Tras la reconexión, el navegador envía el encabezado `Last-Event-ID` con ese `id`, para que el servidor pueda volver a enviar los siguientes mensajes.

## `Estado de conexión: readyState`

El objeto `EventSource` tiene la propiedad readyState, que tiene uno de tres valores:
```
EventSource.CONNECTING = 0; // conectando o reconectando
EventSource.OPEN = 1;       // conectado
EventSource.CLOSED = 2;     // conexión cerrada
```
Cuando se crea un objeto, o la conexión no funciona, siempre es `EventSource.CONNECTING` (es igual a 0).

Podemos consultar esta propiedad para conocer el estado de `EventSource`.

## `Tipos de eventos`

Por defecto, el objeto EventSource genera tres eventos:

- `message` – un mensaje recibido, disponible como event.data.
- `open` – la conexión está abierta.
- `error` – no se pudo establecer la conexión, por ejemplo, el servidor devolvió el estado HTTP 500.

Por ejemplo:
```
event: join
data: Bob

data: Hola

event: leave
data: Bob
```



[TOP](#working-with-apis)
