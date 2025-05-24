[Volver al Menú](../root.md)

# `Propiedades lógicas`

El ícono se ubica a la izquierda del texto con un pequeño espacio entre ellos proporcionada por margin-right en el ícono. Sin embargo, sí hay un problema, ya que esto solo funcionará cuando la dirección del texto sea de izquierda a derecha. Si la dirección del texto cambia de derecha a izquierda (que es como leen los idiomas como el árabe), el ícono se ubicará contra el texto.

<img src="../diagram.png">

# `Terminología`

Las propiedades físicas de las partes superior, derecha, inferior e izquierda se refieren a las dimensiones físicas del viewport. Son como una rosa de los vientos en un mapa. Las propiedades lógicas, por otro lado, hacen referencia a los bordes de un cuadro en relación con el flujo de contenido. Por lo tanto, pueden cambiar si cambian la dirección del texto o el modo de escritura. Este es un gran cambio de los estilos direccionales, y nos da mucha más flexibilidad a la hora de definir el estilo de nuestras interfaces.

# `Bloquear el flujo - Block Flow`

El flujo de bloques es la dirección en la que se colocan los bloques de contenido. Por ejemplo, si hay dos párrafos, el segundo párrafo es el flujo de bloques. En un documento en inglés, el flujo de bloques es de arriba a abajo. Piensa en esto en el contexto de párrafos de texto que se siguen, de arriba hacia abajo.

# `Flujo intercalado - Inline Flow`

El flujo intercalado es la manera en que fluye el texto en una oración. En un documento en inglés, el flujo intercalado es de izquierda a derecha. Si cambia el idioma del documento de su página web al árabe (`<html lang="ar">`), entonces el flujo intercalado sería de derecha a izquierda.

# `Relativo de flujo - Flow relative margin`

Históricamente, en los CSS solo pudimos aplicar propiedades como el margen en relación con la dirección de sus lados. Por ejemplo, margin-top se aplica a la parte superior física del elemento. Con las propiedades lógicas, margin-top se convierte en margin-block-start. Esto significa que, independientemente del idioma y la dirección del texto, El flujo de bloque tiene reglas de margen adecuadas.

# `Tamaño`

Para evitar que un elemento supere un ancho o una altura determinados, escribe una regla como esta:

```JSON
.my-element {
  max-width: 150px;
  max-height: 100px;
}
```

Para evitar que un elemento supere un ancho o una altura determinados, escribe una regla como esta:

Los equivalentes relativos de flujo son `max-inline-size` y `max-block-size`. También puedes usar `min-block-size` y `min-inline-size` en lugar de `min-height` y `min-width`.

```JSON
.my-element {
  max-inline-size: 150px;
  max-block-size: 100px;
}
```

# `Inicio y finalización`

En lugar de usar las direcciones, como arriba, a la derecha, abajo e izquierda, usar inicio y fin. Esto te da inicio en bloque, inicio en línea, final en bloque e inicio en línea. Estas te permiten aplicar propiedades de CSS que responden a los cambios en el modo de escritura.

# `Espaciado y posicionamiento`

Propiedades lógicas para margin, padding y inset hacen que el posicionamiento de elementos y la determinación de cómo interactúan entre sí en modos de escritura sean más fáciles y eficientes. Las propiedades relacionadas con el margen y el padding siguen siendo asignaciones directas a las direcciones, pero la diferencia clave es que cuando un modo de escritura cambia, también lo hace.

```JSON
.my-element {
  padding-top: 2em;
  padding-bottom: 2em;
  margin-left: 2em;
  position: relative;
  top: 0.2em;
}

.my-element {
  padding-block-start: 2em;
  padding-block-end: 2em;
  margin-inline-start: 2em;
  position: relative;
  inset-block-start: 0.2em;
}
```

# `Bordes`

También se pueden agregar border y border-radius con propiedades lógicas. Para agregar un borde en la parte inferior y derecha, con un radio de la derecha, podrías escribir una regla como la siguiente:

```JSON
.my-element {
  border-bottom: 1px solid red;
  border-right: 1px solid red;
  border-bottom-right-radius: 1em;
}

.my-element {
  border-block-end: 1px solid red;
  border-inline-end: 1px solid red;
  border-end-end-radius: 1em;
}
```

# `Unidades`

Las propiedades lógicas traen dos unidades nuevas: vi y vb. Una unidad vi es el 1% del tamaño del viewport en la dirección intercalada. El equivalente de propiedad no lógica es vw. La unidad vb es el 1% del viewport en la dirección del bloque. El equivalente de propiedad no lógica es vh.

Estas unidades siempre se asignarán a la dirección de lectura. Por ejemplo, si deseas que un elemento ocupe el 80% del espacio intercalado disponible de un viewport, Si usas la unidad vi, se cambiará automáticamente ese tamaño para que sea de arriba a abajo si el modo de escritura es vertical.

[TOP](#propiedades-lógicas)
