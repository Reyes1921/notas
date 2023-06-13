[Volver al Menú](../root.md)


# `Mutation observer`

`MutationObserver` es un objeto incorporado que observa un elemento DOM y dispara un callback cuando hay cambios en él.

## `Sintaxis`

`MutationObserver` es fácil de usar.

Primero creamos un observador con una función callback:

`let observer = new MutationObserver(callback);`

Y luego lo vinculamos a un nodo DOM:

`observer.observe(node, config);`



`config` es un objeto con opciones booleanas “a qué clase de cambios reaccionar”:

- `childList` – cambios en los hijos directos de node,
- `subtree` – en todos los descendientes de node,
- `attributes` – atributos de node,
- `attributeFilter` – un array de nombres de atributos, para observar solamente a los seleccionados,
- `characterData` – establece si debe observar cambios de texto en node.data o no,

Algunas otras opciones:

- `attributeOldValue` – si es true, tanto el valor viejo como el nuevo del atributo son pasados al callback (ver abajo), de otro modo pasa solamente el nuevo (necesita la opción attributes).

- `characterDataOldValue` – si es true, tanto el valor viejo como el nuevo de node.data son pasados al callback (ver abajo), de otro modo pasa solamente el nuevo (necesita la opción characterData).

Entonces, después de cualquier cambio, el callback es ejecutado: los cambios son pasados en el primer argumento como una lista objetos `MutationRecord`, y el observador en sí mismo como segundo argumento.

Los objetos MutationRecord tienen como propiedades:

- `type` – tipo de mutación, uno de:
    - "attributes": atributo modificado,
    - "characterData": dato modificado, usado para nodos de texto,
    - "childList": elementos hijos agregados o quitados,
- `target` – dónde ocurrió el cambio: un elemento para "attributes", o un nodo de texto para "characterData", o un elemento para una mutación de "childList",
`- addedNodes/removedNodes` – nodos que fueron agregados o quitados,
`- previousSibling/nextSibling` – los nodos “hermanos”, previos y siguientes a los nodos agregados y quitados,
- `attributeName/attributeNamespace` – el nombre o namespace (para XML) del atributo cambiado,
- `oldValue` – el valor previo, solamente cambios de atributo o cambios de texto si se establece la opción correspondiente attributeOldValue/characterDataOldValue.

Por ejemplo, aquí hay un `<div>` con un atributo contentEditable. Ese atributo nos permite poner el foco en él y editarlo.

```
<div contentEditable id="elem">Click and <b>edit</b>, please</div>

<script>
let observer = new MutationObserver(mutationRecords => {
  console.log(mutationRecords); // console.log(los cambios)
});

// observa todo exceptuando atributos
observer.observe(elem, {
  childList: true, // observa hijos directos
  subtree: true, // y descendientes inferiores también
  characterDataOldValue: true // pasa el dato viejo al callback
});
</script>
```

Si ejecutamos este código en el navegador, el foco en el `<div>` dado y el cambio en texto dentro de `<b>edit</b>`, console.log mostrará una mutación:

```
mutationRecords = [{
  type: "characterData",
  oldValue: "edit",
  target: <text node>,
  // otras propiedades vacías
}];
```

## `Uso para integración`

¿Cuándo puede ser práctico esto?

Imagina la situación cuando necesitas añadir un script de terceros que contiene funcionalidad útil, pero también hace algo no deseado, por ejemplo añadir publicidad `<div class="ads">Unwanted ads</div>`.

Naturalmente el script de terceras partes no proporciona mecanismos para removerlo.

Usando `MutationObserver` podemos detectar cuándo aparece el elemento no deseado en nuestro DOM y removerlo.

Hay otras situaciones, como cuando un script de terceras partes agrega algo en nuestro documento y quisiéramos detectarlo para adaptar nuestra página y cambiar el tamaño de algo dinámicamente, etc.

`MutationObserver` permite implementarlo.

## `Uso para arquitectura`

[Mas Información](https://es.javascript.info/mutation-observer#uso-para-arquitectura)

## `Métodos adicionales`

Hay un método para detener la observación del nodo:

- `observer.disconnect()` – detiene la observación.

Cuando detenemos la observación, algunos cambios todavía podrían quedar sin ser procesados por el observador. En tales casos usamos

- `observer.takeRecords()` – obtiene una lista de registros de mutaciones sin procesar, aquellos que ocurrieron pero el callback no manejó.

<h2 style="color: red">Interacción con la recolección de basura</h2>

Los observadores usan internamente referencias débiles a nodos. Esto es: si un nodo es quitado del DOM y se hace inalcanzable, se vuelve basura para ser recolectada.

El mero hecho de que un nodo DOM sea observado no evita la recolección de basura

<h2 style="color: green">Resumen</h2>

`MutationObserver` puede reaccionar a cambios en el DOM: atributos, contenido de texto y añadir o quitar elementos.

Podemos usarlo para rastrear cambios introducidos por otras partes de nuestro código o bien para integrarlo con scripts de terceras partes.

`MutationObserver` puede rastrear cualquier cambio. Las opciones de config permiten establecer qué se va a observar, se usa para optimización y no desperdiciar recursos en llamados al callback innecesarios.

[TOP](#mutation-observer)