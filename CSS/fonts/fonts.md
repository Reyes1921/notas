[Volver al Menú](../root.md)

# `Texto y tipografía

El texto es uno de los componentes básicos de la Web.

Cuando creas un sitio web, no es necesario que apliques diseño al texto. De hecho, el HTML tiene algunos diseños predeterminados bastante razonables.

# `La regla @font-face`

La regla de at de CSS `@font-face` es fundamental en el diseño web, ya que te permite especificar y usar fuentes personalizadas para mostrar texto. La belleza de `@font-face` reside en su versatilidad: te permite obtener fuentes de un servidor remoto o de una fuente instalada en el dispositivo del usuario.

```JSON
@font-face {
  font-family: "Trickster";
  src:
    local("Trickster"),
    url("trickster-COLRv1.otf") format("opentype") tech(color-COLRv1),
    url("trickster-outline.otf") format("opentype"),
    url("trickster-outline.woff") format("woff")
}
```

`Descriptores`

- `ascent-override`
  Personaliza la métrica de ascenso, lo que afecta el espacio por encima del valor de referencia.

- `descent-override`
  Ajusta la métrica de descenso, lo que afecta el espacio debajo del modelo de referencia.

- `font-display`
  Controla el comportamiento de visualización de la fuente según su estado de descarga.

- `font-family`
  Asigna un nombre a la fuente para usarla en propiedades relacionadas con la fuente.

- `font-stretch`
  Establece una escala horizontal aceptable, especificada como un valor o un rango único.

- `font-style`
  Define el estilo de fuente y admite rangos de ángulos para los estilos oblicuos.

- `font-weight`
  Determina el grosor de la fuente o el rango de grosores disponibles.

- `font-feature-settings`
  Habilita el acceso a las funciones de la fuente OpenType.

- `font-variation-settings`
  Proporciona un control más preciso sobre la configuración de fuentes variables.

- `line-gap-override`
  Anula el espacio entre líneas predeterminado de la fuente.

- `size-adjust`
  Aplica un factor de escala al contorno y las métricas de la fuente.

- `src`
  Define la fuente de la fuente, ya sea local o remota. Esto es obligatorio para la regla `@font-face`. Combinar `url()` y `local()` dentro de src es una estrategia común que usa una fuente local si está disponible y vuelve a un archivo de fuente remoto como resguardo. Los navegadores priorizan los recursos según el orden de declaración, por lo que `local()` suele preceder a `url()`.

- `unicode-range`
  Limita los caracteres para los que se debe usar esta fuente.

## `Tipos de MIME de fuente`

<table>
  <thead>
    <tr>
      <th><strong>Formato</strong></th>
      <th><strong>Tipo MIME</strong></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>TrueType</td>
      <td><code dir="ltr" translate="no">font/<wbr>ttf</code></td>
    </tr>
    <tr>
      <td>OpenType</td>
      <td><code dir="ltr" translate="no">font/<wbr>otf</code></td>
    </tr>
    <tr>
      <td>Formato de fuente abierta de la Web</td>
      <td><code dir="ltr" translate="no">font/<wbr>woff</code></td>
    </tr>
    <tr>
      <td>Formato abierto de fuentes web 2</td>
      <td><code dir="ltr" translate="no">font/<wbr>woff2</code></td>
    </tr>
  </tbody>
</table>

## `Diferencia entre @font-face y font-family`

En CSS, a menudo se confunden @font-face y font-family, pero tienen propósitos distintos.

Como ya mencionamos, @font-face es una regla que se usa para definir las fuentes personalizadas que quieres usar en tu aplicación web. Le indica al navegador dónde descargar la fuente, cómo mostrarla durante la carga (con la propiedad font-display) y especifica qué subconjunto de caracteres descargar (con unicode-range).

En cambio, font-family es una propiedad CSS que se usa dentro de una regla de CSS para asignar una fuente en particular o una lista de fuentes a un elemento. Las fuentes que se enumeran en font-family pueden ser fuentes seguras para la Web, fuentes del sistema o fuentes personalizadas definidas con @font-face.

En resumen, @font-face declara una fuente y le asigna un nombre, y font-family aplica esta fuente declarada a los elementos HTML.

```JSON
<table>
  <thead>
    <tr>
      <th><p><pre>
@font-face {
  font-family: "CustomFont";
  src: url("customfont.woff2") format("woff2");
}

body {
  font-family: "CustomFont", Arial, sans-serif;
}
```

# `Cambia el tipo de letra`

La propiedad `font-family` acepta una lista de cadenas separadas por comas, ya sea que haga referencia a familias de fuentes específicas o genéricas. Las familias de fuentes específicas son cadenas con comillas, como "`Helvetica`", "EB `Garamond`" o "`Times New Roman`". Las familias de fuentes genéricas son palabras clave, como serif, sans-serif y monospace (consulta la lista completa de opciones en MDN). El navegador mostrará el primer tipo de letra disponible de la lista proporcionada.

# `Usa fuentes itálicas y oblicuas`

Usa `font-style` para establecer si el texto debe estar en cursiva o no. `font-style` acepta una de las siguientes palabras clave: `normal`, `italic` y `oblique`.

# `Cómo aplicar negrita al texto`

Usa `font-weight` para establecer la “negrita” del texto. Esta propiedad acepta valores de palabras clave (normal, bold), valores de palabras clave relativos (`lighter`, `bolder`) y valores numéricos (de 100 a 900).

# `Cómo cambiar el tamaño del texto`

Usa `font-size` para controlar el tamaño de los elementos de texto. Esta propiedad acepta valores de longitud, porcentajes y algunos valores de palabras clave.

# `Cambia el espacio entre líneas`

Usa `line-height` para especificar la altura de cada línea en un elemento. Esta propiedad acepta un número, una longitud, un porcentaje o la palabra clave normal. Por lo general, se recomienda usar un número en lugar de una longitud o un porcentaje para evitar problemas con la herencia.

# `Cambia el espacio entre caracteres`

Usa `letter-spacing` para controlar la cantidad de espacio horizontal entre los caracteres del texto. Esta propiedad acepta valores de longitud, como em, px y rem.

# `Cambia el espacio entre palabras`

Usa `word-spacing` para aumentar o disminuir la longitud del espacio entre cada palabra del texto. Esta propiedad acepta valores de longitud, como em, px y rem. Ten en cuenta que la longitud que especifiques es para el espacio adicional además del espaciado normal. Esto significa que `word-spacing`: 0 es equivalente a `word-spacing`: normal.

# `Abreviatura de font`

Puedes usar la propiedad abreviada `font` para establecer muchas propiedades relacionadas con la fuente a la vez. La lista de propiedades posibles es `font-family`, `font-size`, `font-stretch`, `font-style`, `font-variant`, `font-weight` y `line-height`.

# `Cómo cambiar mayúsculas y minúsculas`

Usa `text-transform` para modificar la mayúscula del texto sin necesidad de cambiar el código HTML subyacente. Esta propiedad acepta los siguientes valores de palabras clave: `uppercase`, `lowercase` y `capitalize`.

# `Agrega subrayados, sobrelineados y líneas centrales al texto`

Usa `text-decoration` para agregar líneas al texto. Los guiones bajos son los más usados, pero también puedes agregar líneas sobre el texto o justo en medio de él.

La propiedad `text-decoration` es la forma abreviada de las propiedades más específicas que se detallan a continuación.

La propiedad `text-decoration`-line acepta las palabras clave `underline`, `overline` y `line-through`. También puedes especificar varias palabras clave para varias líneas.

`La propiedad text-decoration-color establece el color de todas las decoraciones de text-decoration-line.`

`La propiedad text-decoration-style acepta las palabras clave solid, double, dotted, dashed y wavy.`

`La propiedad text-decoration-thickness acepta cualquier valor de longitud y establece el ancho del trazo de todas las decoraciones de text-decoration-line.`

`La propiedad text-decoration es un atajo para todas las propiedades anteriores.`

```JSON
.a {
  text-decoration: underline 2px red wavy;
}

.b {
  text-decoration: line-through rgba(255, 180, 0, 0.4) 1.4ex;
}

.c {
  text-decoration: underline 8px dotted rgba(0, 0, 50, 0.5);
}

.d {
  text-decoration: line-through 4px solid rgba(70, 70, 70, 0.9);
}

h1 {
  font-family: "Garamond", "Georgia", serif;
}

h1:not(:last-child) {
  margin-bottom: 24px;
}

/* Decorative styles */
.container {
  text-align: left;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
}

```

# `Agrega una sangría al texto`

Usa `text-indent` para agregar un sangría a tus bloques de texto. Esta propiedad toma una longitud (por ejemplo, 10px, 2em) o un porcentaje del ancho del bloque contenedor.

# `Cómo controlar el contenido oculto o desbordado`

Usa `text-overflow` para especificar cómo se representa el contenido oculto. Hay dos opciones: clip (la predeterminada), que trunca el texto en el punto de desbordamiento, y ellipsis, que muestra una elipsis (…) en el punto de desbordamiento.

# `Controla el espacio en blanco`

La `propiedad white`-space se usa para especificar cómo se deben controlar los espacios en blanco de un elemento. Para obtener más información.

# `Controla cómo se dividen las palabras`

Usa `word-break` para cambiar la forma en que se deben “dividir” las palabras cuando se desbordan en la línea. De forma predeterminada, el navegador no dividirá las palabras. Si usas el valor de palabra clave `break-all` para `word-break`, se le indicará al navegador que divida las palabras en caracteres individuales si es necesario.

# `Cómo cambiar la alineación del texto`

Usa `text-align` para especificar la alineación horizontal del texto en un bloque o elemento de celda de tabla. Esta propiedad acepta los valores de palabras clave `left`, `right`, `start`, `end`, `center`, `justify` y `match-parent`.

# `Cómo cambiar la dirección del texto`

Usa direction para establecer la dirección del texto, ya sea `ltr` (de izquierda a derecha, la opción predeterminada) o `rtl` (de derecha a izquierda). Algunos idiomas, como el árabe, el hebreo o el persa, se escriben de derecha a izquierda, por lo que se debe usar direction: `rtl`. Para el inglés y todos los demás idiomas que se leen de izquierda a derecha, usa direction: `ltr`.

# `Cambia el flujo del texto`

Usa `writing-mode` para cambiar la forma en que fluye y se organiza el texto. El valor predeterminado es horizontal-tb, pero también puedes establecer `writing-mode` en vertical-lr o vertical-rl para el texto que deseas que fluya horizontalmente.

# `Cambia la orientación del texto`

Usa `text-orientation` para especificar la orientación de los caracteres en el texto. Los valores válidos para esta propiedad son mixed y upright. Esta propiedad solo es relevante cuando `writing-mode` se configura en un elemento que no sea horizontal-tb.

# `Cómo agregar una sombra al texto`

Usa `text-shadow` para agregar una sombra al texto. Esta propiedad espera tres longitudes (`x-offset`, `y-offset` y `blur-radius`) y un color.

# `Pseudoelementos`

Los seudoelementos `::first-lette`r y `::first-line` se orientan a la primera letra y a la primera línea de un elemento de texto, respectivamente.

# `Pseudoelemento ::selection`

Usa el pseudoelemento `::selection` para cambiar el aspecto del texto que selecciona el usuario.

Cuando se usa este pseudoelemento, solo se pueden usar ciertas propiedades de CSS: `color`, `background-color`, `text-decoration`, `text-shadow`, `stroke-color`, `fill-color` y `stroke-width`.

# `font-variant`

La propiedad font-variant es un atajo para varias propiedades CSS que te permiten elegir variantes de fuente, como small-caps y slashed-zero. Las propiedades CSS que incluye esta abreviatura son font-variant-alternates, font-variant-caps, font-variant-east-asian, font-variant-ligatures y font-variant-numeric. Consulta los vínculos de cada propiedad para obtener más detalles sobre su uso.

[TOP](#texto-y-tipografía)
