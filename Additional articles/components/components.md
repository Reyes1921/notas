[Volver al Menú](../root.md)

# `Web Components`

# `Desde la altura orbital`

En esta sección se describe un conjunto de normas modernas para los “web components”.

En la actualidad, estos estándares están en desarrollo. Algunas características están bien apoyadas e integradas en el standard moderno HTML/DOM, mientras que otras están aún en fase de borrador. Puedes probar algunos ejemplos en cualquier navegador, Google Chrome es probablemente el que más actualizado esté con estas características. Suponemos que eso se debe a que los compañeros de Google están detrás de muchas de las especificaciones relacionadas.

## `Lo que es común entre…`

La idea del componente completo no es nada nuevo. Se usa en muchos frameworks y en otros lugares.

Antes de pasar a los detalles de implementación, echemos un vistazo a este gran logro de la humanidad:

La Estación Espacial Internacional:

- Está formada por muchos componentes.
- Cada componente, a su vez, tiene muchos detalles más pequeños en su interior.
- Los componentes son muy complejos, mucho más complicados que la mayoría de los sitios web.
- Los componentes han sido desarrollados internacionalmente, por equipos de diferentes países, que hablan diferentes idiomas.

…Y esta cosa vuela, ¡mantiene a los humanos vivos en el espacio!

¿Cómo se crean dispositivos tan complejos?

¿Qué principios podríamos tomar prestados para que nuestro desarrollo sea fiable y escalable a ese nivel? ¿O, al menos, cerca de él?

## `Arquitectura de componentes`

La regla más conocida para desarrollar software complejo es: no hacer software complejo.

Si algo se vuelve complejo – divídelo en partes más simples y conéctalas de la manera más obvia.

Un buen arquitecto es el que puede hacer lo complejo simple.

Podemos dividir la interfaz de usuario en componentes visuales: cada uno de ellos tiene su propio lugar en la página, puede “hacer” una tarea bien descrita, y está separado de los demás.

Echemos un vistazo a un sitio web, por ejemplo Twitter.

Una vez más, todo el asunto del “componente” no es nada especial.

Existen muchos frameworks y metodologías de desarrollos para construirlos, cada uno con sus propias características y reglas. Normalmente, se utilizan clases y convenciones CSS para proporcionar la “sensación de componente” – alcance de CSS y encapsulación de DOM.

`“Web components”` proporcionan capacidades de navegación incorporadas para eso, así que ya no tenemos que emularlos.

- `Custom elements` – para definir elementos HTML personalizados.
- `Shadow DOM` – para crear un DOM interno para el componente, oculto a los demás componentes.
- `CSS Scoping` – para declarar estilos que sólo se aplican dentro del Shadow DOM del componente.
- `Event retargeting` y otras cosas menores para hacer que los componentes se ajusten mejor al desarrollo.

# `Custom Elements`

One of the key features of the Web Components standard is the ability to create custom elements that encapsulate your functionality on an HTML page, rather than having to make do with a long, nested batch of elements that together provide a custom page feature.

Podemos crear elementos HTML personalizados con nuestras propias clases; con sus propios métodos, propiedades, eventos y demás.

Una vez que definimos el elemento personalizado, podemos usarlo a la par de elementos HTML nativos.

Esto es grandioso, porque el el diccionario HTML es rico, pero no infinito. No hay `<aletas-faciles>`, `<gira-carrusel>`, `<bella-descarga>`… Solo piensa en cualquier otra etiqueta que puedas necesitar.

Podemos definirlos con una clase especial, y luego usarlos como si siempre hubieran sido parte del HTML.

Hay dos clases de elementos personalizados:

- `Elementos personalizados autónomos` – son elementos “todo-nuevo”, extensiones de la clase abstracta `HTMLElement`.

- `Elementos nativos personalizados` – son extensiones de elementos nativos, por ejemplo un botón personalizado basado en `HTMLButtonElement`.

Primero cubriremos los elementos autónomos, luego pasaremos a la personalización de elementos nativos.

Para crear un elemento personalizado, necesitamos decirle al navegador varios detalles acerca de él: cómo mostrarlo, qué hacer cuando el elemento es agregado o quitado de la página, etc.

Eso se logra creando una clase con métodos especiales. Es fácil, son unos pocos métodos y todos ellos son opcionales.

Este es el esquema con la lista completa:
```
class MyElement extends HTMLElement {
  constructor() {
    super();
    // elemento creado
  }

  connectedCallback() {
    // el navegador llama a este método cuando el elemento es agregado al documento
    // (puede ser llamado varias veces si un elemento es agregado y quitado repetidamente)
  }

  disconnectedCallback() {
    // el navegador llama a este método cuando el elemento es quitado del documento
    // (puede ser llamado varias veces si un elemento es agregado y quitado repetidamente)
  }

  static get observedAttributes() {
    return [/* array de nombres de atributos a los que queremos monitorear por cambios */];
  }

  attributeChangedCallback(name, oldValue, newValue) {
    // es llamado cuando uno de los atributos listados arriba es modificado
  }

  adoptedCallback() {
    // es llamado cuando el elemento es movido a un nuevo documento
    // (ocurre en document.adoptNode, muy raramente usado)
  }

  // puede haber otros métodos y propiedades de elemento
}
```

Después de ello, necesitamos registrar el elemento:

```
// hacer saber al navegador que <my-element> es servido por nuestra nueva clase
customElements.define("my-element", MyElement);
```

A partir de ello, para cada elemento HTML con la etiqueta `<my-element>` se crea una instancia de MyElement y se llaman los métodos mencionados. También podemos insertarlo con JavaScript: document.createElement('my-element').

`Los nombres de los elementos personalizados deben incluir un guion -`
Los elemento personalizados deben incluir un guion corto - en su nombre. Por ejemplo, my-element y super-button son nombres válidos, pero myelement no lo es.

Esto se hace para asegurar que no haya conflicto de nombres entre los elementos nativos y los personalizados.

## `Ejemplo: “time-formatted”`

Ya existe un elemento `<time>` en HTML para presentar fecha y hora, pero este no hace ningún formateo por sí mismo.

Construyamos el elemento `<time-formatted>` que muestre la hora en un bonito formato y reconozca la configuración de lengua local:
```
<script>
class TimeFormatted extends HTMLElement { // (1)

  connectedCallback() {
    let date = new Date(this.getAttribute('datetime') || Date.now());

    this.innerHTML = new Intl.DateTimeFormat("default", {
      year: this.getAttribute('year') || undefined,
      month: this.getAttribute('month') || undefined,
      day: this.getAttribute('day') || undefined,
      hour: this.getAttribute('hour') || undefined,
      minute: this.getAttribute('minute') || undefined,
      second: this.getAttribute('second') || undefined,
      timeZoneName: this.getAttribute('time-zone-name') || undefined,
    }).format(date);
  }

}

customElements.define("time-formatted", TimeFormatted); // (2)
</script>

<!-- (3) -->
<time-formatted datetime="2019-12-01"
  year="numeric" month="long" day="numeric"
  hour="numeric" minute="numeric" second="numeric"
  time-zone-name="short"
></time-formatted>
```

- La clase tiene un solo método, connectedCallback(), que es llamado por el navegador cuando se agrega el elemento `<time-formatted>` a la página o cuando el analizador HTML lo detecta. Este método usa el formateador de datos nativo Intl.DateTimeFormat, bien soportado por los navegadores, para mostrar una agradable hora formateada.
- Necesitamos registrar nuestro nuevo elemento con customElements.define(tag, class).
- Y podremos usarlo por doquier.

## `Observando atributos`

En la implementación actual de `<time-formatted>`, después de que el elemento fue renderizado, cambios posteriores en sus atributos no tendrán ningún efecto. Eso es extraño para un elemento HTML, porque cuando cambiamos un atributo (como en a.href) esperamos que dicho cambio sea visible de inmediato. Corrijamos esto.


## `Orden de renderizado`

Cuando el “parser” construye el DOM, los elementos son procesados uno tras otro, padres antes que hijos. Por ejemplo si tenemos `<outer>``<inner>``</inner>``</outer>`, el elemento `<outer>` es creado y conectado al DOM primero, y luego `<inner>`.

Esto lleva a consecuencias importantes para los elementos personalizados.

Por ejemplo, si un elemento personalizado trata de acceder a innerHTML en connectedCallback, no obtiene nada:

```
<script>
customElements.define('user-info', class extends HTMLElement {

  connectedCallback() {
    alert(this.innerHTML); // vacío (*)
  }

});
</script>

<user-info>John</user-info>
```

Si lo ejecutas, el alert estará vacío.

Esto es porque no hay hijos en aquel estadio, pues el DOM no está finalizado. Se conectó el elemento personalizado `<user-info>` y está por proceder con sus hijos, pero no lo hizo aún.

Si queremos pasar información al elemento personalizado, podemos usar atributos. Estos están disponibles inmediatamente.

O, si realmente necesitamos acceder a los hijos, podemos demorar el acceso a ellos con un setTimeout de tiempo cero.

## `Elementos nativos personalizados`

Los elementos nuevos que creamos, tales como `<time-formatted>`, no tienen ninguna semántica asociada. Para los motores de búsqueda son desconocidos, y los dispositivos de accesibilidad tampoco pueden manejarlos.

Pero estas cosas son importantes. Por ejemplo, un motor de búsqueda podría estar interesado en saber que realmente mostramos la hora. y si hacemos una clase especial de botón, ¿por qué no reusar la funcionalidad ya existente de `<button>`?

Podemos extender y personalizar elementos HTML nativos, heredando desde sus clases.

Por ejemplo, los botones son instancias de HTMLButtonElement, construyamos sobre ello.

- Extender HTMLButtonElement con nuestra clase:

`class HelloButton extends HTMLButtonElement { /* métodos de elemento personalizado */ }`

- Ponemos el tercer argumento de customElements.define, el cual especifica la etiqueta:

`customElements.define('hello-button', HelloButton, {extends: 'button'});`

Puede haber diferentes etiquetas que comparten la misma clase DOM, por eso se necesita especificar extends.

- Por último, para usar nuestro elemento personalizado, insertamos una etiqueta común `<button>`, pero le agregamos is="hello-button":

`<button is="hello-button">...</button>`

El ejemplo completo:
```
<script>
// El botón que dice "hello" al hacer clic
class HelloButton extends HTMLButtonElement {
  constructor() {
    super();
    this.addEventListener('click', () => alert("Hello!"));
  }
}

customElements.define('hello-button', HelloButton, {extends: 'button'});
</script>

<button is="hello-button">Click me</button>

<button is="hello-button" disabled>Disabled</button>
```

Nuestro nuevo botón extiende el ‘button’ nativo. Así mantenemos los mismos estilos y características estándar, como por ejemplo el atributo disabled.

<h2 style="color: green">Resumen</h2>

Los elementos personalizados pueden ser de dos tipos:

- `“Autónomos”` – son etiquetas nuevas, se crean extendiendo HTMLElement.

Esquema de definición:
```
class MyElement extends HTMLElement {
  constructor() { super(); /* ... */ }
  connectedCallback() { /* ... */ }
  disconnectedCallback() { /* ... */  }
  static get observedAttributes() { return [/* ... */]; }
  attributeChangedCallback(name, oldValue, newValue) { /* ... */ }
  adoptedCallback() { /* ... */ }
 }
customElements.define('my-element', MyElement);
/* <my-element> */
```

- `“Elementos nativos personalizados”` – se crean extendiendo elementos ya existentes.

Requiere un argumento más .define, y is="..." en HTML:
```
class MyButton extends HTMLButtonElement { /*...*/ }
customElements.define('my-button', MyElement, {extends: 'button'});
/* <button is="my-button"> */
```

# `Shadow DOM`

An important aspect of web components is encapsulation — being able to keep the markup structure, style, and behavior hidden and separate from other code on the page so that different parts do not clash, and the code can be kept nice and clean. The Shadow DOM API is a key part of this, providing a way to attach a hidden separated DOM to an element.

Shadow DOM sirve para el encapsulamiento. Le permite a un componente tener su propio árbol DOM oculto, que no puede ser accedido por accidente desde el documento principal, puede tener reglas de estilo locales, y más.

## `Shadow DOM incorporado`

¿Alguna vez pensó cómo los controles complejos del navegador se crean y se les aplica estilo?

Tales como `<input type="range">`:

El navegador usa DOM/CSS internamente para dibujarlos. Esa estructura DOM normalmente está oculta para nosotros, pero podemos verla con herramientas de desarrollo. Por ejemplo, en Chrome, necesitamos habilitar la opción “Show user agent shadow DOM” en las herramientas de desarrollo.

<img src="shadow-dom-range.png">

Lo que ves bajo `#shadow-root` se llama “shadow DOM”.

No podemos obtener los elementos de shadow DOM incorporados con llamadas normales a JavaScript o selectores. Estos no son hijos normales sino una poderosa técnica de encapsulamiento.

En el ejemplo de abajo podemos ver un útil atributo pseudo. No es estándar, existe por razones históricas. Podemos usarlo para aplicar estilo a subelementos con CSS como aquí:

```
<style>
/* hace el control deslizable rojo */
input::-webkit-slider-runnable-track {
  background: red;
}
</style>

<input type="range">
```

De nuevo: pseudo no es un atributo estándar. Cronológicamente, los navegadores primero comenzaron a experimentar con estructuras DOM internas para implementar controles, y luego, con el tiempo, fue estandarizado shadow DOM que nos permite, a nosotros desarrolladores, hacer algo similar.

## `Shadow tree (árbol oculto)`

Un elemento DOM puede tener dos tipos de subárboles DOM:

- `Light tree` – un subárbol normal, hecho de hijos HTML. Todos los subárboles vistos en capítulos previos eran “light”.

- `Shadow tree` – un subárbol shadow DOM, no reflejado en HTML, oculto a la vista.

Si un elemento tiene ambos, el navegador solamente construye el árbol shadow. Pero también podemos establecer un tipo de composición entre árboles shadow y light. Veremos los detalles en el capítulo Shadow DOM slots, composición.

El árbol shadow puede ser usado en elementos personalizados para ocultar los componentes internos y aplicarles estilos locales.

Por ejemplo, este elemento `<show-hello>` oculta su DOM interno en un shadow tree:

```
<script>
customElements.define('show-hello', class extends HTMLElement {
  connectedCallback() {
    const shadow = this.attachShadow({mode: 'open'});
    shadow.innerHTML = `<p>
      Hello, ${this.getAttribute('name')}
    </p>`;
  }
});
</script>

<show-hello name="John"></show-hello>
```

Así es como el DOM resultante se ve en las herramientas de desarrollador de Chrome, todo el contenido está bajo `“#shadow-root”`:

Primero, el llamado a `elem.attachShadow({mode: …})` crea un árbol shadow.

Hay dos limitaciones:

- Podemos crear solamente una raíz shadow por elemento.

- elem debe ser: o bien un elemento personalizado, o uno de: `“article”`, `“aside”`, `“blockquote”`, `“body”`, `“div”`, `“footer”`, `“h1…h6”`, `“header”`, `“main”` `“nav”`, `“p”`, `“section”`, o `“span”`. Otros elementos, como `<img>`, no pueden contener un árbol shadow.

La opción mode establece el nivel de encapsulamiento. Debe tener uno de estos dos valores:

- "open" – Abierto: la raíz shadow está disponible como elem.shadowRoot.

Todo código puede acceder el árbol shadow de elem.

- "closed" – Cerrado: elem.shadowRoot siempre es null.

Solamente podemos acceder al shadow DOM por medio de la referencia devuelta por attachShadow (y probablemente oculta dentro de un class). Árboles shadow nativos del navegador, tales como `<input type="range">`, son “closed”. No hay forma de accederlos.

La raíz shadow root, devuelta por attachShadow, es como un elemento: podemos usar innerHTML o métodos DOM tales como append para llenarlo.

El elemento con una raíz shadow es llamado “shadow tree host” (anfitrión de árbol shadow), y está disponible como la propiedad host de shadow root:
```
// asumimos {mode: "open"}, de otra forma elem.shadowRoot sería null
alert(elem.shadowRoot.host === elem); // true
```

## `Encapsulamiento`

Shadow DOM está fuertemente delimitado del documento principal “main document”:

- Los elementos Shadow DOM no son visibles para querySelector desde el DOM visible (light DOM). En particular, los elementos Shadow DOM pueden tener ids en conflicto con aquellos en el DOM visible. Estos deben ser únicos solamente dentro del árbol shadow.

- El Shadow DOM tiene stylesheets propios. Las reglas de estilo del exterior DOM no se le aplican.

Por ejemplo:
```
<style>
  /* document style no será aplicado al árbol shadow dentro de #elem (1) */
  p { color: red; }
</style>

<div id="elem"></div>

<script>
  elem.attachShadow({mode: 'open'});
    // el árbol shadow tiene su propio style (2)
  elem.shadowRoot.innerHTML = `
    <style> p { font-weight: bold; } </style>
    <p>Hello, John!</p>
  `;

  // <p> solo es visible en consultas "query" dentro del árbol shadow (3)
  alert(document.querySelectorAll('p').length); // 0
  alert(elem.shadowRoot.querySelectorAll('p').length); // 1
</script>
```


- El estilo del documento no afecta al árbol shadow.

- …Pero el estilo interno funciona.

- Para obtener los elementos en el árbol shadow, debemos buscarlos (query) desde dentro del árbol.

<h2 style="color:green">Resumen</h2>

El Shadow DOM es una manera de crear un DOM de componentes locales.

- shadowRoot = elem.attachShadow({mode: open|closed}) – crea shadow DOM para elem. Si mode="open", será accesible con la propiedad elem.shadowRoot.
- Podemos llenar shadowRoot usando innerHTML u otros métodos DOM.

Los elementos de Shadow DOM:


- Tienen su propio espacio de ids,

- Son invisibles a los selectores JavaScript desde el documento principal tales como querySelector,

- Usan style solo desde dentro del árbol shadow, no desde el documento principal.

El Shadow DOM, si existe, es construido por el navegador en lugar del DOM visible llamado “light DOM” (hijo regular). En el capítulo Shadow DOM slots, composición veremos cómo se componen.

# `Elemento template`

The `<template>` HTML element is a mechanism for holding HTML that is not to be rendered immediately when a page is loaded but may be instantiated subsequently during runtime using JavaScript. Think of a template as a content fragment that is being stored for subsequent use in the document.

Visit the following resources to learn more:

El elemento incorporado `<template>` sirve como almacenamiento para plantillas de markup de HTML. El navegador ignora su contenido, solo verifica la validez de la sintaxis, pero podemos acceder a él y usarlo en JavaScript para crear otros elementos.

En teoría, podríamos crear cualquier elemento invisible en algún lugar de HTML par fines de almacenamiento de HTML markup. ¿Qué hay de especial en `<template>`?

En primer lugar, su contenido puede ser cualquier HTML válido, incluso si normalmente requiere una etiqueta adjunta adecuada.

Por ejemplo, podemos poner una fila de tabla `<tr>`:
```
<template>
  <tr>
     <td>Contenidos</td>
  </tr>
</template>
```
Normalmente, si intentamos poner` <tr>` dentro, digamos, de un `<div>`, el navegador detecta la estructura DOM como inválida y la “arregla”, y añade un `<table>` alrededor. Eso no es lo que queremos. Sin embargo, `<template>` mantiene exactamente lo que ponemos allí.

También podemos poner estilos y scripts dentro de `<template>`:
```
<template>
  <style>
    p { font-weight: bold; }
  </style>
  <script>
    alert("Hola");
  </script>
</template>
```
El navegador considera al contenido `<template>` “fuera del documento”: Los estilos no son aplicados, los scripts no son ejecutados, `<video autoplay>` no es ejecutado, etc.

El contenido cobra vida (estilos aplicados, scripts, etc) cuando los insertamos dentro del documento.

## `Insertando template`

El contenido template está disponible en su propiedad content como un DocumentFragment: un tipo especial de nodo DOM.

Podemos tratarlo como a cualquier otro nodo DOM, excepto por una propiedad especial: cuando lo insertamos en algún lugar, sus hijos son insertados en su lugar.

Por ejemplo:

```
<template id="tmpl">
  <script>
    alert("Hola");
  </script>
  <div class="message">¡Hola mundo!</div>
</template>

<script>
  let elem = document.createElement('div');

  // Clona el contenido de la plantilla para reutilizarlo múltiples veces
  elem.append(tmpl.content.cloneNode(true));

  document.body.append(elem);
  // Ahora el script de <template> se ejecuta
</script>
```

Reescribamos un ejemplo de Shadow DOM del capítulo anterior usando `<template>`:

```
<template id="tmpl">
  <style> p { font-weight: bold; } </style>
  <p id="message"></p>
</template>

<div id="elem">Haz clic sobre mi</div>

<script>
  elem.onclick = function() {
    elem.attachShadow({mode: 'open'});

    elem.shadowRoot.append(tmpl.content.cloneNode(true)); // (*)

    elem.shadowRoot.getElementById('message').innerHTML = "¡Saludos desde las sombras!";
  };
</script>
```

En la línea (*), cuando clonamos e insertamos tmpl.content como su DocumentFragment, sus hijos `(<style>, <p>)` se insertan en su lugar.

Ellos forman el shadow DOM:
```
<div id="elem">
  #shadow-root
    <style> p { font-weight: bold; } </style>
    <p id="message"></p>
</div>
```

<h2 style="color: green">Resumen</h2>

Para resumir:

- El contenido `<template>` puede ser cualquier HTML sintácticamente correcto.
- El contenido `<template>` es considerado “fuera del documento”, para que no afecte a nada.
- Podemos acceder a template.content desde JavaScript, y clonarlo para reusarlo en un nuevo componente.

La etiqueta `<template>` es bastante única, ya que:

- El navegador comprueba la sintaxis HTML dentro de él (lo opuesto a usar una plantilla string dentro de un script).
- …Pero aún permite el uso de cualquier etiqueta HTML de alto nivel, incluso aquellas que no tienen sentido sin un envoltorio adecuado (por ej.`<tr>`).
- El contenido se vuelve interactivo cuando es insertado en el documento: los scripts se ejecutan, `<video autoplay>` se reproduce, etc.

El elemento `<template>` no ofrece ningún mecanismo de iteración, enlazamiento de datos o sustitución de variables, pero podemos implementar los que están por encima.

# `Shadow DOM slots, composición`

Muchos tipos de componentes; como pestañas, menús, galerías de imágenes, etc., necesitan renderizar contenido.

Al igual que el `<select>` nativo del navegador espera elementos de `<option>`, nuestros `<custom-tabs>` pueden esperar que se pase el contenido real de la pestaña. Y un `<custom-menu>` puede esperar elementos de menú.

El código que hace uso de `<custom-menu>` puede verse así:
```
<custom-menu>
  <title>Menú de dulces</title>
  <item>Paletas</item>
  <item>Tostada de frutas</item>
  <item>Magdalenas</item>
</custom-menu>
```
…Entonces nuestro componente debería renderizar correctamente, como un agradable menú con un título y elementos dados, manejar eventos de menú, etc.

## `Slots con nombres`

Veamos cómo funcionan los slots en un ejemplo simple.

Aquí, el shadow DOM `<user-card>` proporciona dos slots, que se llenan desde el light DOM:

```
<script>
customElements.define('user-card', class extends HTMLElement {
  connectedCallback() {
    this.attachShadow({mode: 'open'});
    this.shadowRoot.innerHTML = `
      <div>Nombre:
        <slot name="username"></slot>
      </div>
      <div>Cumpleaños:
        <slot name="birthday"></slot>
      </div>
    `;
  }
});
</script>

<user-card>
  <span slot="username">John Smith</span>
  <span slot="birthday">01.01.2001</span>
</user-card>
```

En el shadow DOM, `<slot name="X">` define un “punto de inserción”, un lugar donde se renderizan los elementos con slot="X".

Luego, el navegador realiza la “composición”: toma elementos del light DOM y los renderiza en los slots correspondientes del shadow DOM. Al final, tenemos exactamente lo que queremos: un componente que se puede llenar con datos.

Aquí está la estructura del DOM después del script, sin tener en cuenta la composición:
```
<user-card>
  #shadow-root
    <div>Nombre:
      <slot name="username"></slot>
    </div>
    <div>Cumpleaños:
      <slot name="birthday"></slot>
    </div>
  <span slot="username">John Smith</span>
  <span slot="birthday">01.01.2001</span>
</user-card>
```
Creamos el shadow DOM, así que aquí está, en #shadow-root. Ahora el elemento tiene ambos, light DOM y shadow DOM.

Para fines de renderizado, para cada `<slot name="...">` en el shadow DOM, el navegador busca slot="..." con el mismo nombre en el light DOM. Estos elementos se renderizan dentro de los slots:

<img src="shadow-dom-user-card.svg">


El resultado se llama “flattened DOM” (DOM aplanado):
```
<user-card>
  #shadow-root
    <div>Nombre:
      <slot name="username">
        <!-- el elemento esloteado se inserta en el slot -->
        <span slot="username">John Smith</span>
      </slot>
    </div>
    <div>Cumpleaños:
      <slot name="birthday">
        <span slot="birthday">01.01.2001</span>
      </slot>
    </div>
</user-card>
```
…Pero el flattened DOM existe solo para fines de procesamiento y manejo de eventos. Es una especie de “virtual DOM”. Así se muestran las cosas. Pero los nodos del documento en realidad no se mueven!

Eso se puede comprobar fácilmente si ejecutamos `querySelectorAll`: los nodos todavía están en sus lugares.

- // light DOM `<span>` los nodos siguen en el mismo lugar, en `<user-card>`
- alert( document.querySelectorAll('user-card span').length ); // 2

Entonces, el flattened DOM se deriva del shadow DOM insertando slots. El navegador lo renderiza y lo usa para la herencia de estilo, la propagación de eventos (más sobre esto más adelante). Pero JavaScript todavía ve el documento “tal cual”, antes de acoplarlo.

## `Slot con contenido alternativo`

Si ponemos algo dentro de un `<slot>`, se convierte en el contenido alternativo, “predeterminado”. El navegador lo muestra si no tiene un equivalente en el Light DOM desde donde llenarlo.

Por ejemplo, en esta parte del shadow DOM, se representa Anónimo si no hay slot="username" en el light DOM.
```
<div>Name:
  <slot name="username">anónimo</slot>
</div>
```

## `Slot predeterminado: el primero sin nombre`

El primer `<slot>` en el shadow DOM que no tiene un nombre es un slot “predeterminado”. Obtiene todos los nodos del light DOM que no están ubicados en otro lugar.

Por ejemplo, agreguemos el slot predeterminado a nuestro `<user-card>` que muestra toda la información sin slotear sobre el usuario:

## `Slot API`

Finalmente, mencionemos los métodos JavaScript relacionados con los slots.

Como hemos visto antes, JavaScript busca en el DOM “real”, sin aplanar. Pero, si el shadow tree tiene {mode: 'open'}, podemos averiguar qué elementos hay asignados a un slot y, viceversa, averiguar el slot por el elemento dentro de el:


- node.assignedSlot – retorna el elemento `<slot>` al que está asignado el nodo.

- slot.assignedNodes({flatten: true/false}) – Nodos DOM, asignados al slot. La opción flatten es false por defecto. Si se establece explícitamente a true, entonces mira más profundamente en el flattened DOM, retornando slots anidadas en caso de componentes anidados y el contenido de respaldo si ningún node está asignado.

- slot.assignedElements({flatten: true/false}) – Elementos DOM, asignados al slot (igual que arriba, pero solo nodos de elementos).

Estos métodos son útiles cuando no solo necesitamos mostrar el contenido esloteado, sino también rastrearlo en JavaScript.

<h2 style="color: green">Resumen</h2>

Por lo general, si un elemento tiene shadow DOM, no se muestra su light DOM. Los slots permiten mostrar elementos del light DOM en lugares específicos del shadow DOM.

Hay dos tipos de slots:

- Named slots: `<slot name="X">...</slot>` – consigue los light children con slot="X".

- Default slot: el primer `<slot>` sin un nombre (los slots subsiguientes sin nombre se ignoran) – obtiene light children sin slotear.

- Si hay muchos elementos para el mismo slot, se añaden uno tras otro.

- El contenido del elemento `<slot>` se utiliza como respaldo. Se muestra si no hay light children para el slot.

El proceso de renderizar elementos sloteados dentro de sus slots se llama “composición”. El resultado se denomina “flattened DOM”.

La composición no mueve realmente los nodos, desde el punto de vista de JavaScript, el DOM sigue siendo el mismo.

JavaScript puede acceder a los slots mediante estos métodos:


- slot.assignedNodes/Elements() – retorna nodos/elementos dentro del slot.

- node.assignedSlot – la propiedad inversa, retorna el slot por un nodo.

Si queremos saber, podemos rastrear el contenido de los slots usando:


- slotchange event – se activa la primera vez que se llena un slot, y en cualquier operación de agregar/quitar/reemplazar del elemento esloteado, pero no sus hijos. El slot es event.target.

- MutationObserver para profundizar en el contenido del slot, observar los cambios en su interior.

Ahora que, como sabemos cómo mostrar elementos del light DOM en el shadow DOM, veamos cómo diseñarlos correctamente. La regla básica es que los elementos shadow se diseñan en el interior y los elementos light se diseñan afuera, pero hay notables excepciones.

# `Estilo Shadow DOM`

Shadow DOM puede incluir las etiquetas `<style>` y `<link rel="stylesheet" href="…">`. En este último caso, las hojas de estilo se almacenan en la caché HTTP, por lo que no se vuelven a descargar para varios de los componentes que usan la misma plantilla.

Como regla general, los estilos locales solo funcionan dentro del shadow tree, y los estilos de documentos funcionan fuera de él. Pero hay pocas excepciones.

## `:host`

El selector :host permite seleccionar el shadow host (el elemento que contiene el shadow tree).

Por ejemplo, estamos creando un elemento `<custom-dialog>` que debería estar centrado. Para eso necesitamos diseñar el elemento `<custom-dialog>`.

Eso es exactamente lo que :host hace:
```
<template id="tmpl">
  <style>
    /* el estilo se aplicará desde el interior al elemento de diálogo personalizado */
    :host {
      position: fixed;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      display: inline-block;
      border: 1px solid red;
      padding: 10px;
    }
  </style>
  <slot></slot>
</template>

<script>
customElements.define('custom-dialog', class extends HTMLElement {
  connectedCallback() {
    this.attachShadow({mode: 'open'}).append(tmpl.content.cloneNode(true));
  }
});
</script>

<custom-dialog>
  Hello!
</custom-dialog>
```

## `Cascada`

El shadow host (`<custom-dialog>` en sí) reside en el light DOM, por lo que se ve afectado por las reglas de CSS del documento.

Si hay una propiedad con estilo tanto en el :host localmente, y en el documento, entonces el estilo del documento tiene prioridad.

Por ejemplo, si en el documento tenemos:
```
<style>
custom-dialog {
  padding: 0;
}
</style>
```
…Entonces el `<custom-dialog>` estaría sin padding.

Es muy conveniente, ya que podemos configurar estilos de componentes “predeterminados” en su regla :host, y luego sobreescribirlos fácilmente en el documento.

La excepción es cuando una propiedad local está etiquetada como `!important`. Para tales propiedades, los estilos locales tienen prioridad.

## `:host(selector)`

Igual que :host, pero se aplica solo si el shadow host coincide con el selector.

Por ejemplo, nos gustaría centrar el `<custom-dialog>` solo si tiene el atributo centered:

```
<template id="tmpl">
  <style>
    :host([centered]) {
      position: fixed;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      border-color: blue;
    }

    :host {
      display: inline-block;
      border: 1px solid red;
      padding: 10px;
    }
  </style>
  <slot></slot>
</template>

<script>
customElements.define('custom-dialog', class extends HTMLElement {
  connectedCallback() {
    this.attachShadow({mode: 'open'}).append(tmpl.content.cloneNode(true));
  }
});
</script>


<custom-dialog centered>
  ¡Centrado!
</custom-dialog>

<custom-dialog>
  No centrado.
</custom-dialog>
```

Ahora los estilos de centrado adicionales solo se aplican al primer diálogo: `<custom-dialog centered>`.

Para resumir, podemos usar la familia de selectores :host para aplicar estilos al elemento principal del componente. Estos estilos (a menos que sea !important) pueden ser sobreescritos por el documento.

## `Estilo de contenido eslotado(cuando un elemento ha sido insertado en un slot, se dice que fue eslotado por su término en inglés slotted)`

Ahora consideremos la situación con los slots.

Los elementos eslotados vienen del light DOM, por lo que usan estilos del documento. Los estilos locales no afectan al contenido de los elementos eslotados.

En el siguiente ejemplo, el elemento eslotado `<span>` está en bold, según el estilo del documento, pero no toma el background del estilo local:

```
<style>
  span { font-weight: bold }
</style>

<user-card>
  <div slot="username"><span>John Smith</span></div>
</user-card>

<script>
customElements.define('user-card', class extends HTMLElement {
  connectedCallback() {
    this.attachShadow({mode: 'open'});
    this.shadowRoot.innerHTML = `
      <style>
      span { background: red; }
      </style>
      Name: <slot name="username"></slot>
    `;
  }
});
</script>
```

## `CSS hooks con propiedades personalizadas`

¿Cómo diseñamos los elementos internos de un componente del documento principal?

Selectores como :host aplican reglas al elemento `<custom-dialog>` o `<user-card>`, ¿pero cómo aplicar estilos a elementos del shadow DOM dentro de ellos?

No hay ningún selector que pueda afectar directamente a los estilos del shadow DOM del documento. Pero así como exponemos métodos para interactuar con nuestro componente, podemos exponer variables CSS (propiedades CSS personalizadas) para darle estilo.

Existen propiedades CSS personalizadas en todos los niveles, tanto en light como shadow.

Por ejemplo, en el shadow DOM podemos usar la variable CSS --user-card-field-color para dar estilo a los campos, y en el documento exterior establecer su valor:

```
<style>
  .field {
    color: var(--user-card-field-color, black);
    /* si --user-card-field-color no esta definido, usar color negro */
  }
</style>
<div class="field">Name: <slot name="username"></slot></div>
<div class="field">Birthday: <slot name="birthday"></slot></div>
```

Entonces, podemos declarar esta propiedad en el documento exterior para `<user-card>`:

```
user-card {
  --user-card-field-color: green;
}
```
Las propiedades personalizadas CSS atraviesan el shadow DOM, son visibles en todas partes, por lo que la regla interna .field hará uso de ella.

Aquí está el ejemplo completo:

```
<style>
  user-card {
    --user-card-field-color: green;
  }
</style>

<template id="tmpl">
  <style>
    .field {
      color: var(--user-card-field-color, black);
    }
  </style>
  <div class="field">Name: <slot name="username"></slot></div>
  <div class="field">Birthday: <slot name="birthday"></slot></div>
</template>

<script>
customElements.define('user-card', class extends HTMLElement {
  connectedCallback() {
    this.attachShadow({mode: 'open'});
    this.shadowRoot.append(document.getElementById('tmpl').content.cloneNode(true));
  }
});
</script>

<user-card>
  <span slot="username">John Smith</span>
  <span slot="birthday">01.01.2001</span>
</user-card>
```

<h2 style="color: green">Resumen</h2>

Shadow DOM puede incluir estilos, como `<style>` o `<link rel="stylesheet">`.

Los estilos locales pueden afectar:


- shadow tree,

- shadow host con pseudoclases :host y :host(),

- elementos eslotados (provenientes de light DOM), ::slotted(selector) permite seleccionar elementos eslotados, pero no a sus hijos.

Los estilos de documentos pueden afectar:

- shadow host (ya que vive en el documento exterior)
- elementos eslotados y su contenido (ya que eso también está en el documento exterior)

Cuando las propiedades CSS entran en conflicto, normalmente los estilos del documento tienen prioridad, a menos que la propiedad esté etiquetada como !important. Entonces, los estilos locales tienen prioridad.

Las propiedades CSS personalizadas atraviesan el shadow DOM. Se utilizan como “hooks” para aplicar estilos al componente:


- El componente utiliza una propiedad CSS personalizada para aplicar estilos a elementos clave, como var(--component-name-title, `<default value>`).

- El autor del componente publica estas propiedades para los desarrolladores, son tan importantes como otros métodos de componentes públicos.

- Cuando un desarrollador desea aplicar un estilo a un título, asigna la propiedad CSS --component-name-title para el shadow host o superior.

- ¡Beneficio!

# `Shadow DOM y eventos`

La idea detrás del shadow tree es encapsular los detalles internos de implementación de un componente.

Digamos que ocurre un evento click dentro de un shadow DOM del componente `<user-card>`. Pero los scripts en el documento principal no tienen idea acerca del interior del shadow DOM, especialmente si el componente es de una librería de terceros.

Entonces, para mantener los detalles encapsulados, el navegador redirige el evento.

Los eventos que ocurren en el shadow DOM tienen el elemento host como objetivo cuando son atrapados fuera del componente.

Un ejemplo simple:

```
<user-card></user-card>

<script>
customElements.define('user-card', class extends HTMLElement {
  connectedCallback() {
    this.attachShadow({mode: 'open'});
    this.shadowRoot.innerHTML = `<p>
      <button>Click me</button>
    </p>`;
    this.shadowRoot.firstElementChild.onclick =
      e => alert("Inner target: " + e.target.tagName);
  }
});

document.onclick =
  e => alert("Outer target: " + e.target.tagName);
</script>
```

Si haces clic en el botón, los mensajes son:

- Inner target: BUTTON – el manejador de evento interno obtiene el objetivo correcto, el elemento dentro del shadow DOM.
- Outer target: USER-CARD – el manejador de evento del documento obtiene el shadow host como objetivo.

Tener la “redirección de eventos” es muy bueno, porque el documento externo no necesita tener conocimiento acerca del interior del componente. Desde su punto de vista, el evento ocurrió sobre `<user-card>`.

No hay redirección si el evento ocurre en un elemento eslotado (slot element), que físicamente se aloja en el “light DOM”, el DOM visible.

## `Propagación, event.composedPath()`

Para el propósito de propagación de eventos, es usado un “flattened DOM” (DOM aplanado, fusión de light y shadow).

Así, si tenemos un elemento eslotado y un evento ocurre dentro, entonces se propaga hacia arriba a `<slot>` y más allá.

La ruta completa del destino original “event target”, con todos sus elementos shadow, puede ser obtenida usando event.composedPath(). Como podemos ver del nombre del método, la ruta se toma despúes de la composición.

En el ejemplo de arriba, el “flattened DOM” es:
```
<user-card id="userCard">
  #shadow-root
    <div>
      <b>Name:</b>
      <slot name="username">
        <span slot="username">John Smith</span>
      </slot>
    </div>
</user-card>
```
Entonces, para un clic sobre `<span slot="username">`, una llamada a event.composedPath() devuelve un array: [span, slot, div, shadow-root, user-card, body, html, document, window]. Que es precisamente la cadena de padres desde el elemento target en el flattened DOM, después de la composición.

`Los detalles del árbol Shadow solo son provistos en árboles con {mode:'open'}`

Si el árbol shadow fue creado con {mode: 'closed'}, la ruta compuesta comienza desde el host: user-card en adelante.

Este principio es similar a otros métodos que trabajan con el shadow DOM. El interior de árboles cerrados está completamente oculto.

## `event.composed`

La mayoría de los eventos se propagan exitosamente a través de los límites de un shadow DOM. Hay unos pocos eventos que no.

Esto está gobernado por la propiedad composed del objeto de evento. Si es true, el evento cruza los límites. Si no, solamente puede ser capturado dentro del shadow DOM.

Vemos en la especificación UI Events que la mayoría de los eventos tienen composed: true:

- blur, focus, focusin, focusout,
- click, dblclick,
- mousedown, mouseup mousemove, mouseout, mouseover,
- wheel,
- beforeinput, input, keydown, keyup.

Todos los eventos de toque y puntero también tienen composed: true.

Algunos eventos tienen composed: false:

- mouseenter, mouseleave (que no se propagan en absoluto),
- load, unload, abort, error,
- select,
- slotchange.

Estos eventos solo pueden ser capturados dentro del mismo DOM, donde reside el evento target.

## `Eventos personalizados`

Cuando enviamos eventos personalizados, necesitamos establecer ambas propiedades bubbles y composed a true para que se propague hacia arriba y afuera del componente.

Por ejemplo, aquí creamos div#inner en el shadow DOM de div#outer y disparamos dos eventos en él. Solo el que tiene composed: true logra salir hacia el documento:
```
<div id="outer"></div>

<script>
outer.attachShadow({mode: 'open'});

let inner = document.createElement('div');
outer.shadowRoot.append(inner);

/*
div(id=outer)
  #shadow-dom
    div(id=inner)
*/

document.addEventListener('test', event => alert(event.detail));

inner.dispatchEvent(new CustomEvent('test', {
  bubbles: true,
  composed: true,
  detail: "composed"
}));

inner.dispatchEvent(new CustomEvent('test', {
  bubbles: true,
  composed: false,
  detail: "not composed"
}));
</script>
```

<h2 style="color: green">Resumen</h2>

Los eventos solo cruzan los límites de shadow DOM si su bandera composed se establece como true.

La mayoría de los eventos nativos tienen composed: true, tal como se describe en las especificaciones relevantes:


- Eventos UI https://www.w3.org/TR/uievents.

- Eventos Touch https://w3c.github.io/touch-events.

- Eventos Pointer https://www.w3.org/TR/pointerevents.

- …y así.

Algunos eventos nativos que tienen `composed: false`:


- mouseenter, mouseleave (que tampoco se propagan),

- load, unload, abort, error,

- select,

- slotchange.

Estos eventos solo pueden ser capturados en elementos dentro del mismo DOM.

Si enviamos un evento personalizado CustomEvent, debemos establecer explícitamente composed: true.

Tenga en cuenta que en caso de componentes anidados, un shadow DOM puede estar anidado dentro de otro. En ese caso los eventos se propagan a través de los límites de todos los shadow DOM. Entonces, si se pretende que un evento sea solo para el componente inmediato que lo encierra, podemos enviarlo también en el shadow host y establecer `composed: false`. Entonces saldrá al shadow DOM del componente, pero no se propagará hacia un DOM de mayor nivel.

[TOP](#web-components)