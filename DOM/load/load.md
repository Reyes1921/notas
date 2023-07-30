[Volver al Menú](../root.md)


# `El documento y carga de recursos`

El ciclo de vida de una página HTML tiene tres eventos importantes:

- `DOMContentLoaded` – el navegador HTML está completamente cargado y el árbol DOM está construido, pero es posible que los recursos externos como `<img>` y hojas de estilo aún no se hayan cargado.
- `load` – no solo se cargó el HTML, sino también todos los recursos externos: imágenes, estilos, etc.
- `beforeunload/unload` – el usuario sale de la pagina.

Cada evento puede ser útil:

- `Evento DOMContentLoaded` – DOM está listo, por lo que el controlador puede buscar nodos DOM, inicializar la interfaz.
- `Evento load` – se cargan recursos externos, por lo que se aplican estilos, se conocen tamaños de imagen, etc.
- `Evento beforeunload` – el usuario se va: podemos comprobar si el usuario guardó los cambios y preguntarle si realmente quiere irse.
- `Evento unload` – el usuario casi se fue, pero aún podemos iniciar algunas operaciones, como enviar estadísticas.


# `DOMContentLoaded`

El evento DOMContentLoaded ocurre en el objeto document.

Debemos usar addEventListener para capturarlo:

```
document.addEventListener("DOMContentLoaded", ready);
// no "document.onDOMContentLoaded = ..."
```

## `DOMContentLoaded y scripts`

Cuando el navegador procesa un documento HTML y se encuentra con una etiqueta `<script>`, debe ejecutarla antes de continuar construyendo el DOM. Esa es una precaución, ya que los scripts pueden querer modificar el DOM, e incluso hacer `document.write` en él, por lo que `DOMContentLoaded` tiene que esperar.

Entonces DOMContentLoaded siempre ocurre después de tales scripts

<h2 style="color: red">Scripts que no bloquean DOMContentLoaded</h2>

Hay dos excepciones a esta regla:

- Scripts con el atributo `async`, que cubriremos un poco más tarde, no bloquea el `DOMContentLoaded`.
- Los scripts que se generan dinámicamente con `document.createElement('script')` y luego se agregan a la página web, tampoco bloquean este evento.

## `DOMContentLoaded y estilos`

Las hojas de estilo externas no afectan a DOM, por lo que `DOMContentLoaded` no las espera.

Pero hay una trampa. Si tenemos un script después del estilo, entonces ese script debe esperar hasta que se cargue la hoja de estilo.

La razón de esto es que el script puede querer obtener coordenadas y otras propiedades de elementos dependientes del estilo, como en el ejemplo anterior. Naturalmente, tiene que esperar a que se carguen los estilos.

Como DOMContentLoaded espera los scripts, ahora también espera a los estilos que están antes que ellos.

## `Autocompletar del navegador integrado`

Firefox, Chrome y Opera autocompletan formularios en DOMContentLoaded.

Por ejemplo, si la página tiene un formulario con nombre de usuario y contraseña, y el navegador recuerda los valores, entonces en DOMContentLoaded puede intentar completarlos automáticamente (si el usuario lo aprueba).

Entonces, si DOMContentLoaded es pospuesto por scripts de largo tiempo de carga, el autocompletado también espera. Probablemente haya visto eso en algunos sitios (si usa la función de autocompletar del navegador): los campos de inicio de sesión/contraseña no se autocompletan inmediatamente, sino con retraso hasta que la página se carga por completo. En realidad es el retraso hasta el evento DOMContentLoaded.

## `window.onload`

El evento `load` en el objeto `window` se activa cuando se carga toda la página, incluidos estilos, imágenes y otros recursos. Este evento está disponible a través de la propiedad `onload`.

## `window.onunload`

Cuando un visitante abandona la página, el evento `unload` se activa en window. Podemos hacer algo allí que no implique un retraso, como cerrar ventanas emergentes relacionadas.

La excepción notable es el envío de análisis.

Supongamos que recopilamos datos sobre cómo se usa la página: clicks del mouse, desplazamientos, áreas de página visitadas, etc.

Naturalmente, el evento unload sucede cuando el usuario nos deja y nos gustaría guardar los datos en nuestro servidor.

## `window.onbeforeunload`

Si un visitante inició la navegación fuera de la página o intenta cerrar la ventana, el controlador `beforeunload` solicita una confirmación adicional.

Si un visitante inició la navegación fuera de la página o intenta cerrar la ventana, el controlador `beforeunload` solicita una confirmación adicional.

Si cancelamos el evento, el navegador puede preguntar al visitante si está seguro.

`El event.preventDefault() no funciona desde un manejador beforeunload`

## `readyState`

¿Qué sucede si configuramos el controlador `DOMContentLoaded` después de cargar el documento?

Naturalmente, nunca se ejecutará.

Hay casos en los que no estamos seguros de si el documento está listo o no. Nos gustaría que nuestra función se ejecute cuando se cargue el DOM, ya sea ahora o más tarde.

La propiedad `document.readyState` nos informa sobre el estado de carga actual.

Hay 3 valores posibles:

- "`loading`" – el documento se está cargando.
- "`interactive`" – el documento fue leído por completo.
- "`complete`" – el documento se leyó por completo y todos los recursos (como imágenes) también se cargaron.

El evento `readystatechange` es una mecánica alternativa para rastrear el estado de carga del documento, apareció hace mucho tiempo. Hoy en día, rara vez se usa.

La salida típica:

- [1] `readyState inicial: loading`
- [2] `readyState: interactive`
- [2] `DOMContentLoaded`
- [3] `iframe onload`
- [4] `img onload`
- [4] `readyState: complete`
- [4] `window onload`

# `Scripts: async, defer`

En los sitios web modernos los scripts suelen ser más “pesados” que el HTML, el tamaño de la descarga es grande y el tiempo de procesamiento es mayor.

Cuando el navegador carga el HTML y se encuentra con una etiqueta `<script>...</script>`, no puede continuar construyendo el DOM. Debe ejecutar el script en el momento. Lo mismo sucede con los scripts externos `<script src="..."></script>`, el navegador tiene que esperar hasta que el script sea descargado, ejecutarlo y solo después procesa el resto de la página.

Esto nos lleva a dos importantes problemas:

- Los scripts no pueden ver los elementos del DOM que se encuentran debajo de él por lo que no pueden agregar controladores de eventos, etc.
- Si hay un script muy pesado en la parte superior de la página, este “bloquea la página”. Los usuarios no pueden ver el contenido de la página hasta que sea descargado y ejecutado.

Hay algunas soluciones para eso. Por ejemplo podemos poner el script en la parte inferior de la página por lo que podrá ver los elementos sobre él y no bloqueará la visualización del contenido de la página.

Pero esta solución está lejos de ser perfecta. Por ejemplo el navegador solo se dará cuenta del script (y podrá empezar a descargarlo) después de descargar todo el documento HTML. Para documentos HTML extensos eso puede ser un retraso notable.

## `defer`

El atributo `defer` indica al navegador que no espere por el script. En lugar de ello, debe seguir procesando el HTML, construir el DOM. El script carga “en segundo plano” y se ejecuta cuando el DOM esta completo.

En otras palabras:

- Los scripts con defer nunca bloquean la página.
- Los scripts con defer siempre se ejecutan cuando el DOM esta listo (pero antes del evento `DOMContentLoaded`).

<h2 style="color: red">El atributo defer es solo para scripts externos</h2>

El atributo defer es ignorado si el `<script>` no tiene el atributo src.

## `async`

El atributo `async` es de alguna manera como `defer`. También hace el script no bloqueante. Pero tiene importantes diferencias de comportamiento.

El atributo `async` significa que el script es completamente independiente:

- El navegador no se bloquea con scripts `async` (como defer).
- Otros scripts no esperan por scripts `async`, y scripts `async` no espera por ellos.
- `DOMContentLoaded` y los scripts asincrónicos no se esperan entre sí:
    - `DOMContentLoaded` puede suceder antes que un script asincrónico (si un script asincrónico termina de cargar una vez la página está completa)
    - …o después de un script asincrónico (si tal script asincrónico es pequeño o está en cache)

En otras palabras, los scripts async cargan en segundo plano y se ejecutan cuando están listos. El DOM y otros scripts no esperan por ellos, y ellos no esperan por nada. Un script totalmente independiente que se ejecuta en cuanto se ha cargado. Tan simple como es posible, ¿cierto?

Los scripts asincrónicos son excelentes cuando incluimos scripts de terceros (contadores, anuncios, etc) en la página debido a que ellos no dependen de nuestros scripts y nuestros scripts no deberían esperar por ellos.

<h2 style="color: red">El atributo async es solo para scripts externos</h2>

Tal como defer, el atributo async se ignora si la etiqueta `<script>` no tiene src.

## `Scripts dinámicos`

Hay otra manera importante de agregar un script a la página.

Podemos crear un script y agregarlo dinámicamente al documento usando JavaScript:

```
let script = document.createElement('script');
script.src = "/article/script-async-defer/long.js";
document.body.append(script); // (*)
```

El script comienza a cargar tan pronto como es agregado al documento `(*)`.

`Los scripts dinámicos se comportan como async por defecto`


En la práctica, `defer` es usado para scripts que necesitan todo el DOM y/o si su orden de ejecución relativa es importante.

Y `async` es usado para scripts independientes, como contadores y anuncios donde el orden de ejecución no importa.


<h2 style="color: red">La página sin scripts debe ser utilizable</h2>

Ten en cuenta: si usas defer o async, el usuario verá la página antes de que el script sea cargado.

En tal caso algunos componentes gráficos probablemente no estén listos.

No olvides poner alguna señal de “cargando” y deshabilitar los botones que aún no estén funcionando. Esto permite al usuario ver claramente qué puede hacer en la página y qué está listo y qué no.

# `Carga de recursos: onload y onerror`

El navegador nos permite hacer seguimiento de la carga de recursos externos: scripts, iframes, imágenes y más.

Hay dos eventos para eso:

- `onload` – cuando cargó exitosamente,
- `onerror` – cuando un error ha ocurrido.

<h2 style="color: red">Por favor tome nota:</h2>

Para nuestros scripts podemos usar JavaScript modules aquí, pero no está adoptado ampliamente por bibliotecas de terceros.

## `script.onload`

El evento `load` se dispara después de que script sea cargado y ejecutado.

```
let script = document.createElement('script');

// podemos cargar cualquier script desde cualquier dominio
script.src = "https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.3.0/lodash.js"
document.head.append(script);

script.onload = function() {
  // el script crea una variable "_"
  alert( _.VERSION ); // muestra la versión de la librería
};
```

Entonces en onload podemos usar variables, ejecutar funciones, etc.

## `script.onerror`

Los errores que ocurren durante la carga de un script pueden ser rastreados en el evento `error`.

```
let script = document.createElement('script');
script.src = "https://example.com/404.js"; // no hay tal script
document.head.append(script);

script.onerror = function() {
  alert("Error al cargar " + this.src); // Error al cargar https://example.com/404.js
};

```

<h2 style="color: red">Importante:</h2>

Los eventos onload/onerror rastrean solamente la carga de ellos mismos.

Los errores que pueden ocurrir durante el procesamiento y ejecución están fuera del alcance para esos eventos. Eso es: si un script es cargado de manera exitosa, incluso si tiene errores de programación adentro, el evento onload se dispara. Para rastrear los errores del script un puede usar el manejador global window.onerror;

## `Otros recursos`

Los eventos `load` y `error` también funcionan para otros recursos, básicamente para cualquiera que tenga una `src` externa.

Por ejemplo:
```
let img = document.createElement("img");
img.src = "https://js.cx/clipart/train.gif"; // (*)

img.onload = function () {
  alert(`Image loaded, size ${img.width}x${img.height}`);
};

img.onerror = function () {
  alert("Error occurred while loading image");
};
```

Sin embargo, hay algunas notas:

- La mayoría de recursos empiezan a cargarse cuando son agregados al documento. Pero `<img>` es una excepción, comienza la carga cuando obtiene una fuente “.src” (*).
- Para `<iframe>`, el evento iframe.onload se dispara cuando el iframe ha terminado de cargar, tanto para una carga exitosa como en caso de un error.

[TOP](#el-documento-y-carga-de-recursos)