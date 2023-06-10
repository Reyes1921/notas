[Volver al Menú](../root.md)

# `Eventos en la UI`

# `Eventos del Mouse`

En este capítulo vamos a entrar en más detalles sobre los eventos del mouse y sus propiedades.

Ten en cuenta que tales eventos pueden provenir no sólo del “dispositivo mouse”, sino también de otros dispositivos, como teléfonos y tabletas, donde se emulan por compatibilidad.

## `El botón del mouse`

Los eventos relacionados con clics siempre tienen la propiedad `button`, esta nos permite conocer el botón exacto del mouse.

Normalmente no la usamos para eventos `click` y `contextmenu` events, porque sabemos que ocurren solo con click izquierdo y derecho respectivamente.

Por otro lado, los controladores `mousedown` y `mouseup` pueden necesitar event.button ya que estos eventos se activan con cualquier botón, y `button` nos permitirá distinguir entre “mousedown derecho” y “mousedown izquierdo”.

Los valores posibles para `event.button` son:

<table>
<thead>
<tr>
<th>Estado del botón</th>
<th><code>event.button</code></th>
</tr>
</thead>
<tbody>
<tr>
<td>Botón izquierdo (primario)</td>
<td>0</td>
</tr>
<tr>
<td>Botón central (auxiliar)</td>
<td>1</td>
</tr>
<tr>
<td>Botón derecho (secundario)</td>
<td>2</td>
</tr>
<tr>
<td>Botón X1 (atrás)</td>
<td>3</td>
</tr>
<tr>
<td>Botón X2 (adelante)</td>
<td>4</td>
</tr>
</tbody>
</table>


<h2 style="color: red">El obsoleto event.which</h2>

El código puede utilizar la propiedad event.which que es una forma antigua no estándar de obtener un botón con los valores posibles:

- `event.which` == 1 – botón izquierdo,
- `event.which` == 2 – botón central,
- `event.which` == 3 – botón derecho.

Ahora `event.which` está en desuso, no deberíamos usarlo.


## `Modificadores: shift, alt, ctrl y meta`

Todos los eventos del mouse incluyen la información sobre las teclas modificadoras presionadas.

- `shiftKey`: Shift
- `altKey`: Alt (p Opt para Mac)
- `ctrlKey`: Ctrl
- `metaKey`: Cmd para Mac

Su valor es `true` si la tecla fue presionada durante el evento.

Por ejemplo, el botón abajo solo funciona con `Alt+Shift+click`:

```
<button id="button">Alt+Shift+¡Click sobre mí!</button>

<script>
  button.onclick = function(event) {
    if (event.altKey && event.shiftKey) {
      alert('¡Genial!');
    }
  };
</script>
```

<h2 style="color: red">Atención: en Mac suele ser Cmd en lugar de Ctrl</h2>

En Windows y Linux existen las teclas modificadoras `Alt`, `Shift` y `Ctrl`. En Mac hay una más: `Cmd`, correspondiente a la propiedad `metaKey`.

En la mayoría de las aplicaciones, cuando Windows/Linux usan ``Ctrl``, en Mac se usa `Cmd`.

Es decir: cuando un usuario de Windows usa `Ctrl`+Enter o `Ctrl`+A, un usuario Mac presionaría `Cmd`+Enter o `Cmd`+A, y así sucesivamente.

Entonces si queremos darle soporte a combinaciones como `Ctrl`+click, entonces para Mac tendría más sentido usar `Cmd`+click. Esto es más cómodo para los usuarios de Mac.

Incluso si quisiéramos obligar a los usuarios de Mac a hacer `Ctrl`+click – esto supone algo de dificultad. El problema es que: un click izquierdo con `Ctrl` es interpretado como click derecho en MacOS, y esto genera un evento `contextmenu`, no un `click` como en Windows/Linux.

Así que si queremos que los usuarios de todos los sistemas operativos se sientan cómodos, entonces junto con `ctrlKey` debemos verificar `metaKey`.

Para código JS significa que debemos hacer la comprobación `if (event.ctrlKey || event.metaKey)`.


## `Coordenadas: clientX/Y, pageX/Y`

Todos los eventos del ratón proporcionan coordenadas en dos sabores:

- Relativas a la ventana: `clientX` y `clientY`.
- Relativos al documento: `pageX` y `pageY`.

En resumen, las coordenadas relativas al documento `pageX`/Yse cuentan desde la esquina superior izquierda del documento y no cambian cuando se desplaza la página, mientras que `clientX`/Y se cuentan desde la esquina superior actual. Cambian cuando se desplaza la página.

Por ejemplo, si tenemos una ventana del tamaño 500x500, y el mouse está en la esquina superior izquierda, entonces `clientX` y `clientY` son 0, sin importar cómo se desplace la página.

Y si el mouse está en el centro, entonces `clientX` y `clientY` son 250, No importa en qué parte del documento se encuentren. Esto es similar a position:fixed en ese aspecto.

## `Previniendo la selección en mousedown`

El doble clic del mouse tiene un efecto secundario que puede ser molesto en algunas interfaces: selecciona texto.

Hay varias maneras de evitar la selección, que se pueden leer en el capítulo Selection y Range.

<h2 style="color: red">Previniendo copias</h2>

Si queremos inhabilitar la selección para proteger nuestro contenido de la página del copy-paste, entonces podemos utilizar otro evento: `oncopy`.

```
<div oncopy="alert('¡Copiado prohibido!');return false">
  Querido usuario,
  El copiado está prohibida para ti.
  Si sabes JS o HTML entonces puedes obtener todo de la fuente de la página.
</div>
```

Si intenta copiar un fragmento de texto en el `<div>` no va a funcionar porque la acción default de `oncopy` fue evitada.

Seguramente el usuario tiene acceso a la fuente HTML de la página, y puede tomar el contenido desde allí, pero no todos saben cómo hacerlo.

# `Moviendo el mouse: mouseover/out, mouseenter/leave`

Entremos en detalle sobre los eventos que suceden cuando el mouse se mueve entre elementos.

## `Eventos mouseover/mouseout, relatedTarget`

El evento `mouseover` se produce cuando el cursor del mouse aparece sobre un elemento y `mouseout` cuando se va.

Estos eventos son especiales porque tienen la propiedad `relatedTarget`. Esta propiedad complementa a `target`. Cuando el puntero del mouse deja un elemento por otro, uno de ellos se convierte en `target` y el otro en `relatedTarget`.

Para `mouseover`:

- `event.target` – Es el elemento al que se acerca el mouse.
- `event.relatedTarget` – Es el elemento de donde proviene el mouse (relatedTarget → target).

Para `mouseout` sucede al contrario:

- `event.target` – Es el elemento que el mouse dejó.
- `event.relatedTarget` – es el nuevo elemento bajo el cursor por cuál el cursor dejó al anterior (target → relatedTarget).

## `Saltando elementos`

El evento `mousemove` se activa cuando el mouse se mueve, pero eso no significa que cada píxel nos lleve a un evento.

El navegador verifica la posición del mouse de vez en cuando y si nota cambios entonces activan los eventos.

Eso significa que si el visitante mueve el mouse muy rápido, entonces algunos elementos del DOM podrían estar siendo ignorados.

Eso es bueno para el rendimiento porque puede haber muchos elementos intermedios. Realmente no queremos procesar todo lo que sucede dentro y fuera de cada uno.

## `Mouseout, cuando se deja un elemento por uno anidado.`

Una característica importante de `mouseout` – se activa cuando el cursor se mueve de un elemento hacia su descendiente (elemento anidado o interno). Por ejemplo de #`parent` a #`child`

Si estamos sobre #parent y luego movemos el cursor hacia dentro de #`child`, ¡vamos a obtener mouseout en #`parent`!

El cursor aún está sobre el elemento padre, simplemente se adentró más en el elemento hijo.

## `Eventos mouseenter y mouseleave`

Los eventos `mouseenter/mouseleave` son como `mouseover/mouseout`. Se activan cuando el cursor del mouse entra/sale del elemento.

Pero hay dos diferencias importantes:

- Las transiciones hacia/desde los descendientes no se cuentan.
- Los eventos `mouseenter/mouseleave` no brotan.

Son eventos extremadamente simples. Cuando el cursor entra en un elemento `mouseenter` se activa. La ubicación exacta del cursor dentro del elemento o sus descendientes no importa. Cuando el cursor deja el elemento `mouseleave` se activa.

## `Delegación de eventos`

Los eventos `mouseenter/leave` son muy simples de usar. Pero no brotan por sí solos. Por lo tanto no podemos usar la delegación de eventos con ellos.

Imagina que queremos manejar entrada/salida para celdas de tabla y hay cientos de celdas.

La solución natural sería: ajustar el controlador en `<table>` y manejar los eventos desde ahí. Pero mouseenter/leave no aparece. Entonces si cada evento sucede en `<td>`, solamente un controlador `<td>` es capaz de detectarlo.

Pues usemos `mouseover/mouseout`.

# `Arrastrar y Soltar con eventos del ratón`

Arrastrar y Soltar es una excelente solución de interfaz. Tomar algo, arrastrar y soltarlo es una forma clara y simple de hacer muchas cosas, desde copiar y mover documentos (como en los manejadores de archivos) hasta ordenar (arrastrando ítems al carrito).

## `Algoritmo de “Arrastrar y Soltar”`

- En `mousedown` – preparar el elemento para moverlo, si es necesario (quizá creando un clon de este, añadiéndole una clase, o lo que sea).
- En `mousemove` – moverlo cambiando left/top con position:absolute.
- En `mouseup` – realizar todas las acciones relacionadas con finalizar el Arrastrar y Soltar.

## `Posicionamiento correcto`

[Mas Información](https://es.javascript.info/mouse-drag-and-drop#posicionamiento-correcto)

## `Objetivos receptores potenciales (droppables)`

En los ejemplos anteriores la pelota debe ser soltada simplemente “en cualquier lugar” para quedarse. En la vida real normalmente tomamos un elemento para soltarlo en otro. Por ejemplo, un “archivo” en una “carpeta” o algo más.

Existe un método llamado `document.elementFromPoint(clientX, clientY)`. Este devuelve el elemento más anidado en las coordenadas relativas a la ventana proporcionada (o `null` si las coordenadas están fuera de la ventana). Si hay muchos elementos superpuestos en las mismas coordenadas, se devuelve el que está en el tope.

[Mas Información](https://es.javascript.info/mouse-drag-and-drop#objetivos-receptores-potenciales-droppables)

# `Eventos de puntero`

Los eventos de puntero son una forma moderna de manejar la entrada de una variedad de dispositivos señaladores, como un mouse, un lápiz, una pantalla táctil, etc.

## `Tipos de eventos de puntero`

<table>
<thead>
<tr>
<th>Evento de puntero</th>
<th>Evento de mouse similar</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>pointerdown</code></td>
<td><code>mousedown</code></td>
</tr>
<tr>
<td><code>pointerup</code></td>
<td><code>mouseup</code></td>
</tr>
<tr>
<td><code>pointermove</code></td>
<td><code>mousemove</code></td>
</tr>
<tr>
<td><code>pointerover</code></td>
<td><code>mouseover</code></td>
</tr>
<tr>
<td><code>pointerout</code></td>
<td><code>mouseout</code></td>
</tr>
<tr>
<td><code>pointerenter</code></td>
<td><code>mouseenter</code></td>
</tr>
<tr>
<td><code>pointerleave</code></td>
<td><code>mouseleave</code></td>
</tr>
<tr>
<td><code>pointercancel</code></td>
<td>-</td>
</tr>
<tr>
<td><code>gotpointercapture</code></td>
<td>-</td>
</tr>
<tr>
<td><code>lostpointercapture</code></td>
<td>-</td>
</tr>
</tbody>
</table>

## `Propiedades de los eventos de puntero`

Los eventos de puntero tienen las mismas propiedades que los eventos del mouse, como clientX/Y, target, etc., más algunos adicionales:

- `pointerId` – el identificador único del puntero que causa el evento.

- `pointerType` – el tipo de dispositivo señalador. Debe ser una cadena, uno de los siguientes: “mouse”, “pen” o “touch”. 

- `isPrimary` – true para el puntero principal (el primer dedo en multitáctil).

Para punteros que miden un área de contacto y presión, p. Ej. un dedo en la pantalla táctil, las propiedades adicionales pueden ser útiles:

- `width` – el ancho del área donde el puntero (p.ej. el dedo) toca el dispositivo. Si el dispositivo no lo soporta (como el mouse), es siempre 1.
- `height` – el alto del área donde el puntero toca el dispositivo. Donde no lo soporte es siempre 1.
- `pressure` – la presión de la punta del puntero, en el rango de 0 a 1. En dispositivos que no soportan presión, debe ser 0.5 (presionada) o 0.
- `tangentialPressure` – la presión tangencial normalizada.
- `tiltX, tiltY, twist` – propiedades específicas para un lápiz digital, describen cómo se lo coloca en relación con la superficie.

## `Multi-touch (Multitáctil)`

Una de las cosas que los eventos del mouse no soportan es la propiedad multitáctil: un usuario puede tocar en varios lugares a la vez en su teléfono o tableta, realizar gestos especiales.

Los eventos de puntero permiten manejar multitáctiles con la ayuda de las propiedades `pointerId` e `isPrimary`.

Esto es lo que sucede cuando un usuario toca una pantalla en un lugar y luego coloca otro dedo en otro lugar:

- En el primer toque:
    - `pointerdown` with `isPrimary=true` y algún `pointerId`.

- Para el segundo dedo y toques posteriores (asumiendo que el primero sigue tocando):
    - `pointerdown` con `isPrimary=false` y un diferente `pointerId` por cada dedo.

## `Evento: pointercancel`

El evento `pointercancel` se dispara cuando, mientras hay una interacción de puntero en curso, sucede algo que hace que esta se anule de modo que no se generan más eventos de puntero.

Las causas son:

- Se deshabilitó el hardware del dispositivo de puntero.
- La orientación del dispositivo cambió (tableta rotada).
- El navegador decidió manejar la interacción por su cuenta: porque lo consideró un gesto de mouse, una acción de zoom, o alguna otra cosa.

## `Captura del puntero`

La captura de puntero es una característica especial de los eventos de puntero.

La idea es muy simple, pero puede verse extraña al principio, porque no existe algo así para ningún otro tipo de evento.

El método principal es:

- `elem.setPointerCapture(pointerId)` – vincula el `pointerId` dado a `elem`. Después del llamado todos los eventos de puntero con el mismo `pointerId` tendrán elem como objetivo (como si ocurrieran sobre elem), no importa dónde hayan ocurrido en realidad.
En otras palabras: `elem.setPointerCapture(pointerId)` redirige hacia elem todos los eventos subsecuentes que tengan el `pointerId` dado.

El vínculo se deshace::

- automáticamente cuando ocurren los eventos pointerup o pointercancel,
- automáticamente cuando `elem` es quitado del documento,
- cuando `elem.releasePointerCapture(pointerId)` es llamado.

`La captura de puntero puede utilizarse para simplificar interacciones del tipo “arrastrar y soltar”.`

## `Eventos de captura de puntero`

Una cosa más por mencionar en bien de la exhaustividad.

Hay dos eventos de puntero asociados con la captura de puntero:

- `gotpointercapture` se dispara cuando un elemento usa setPointerCapture para permitir la captura.
- `lostpointercapture` se dispara cuando se libera la captura: ya sea explícitamente con la llamada a releasePointerCapture, o automáticamente con pointerup/pointercancel.

# `Teclado: keydown y keyup`

Antes de llegar al teclado, por favor ten en cuenta que en los dispositivos modernos hay otras formas de “ingresar algo”. Por ejemplo, el uso de reconocimiento de voz (especialmente en dispositivos móviles) o copiar/pegar con el mouse.

## `Keydown y keyup`

Los eventos `keydown` ocurren cuando se presiona una tecla, y `keyup` cuando se suelta.

La propiedad `key` del objeto de evento permite obtener el carácter, mientras que la propiedad code del evento permite obtener el “código físico de la tecla”.

Por ejemplo, la misma tecla `Z` puede ser presionada con o sin `Shift`. Esto nos da dos caracteres diferentes: `z` minúscula y `Z` mayúscula.

`event.key` es el carácter exacto, y será diferente. Pero event.code es el mismo

Si un usuario trabaja con diferentes lenguajes, el cambio a otro lenguaje podría producir un carácter totalmente diferente a "Z". Este se volverá el valor de `event.key`, mientras que event.code es siempre el mismo: "`KeyZ`".

<table>
<thead>
<tr>
<th>Key</th>
<th><code>event.key</code></th>
<th><code>event.code</code></th>
</tr>
</thead>
<tbody>
<tr>
<td><kbd class="shortcut">F1</kbd></td>
<td><code>F1</code></td>
<td><code>F1</code></td>
</tr>
<tr>
<td><kbd class="shortcut">Backspace</kbd></td>
<td><code>Backspace</code></td>
<td><code>Backspace</code></td>
</tr>
<tr>
<td><kbd class="shortcut">Shift</kbd></td>
<td><code>Shift</code></td>
<td><code>ShiftRight</code> or <code>ShiftLeft</code></td>
</tr>
</tbody>
</table>


Ten en cuenta que `event.code` especifica con exactitud la tecla que es presionada. Por ejemplo, la mayoría de los teclados tienen dos teclas `Shift`: una a la izquierda y otra a la derecha. `event.code` nos dice exactamente cuál fue presionada, en cambio `event.key` es responsable del “significado” de la tecla: lo que “es” (una “Mayúscula”).

Digamos que queremos manejar un atajo de teclado: `Ctrl+Z` (o `Cmd+Z` en Mac). La mayoría de los editores de texto “cuelgan” la acción “Undo” en él. Podemos configurar un “listener” para escuchar el evento keydown y verificar qué tecla es presionada.

Hay un dilema aquí: en ese “listener”, ¿debemos verificar el valor de `event.key` o el de `event.code`?

Por un lado, el valor de `event.key` es un carácter que cambia dependiendo del lenguaje. Si el visitante tiene varios lenguajes en el sistema operativo y los cambia, la misma tecla dará diferentes caracteres. Entonces tiene sentido chequear `event.code` que es siempre el mismo.

## `Autorepetición`

Si una tecla es presionada durante suficiente tiempo, comienza a “autorepetirse”: `keydown` se dispara una y otra vez, y cuando es soltada finalmente se obtiene `keyup`. Por ello es normal tener muchos `keydown` y un solo `keyup`.

Para eventos disparados por autorepetición, el objeto de evento tiene la propiedad `event.repeat` establecida a `true`.

## `Acciones predeterminadas`

Las acciones predeterminadas varían, al haber muchas cosas posibles que pueden ser iniciadas por el teclado.

Por ejemplo:

- Un carácter aparece en la pantalla (el resultado más obvio).
- Un carácter es borrado (tecla Delete).
- Un avance de página (tecla PageDown).
- El navegador abre el diálogo “guardar página” (Ctrl+S)
- …y otras.

Evitar la acción predeterminada en keydown puede cancelar la mayoría de ellos, con la excepción de las teclas especiales basadas en el sistema operativo. Por ejemplo, en Windows la tecla Alt+F4 cierra la ventana actual del navegador. Y no hay forma de detenerla por medio de “evitar la acción predeterminada” de JavaScript.

## `Código heredado`

En el pasado existía un evento keypress, y también las propiedades del objeto evento keyCode, charCode, which.

Al trabajar con ellos había tantas incompatibilidades entre los navegadores que los desarrolladores de la especificación no tuvieron otra alternativa que declararlos obsoletos y crear nuevos y modernos eventos (los descritos arriba en este capítulo). El viejo código todavía funciona porque los navegadores aún lo soportan, pero no hay necesidad de usarlos más, en absoluto.

## `Teclados en dispositivos móviles`

Cuando se usan teclados virtuales o los de dispositivos móviles, formalmente conocidos como IME (Input-Method Editor), el estándar W3C establece que la propiedad de KeyboardEvent e.keyCode debe ser 229 y e.key debe ser "Unidentified".

Mientras algunos de estos teclados pueden aún usar los valores correctos para e.key, e.code, e.keyCode…, cuando se presionan ciertas teclas tales como flechas o retroceso no hay garantía, entonces nuestra lógica de teclado podría no siempre funcionar bien en dispositivos móviles.

# `Desplazamiento`

El evento `scroll` permite reaccionar al desplazamiento de una página o elemento. Hay bastantes cosas buenas que podemos hacer aquí.

Aquí hay una pequeña función para mostrar el desplazamiento actual:
```
window.addEventListener('scroll', function() {
  document.getElementById('showScroll').innerHTML = window.pageYOffset + 'px';
});
```

El evento `scroll` funciona tanto en `window` como en los elementos desplazables.

## `Evitar el desplazamiento`

¿Qué hacemos para que algo no se pueda desplazar?

No podemos evitar el desplazamiento utilizando `event.preventDefault()` oyendo al evento onscroll, porque este se activa después de que el desplazamiento haya ocurrido.

Pero podemos prevenir el desplazamiento con `event.preventDefault()` en un evento que cause el desplazamiento, por ejemplo en el evento keydown para `pageUp` y `pageDown`.

Si añadimos un manejador de eventos a estos eventos y un `event.preventDefault()` en el manejador, entonces el desplazamiento no se iniciará.

Hay muchas maneras de iniciar un desplazamiento, la más fiable es usar CSS, la propiedad `overflow`.

Aquí hay algunas tareas que puede resolver o revisar para ver aplicaciones de `onscroll`.

[TOP](#eventos-en-la-ui)