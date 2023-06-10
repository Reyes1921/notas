[Volver al Menú](../root.md)

# `Formularios y controles`

# `Propiedades y Métodos de Formularios`

Los formularios y controles, como `<input>`, tienen muchos eventos y propiedades especiales.

Trabajar con formularios será mucho más conveniente cuando los aprendamos.

## `Navegación: Formularios y elementos`

Los formularios del documento son miembros de la colección especial document.forms.

Esa es la llamada “Colección nombrada”: es ambas cosas, nombrada y ordenada. Podemos usar el nombre o el número en el documento para conseguir el formulario.

```
document.forms.my; // el formulario con name="my"
document.forms[0]; // el primer formulario en el documento
```

Cuando tenemos un formulario, cualquier elemento se encuentra disponible en la colección nombrada form.elements.

Puede haber múltiples elementos con el mismo nombre. Esto es típico en el caso de los botones de radio y checkboxes.

Estas propiedades de navegación no dependen de la estructura de las etiquetas. Todos los controles, sin importar qué tan profundos se encuentren en el formulario, están disponibles en form.elements.

<h2 style="color: red">Notación corta: form.name</h2>

Hay una notación corta: podemos acceder el elemento como `form[index/name]`.

En otras palabras, en lugar de form.elements.login podemos escribir form.login.

Esto también funciona, pero tiene un error menor: si accedemos un elemento, y cambiamos su name, se mantendrá disponible mediante el nombre anterior (así como mediante el nuevo).

Esto usualmente no es un problema, porque raramente se cambian los nombres de los elementos de un formulario.

## `Referencia inversa: element.form`

Para cualquier elemento, el formulario está disponible como element.form. Así que un formulario referencia todos los elementos, y los elementos referencian el formulario.

## `Elementos del formulario`

Hablemos de los controles de los formularios.

### `input y textarea`

Podemos acceder sus valores como `input.value` (cadena) o `input.checked` (booleano) para casillas de verificación (checkboxes) y botones de opción (radio buttons).

<h2 style="color: red">Usa textarea.value, no textarea.innerHTML</h2>

Observa que incluso aunque `<textarea>...</textarea>` contenga su valor como HTML anidado, nunca deberíamos usar textarea.innerHTML para acceder a él.

Esto solo guarda el HTML que había inicialmente en la página, no su valor actual.

### `select y option`

Un elemento `<select>` tiene 3 propiedades importantes:

- `select.options` – la colección de subelementos `<option>`,
- `select.value` – el valor del `<option>` seleccionado actualmente, y
- `select.selectedIndex` – el número del `<option>` seleccionado actualmente.

A diferencia de la mayoría de controles, `<select>` permite seleccionar múltiples opciones a la vez si tiene el atributo multiple. Esta característica es raramente utilizada.

### `new Option`

En la especificación hay una sintaxis muy corta para crear elementos `<option>`:

```
option = new Option(text, value, defaultSelected, selected);
```

Esta sintaxis es opcional. Podemos usar `document.createElement('option')` y asignar atributos manualmente. Aún puede ser más corta, aquí los parámetros:

- `text` – el texto dentro del option,
- `value` – el valor del option,
- `defaultSelected` – si es true, entonces se le crea el atributo HTML selected,
- `selected` – si es true, el option se selecciona.

# `Enfocado: enfoque/desenfoque`

Un elemento se enfoca cuando el usuario hace click sobre él o al pulsar Tab en el teclado. Existen también un atributo autofocus de HTML que enfoca un elemento por defecto cuando una página carga, y otros medios de conseguir el enfoque.

## `Eventos focus/blur`

El evento `focus` es llamado al enfocar, y el `blur` cuando el elemento pierde el foco.

```
input.onblur = function() {

};

input.onfocus = function() {

};
```

## `Métodos focus/blur`

Los métodos `elem.focus()` y `elem.blur()` ponen/quitan el foco sobre el elemento.

```
input.focus();

input.blur();
```

<h2 style="color: red">Pérdida de foco iniciada por JavaScript</h2>

Una pérdida de foco puede ocurrir por diversas razones.

Una de ellas ocurre cuando el visitante clica en algún otro lado. Pero el propio JavaScript podría causarlo, por ejemplo:

- Un alert traslada el foco hacia sí mismo, lo que causa la pérdida de foco sobre el elemento (evento blur). Y cuando el alert es cerrado, el foco vuelve (evento focus).
- Si un elemento es eliminado del DOM, también causa pérdida de foco. Si es reinsertado el foco no vuelve.

## `Permitir enfocado sobre cualquier elemento: tabindex`

Por defecto, muchos elementos no permiten enfoque.

La lista varía un poco entre navegadores, pero una cosa es siempre cierta: focus/blur está garantizado para elementos con los que el visitante puede interactuar: `<button>`, `<input>`, `<select>`, `<a>`, etc.

En cambio, elementos que existen para formatear algo, tales como `<div>`, `<span>`, `<table>`, por defecto no son posibles de enfocar. El método elem.focus() no funciona en ellos, y los eventos focus/blur no son desencadenados.

Cualquier elemento se vuelve enfocable si contiene `tabindex`. El valor del atributo es el número de orden del elemento cuando `Tab` (o algo similar) es utilizado para cambiar entre ellos.

Es decir: si tenemos dos elementos donde el primero contiene `tabindex="1"` y el segundo contiene `tabindex="2"`, al presionar `Tab` estando situado sobre el primer elemento se traslada el foco al segundo.

<h2 style="color: red">La propiedad elem.tabIndex también funciona</h2>

Podemos añadir tabindex desde JavaScript utilizando la propiedad elem.tabIndex. Se consigue el mismo resultado.

## `Delegación: focusin/focusout`

Los eventos `focus` y `blur` no se propagan.

Existen los eventos focusin y focusout, exactamente iguales a focus/blur, pero se propagan.

# `Eventos: change, input, cut, copy, paste`

Veamos varios eventos que acompañan la actualización de datos.

## `Evento: change`

El evento `change` se activa cuando el elemento finaliza un cambio.

Para ingreso de texto significa que el evento ocurre cuando se pierde foco en el elemento.

Por ejemplo, mientras estamos escribiendo en el siguiente cuadro de texto, no hay evento. Pero cuando movemos el focus (enfoque) a otro lado, por ejemplo hacemos click en un botón, entonces ocurre el evento change.

Para otros elementos: `select`, `input type=checkbox/radio` se dispara inmediatamente después de cambiar la opción seleccionada.

## `Evento: input`

El evento `input` se dispara cada vez que un valor es modificado por el usuario.

A diferencia de los eventos de teclado, ocurre con el cambio a cualquier valor, incluso aquellos que no involucran acciones de teclado: copiar/pegar con el mouse o usar reconocimiento de voz para dictar texto.

```
<input type="text" id="input"> oninput: <span id="result"></span>
<script>
  input.oninput = function() {
    result.innerHTML = input.value;
  };
</script>
```

Si queremos manejar cualquier modificación en un `<input>` entonces este evento es la mejor opción.

Por otro lado, el evento input no se activa con entradas del teclado u otras acciones que no involucren modificar un valor, por ejemplo presionar las flechas de dirección ⇦ ⇨ mientras se está en el input.

## `Eventos: cut, copy, paste`

Estos eventos ocurren al cortar/copiar/pegar un valor.

Estos pertenecen a la clase ClipboardEvent y dan acceso a los datos cortados/copiados/pegados.

También podemos usar `event.preventDefault()` para cancelar la acción y que nada sea cortado/copiado/pegado.

```
<input type="text" id="input">
<script>
  input.onpaste = function(event) {
    alert("paste: " + event.clipboardData.getData('text/plain'));
    event.preventDefault();
  };

  input.oncut = input.oncopy = function(event) {
    alert(event.type + '-' + document.getSelection());
    event.preventDefault();
  };
</script>
```

## `Restricciones de seguridad`

El portapapeles es algo a nivel “global” del SO. Un usuario puede alternar entre ventanas, copiar y pegar diferentes cosas, y el navegador no debería ver todo eso.

Por ello la mayoría de los navegadores dan acceso al portapapeles únicamente bajo determinadas acciones del usuario, como copiar y pegar.

Está prohibido generar eventos “personalizados” del portapapeles con dispatchEvent en todos los navegadores excepto Firefox. Incluso si logramos enviar tal evento, la especificación establece que tal evento “sintético” no debe brindar acceso al portapapeles.

# `Formularios: evento y método submit`

El evento `submit` se activa cuando el formulario es enviado, normalmente se utiliza para validar el formulario antes de ser enviado al servidor o bien para abortar el envío y procesarlo con JavaScript.

El método `form.submit()` permite iniciar el envío del formulario mediante JavaScript. Podemos utilizarlo para crear y enviar nuestros propios formularios al servidor.

## `Evento: submit`

Mayormente un formulario puede enviarse de dos maneras:

- La primera – Haciendo click en `<input type="submit">` o en `<input type="image">`.
- La segunda – Pulsando la tecla Enter en un campo del formulario.

Ambas acciones causan que el evento submit sea activado en el formulario. El handler puede comprobar los datos, y si hay errores, mostrarlos e invocar event.preventDefault(), entonces el formulario no será enviado al servidor.

<h2 style="color: red">Relación entre submit y click</h2>

Cuando un formulario es enviado utilizando Enter en un campo tipo texto, un evento click se genera en el `<input type="submit">`

## `Método: submit`

Para enviar un formulario al servidor manualmente, podemos usar `form.submit()`.

Entonces el evento `submit` no será generado. Se asume que si el programador llama `form.submit()`, entonces el script ya realizó todo el procesamiento relacionado.

A veces es usado para crear y enviar un formulario manualmente, como en este ejemplo:

```
let form = document.createElement('form');
form.action = 'https://google.com/search';
form.method = 'GET';

form.innerHTML = '<input name="q" value="test">';

// el formulario debe estar en el document para poder enviarlo
document.body.append(form);

form.submit();
```

[TOP](#formularios-y-controles)