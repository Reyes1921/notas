[Volver al Menú](../root.md)

# `Unidades de dimensionamiento`

# `Números`

Los números se utilizan para definir la opacity, line-height e incluso los valores del canal de color en rgb. Los números son enteros sin unidades (1, 2, 3, 100) y decimales (.1, .2, .3).

# `Porcentajes`

Al usar un porcentaje en CSS, necesita saber cómo se calcula éste. Por ejemplo, width se calcula como un porcentaje del ancho del elemento principal.

# `Dimensiones y longitudes`

Si adjunta una unidad a un número, se convierte en una dimensión. Por ejemplo, 1rem es una dimensión. En este contexto, la unidad que se adjunta a un número se denomina en las especificaciones como un símbolo de dimensión. Las longitudes son dimensiones que se refieren a la distancia y pueden ser absolutas o relativas.

## `Longitudes absolutas`

Todas las longitudes absolutas se resuelven contra la misma base, lo que las hace predecibles dondequiera que se utilicen en su CSS. Por ejemplo, si usa cm para dimensionar su elemento y luego imprime, debería ser exacto si lo compara con una regla.

<table><thead><tr><th>Unidad</th><th>Nombre</th><th>Equivalente a</th></tr></thead><tbody><tr><td><a href="#">cm</a></td><td>Centímetros</td><td>1 cm = 96 px/2.54</td></tr><tr><td><a href="#">mm</a></td><td>Milimetros</td><td>1 mm = 1/10 de 1 cm</td></tr><tr><td><a href="#>Q</a></td><td>Cuarto de milímetro</td><td>1Q = 1/40 de 1 cm</td></tr><tr><td><a href="#">in</a></td><td>Pulgadas</td><td>1 in = 2.54 cm = 96 px</td></tr><tr><td><a href="#">pc</a></td><td>Picas</td><td>1pc = 1/6 de 1 in</td></tr><tr><td><a href="#">pt</a></td><td>Puntos</td><td>1 pt = 1/72 de 1 in</td></tr><tr><td><a href="#">px</a></td><td>Pixeles</td><td>1 px = 1/96 de 1 in</td></tr></tbody></table>

## `Longitudes relativas`

La longitud relativa se calcula contra un valor base, muy parecido a un porcentaje. La diferencia entre estos y los porcentajes es que puede dimensionar los elementos contextualmente. Esto significa que CSS tiene unidades como ch que usan el tamaño del texto como base y vw que se basa en el ancho de la ventana gráfica (la ventana de su navegador). Las longitudes relativas son particularmente útiles en la web debido a su naturaleza responsiva.

## `Unidades relativas al tamaño de fuente`

CSS tiene unidades útiles que son relativas al tamaño de los elementos de la tipografía renderizada, como el tamaño del texto en sí (unidades em) o el ancho de los caracteres tipográficos (unidades ch).

<table><thead><tr><th>unidad</th><th>relativo a:</th></tr></thead><tbody><tr><td><a href="#">em</a></td><td>En relación con el tamaño de fuente, es decir, 1.5em será un 50% más grande que el tamaño de fuente calculado base de su padre. (Históricamente, la altura de la letra mayúscula "M").</td></tr><tr><td><a href="#">ex</a></td><td>Heurística para determinar si se debe usar la x-height,, una letra "x" o `.5em` en el tamaño de fuente calculado actual del elemento.</td></tr><tr><td><a href="#">cap</a></td><td>Altura de las letras mayúsculas en el tamaño de fuente calculado actual del elemento.</td></tr><tr><td><a href="#">ch</a></td><td><a href="#">Avance de carácter</a> promedio de un glifo estrecho en la fuente del elemento (representado por el glifo "0").</td></tr><tr><td><a href="#">ic</a></td><td><a href="#">Avance de carácter</a> promedio de un glifo de ancho completo en la fuente del elemento, representado por el glifo "水" (ideograma de agua CJK, U + 6C34).</td></tr><tr><td><a href="#">rem</a></td><td>Tamaño de fuente del elemento raíz (el valor predeterminado es 16px).</td></tr><tr><td><a href="#">lh</a></td><td>Altura de línea del elemento.</td></tr><tr><td><a href="#">rlh</a></td><td>Altura de línea del elemento raíz.</td></tr></tbody></table>

## `Unidades relativas a la ventana gráfica`

Puede utilizar las dimensiones de la ventana gráfica (ventana del navegador) como una base relativa. Estas unidades reparten el espacio disponible de la ventana gráfica.

<table><thead><tr><th>unidad</th><th>relativa a</th></tr></thead><tbody><tr><td><a href="#">vw</a></td><td>1% del ancho de la ventana gráfica. Se usa esta unidad para hacer trucos de fuentes geniales, como cambiar el tamaño de una fuente de encabezado en función del ancho de la página, de modo que a medida que el usuario cambia el tamaño de la ventana, la fuente también cambia de tamaño.</td></tr><tr><td><a href="#">vh</a></td><td>1% de la altura de la ventana gráfica. Puede usarla para organizar elementos en una interfaz de usuario, si tiene una barra de herramientas de pie de página, por ejemplo.</td></tr><tr><td><a href="#">vi</a></td><td>1% del tamaño de la ventana gráfica en el <a href="#">eje en línea</a> del elemento raíz. El eje se refiere a los modos de escritura. En los modos de escritura horizontal como el inglés, el eje en línea es horizontal. En los modos de escritura vertical como algunos tipos de letra japoneses, el eje en línea va de arriba a abajo.</td></tr><tr><td><a href="#">vb</a></td><td>1% del tamaño de la ventana gráfica en el <a href="#">eje del bloque</a> del elemento raíz. Para el eje del bloque, esta sería la direccionalidad del lenguaje. Los idiomas LTR como el inglés tendrían un eje de bloque vertical, ya que los lectores en inglés analizan la página de arriba a abajo. Un modo de escritura vertical tiene un eje de bloque horizontal.</td></tr><tr><td><a href="#in">vmin</a></td><td>1% de la dimensión más pequeña de la ventana gráfica.</td></tr><tr><td><a href="#">vmax</a></td><td>1% de la dimensión más grande de la ventana gráfica.</td></tr></tbody></table>

## `Unidades misceláneas`

Hay algunas otras unidades que se han especificado para tratar tipos particulares de valores.

### `Unidades angulares`

En el módulo de color, analizamos las unidades de ángulo, que son útiles para definir valores de grados, como el tono en hsl. También son útiles para rotar elementos dentro de funciones de transformación.

Usando launidad de ángulo deg, puede rotar un div 90 ° en su eje central.

```
div {
  background-image: url('a-low-resolution-image.jpg');
}

@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
  div {
    background-image: url('a-high-resolution-image.jpg');
  }
}
```

## `Unidades de resolución`

En el ejemplo anterior, el valor de min-resolution es 192dpi. La unidad dpi significa puntos por pulgada. Un contexto útil para esto es detectar pantallas de muy alta resolución, como pantallas Retina, en una consulta de medios y mostrar una imagen de mayor resolución.

[TOP](#unidades-de-dimensionamiento)