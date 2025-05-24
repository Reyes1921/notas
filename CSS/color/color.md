[Volver al Menú](../root.md)

# `Color`

El color es una parte importante de cualquier sitio web y, en CSS, hay muchas opciones de tipos de color, funciones y tratamientos.

¿Cómo decides qué tipo de color usar? ¿Cómo haces que tus colores sean semitransparentes? En esta lección, aprenderás qué opciones tienes para tomar las decisiones correctas para tu proyecto y equipo.

CSS tiene varios tipos de datos diferentes, como cadenas y números. El color es uno de estos tipos y usa otros, como los números, para sus propias definiciones.

# `Colores numéricos`

Es muy probable que tu primera exposición a los colores en CSS sea a través de los colores numéricos. Podemos trabajar con valores de color numéricos de diferentes formas.

## `Códigos hexadecimales`

```JSON
h1 {
  color: #b71540;
}
```

La notación hexadecimal (a menudo abreviada como hexadecimal) es una sintaxis abreviada para RGB, que asigna un valor numérico a los colores rojo, verde y azul, que son los tres colores primarios.

También puedes definir un valor alfa con cualquier color numérico. Un valor alfa es un porcentaje de transparencia. En el código hexadecimal, se agregan otros dos dígitos a la secuencia de seis dígitos, lo que genera una secuencia de ocho dígitos. Por ejemplo, para establecer el negro en código hexadecimal, escribe #000000. Para agregar una transparencia del 50%, cámbiala a #00000080.

Debido a que la escala hexadecimal es de 0 a 9 y de A a F, es probable que los valores de transparencia no sean exactamente lo que esperas. Estos son algunos valores clave y comunes que se agregaron al código hexadecimal negro, #000000:

- El 0% de alfa, que es completamente transparente, es 00: #00000000
- El 50% de alfa es 80: #00000080
- El 75% de alfa es BF: #000000BF

## `RGB (rojo, verde y azul)`

```JSON
h1 {
  color: rgb(183, 21, 64);
}
```

Los colores RGB se definen con la función de color rgb(), que usa números o porcentajes como parámetros. Los números deben estar dentro del rango de 0 a 255 y los porcentajes deben estar entre 0% y 100%‌. RGB funciona en la escala de 0 a 255, por lo que 255 equivale al 100% y 0 al 0%.

Para establecer el negro en RGB, defínelo como rgb(0 0 0), que es cero rojo, cero verde y cero azul. El negro también se puede definir como rgb(0%, 0%, 0%). El blanco es exactamente lo opuesto: rgb(255, 255, 255) o rgb(100%, 100%, 100%).

Se establece un alfa en rgb() de una de las siguientes dos maneras. Agrega un / después de los parámetros rojo, verde y azul, o usa la función rgba(). El valor alfa se puede definir con un porcentaje o un decimal entre 0 y 1. Por ejemplo, para establecer un 50% de alfa negro en navegadores modernos, escribe: rgb(0 0 0 / 50%) o rgb(0 0 0 / 0.5). Para obtener una compatibilidad más amplia, usa la función rgba() y escribe rgba(0, 0, 0, 50%) o rgba(0, 0, 0, 0.5).

## `HSL (matiz, saturación y luminosidad)`

```JSON
h1 {
  color: hsl(344, 79%, 40%);
}
```

HSL significa tono, saturación y luminosidad. El tono describe el valor en la rueda de colores, de 0 a 360 grados, comenzando con el rojo (0 y 360). Un tono de 180 o 50% estaría en el rango azul. Es el origen del color que vemos.

La saturación indica qué tan intenso es el tono seleccionado. Un color completamente desaturado (con una saturación de 0%) aparecerá en escala de grises. Por último, la luminosidad es el parámetro que describe la escala del blanco al negro de la luz agregada. Una luminosidad de 100% siempre te dará un color blanco.

Con la función de color hsl(), puedes escribir hsl(0 0% 0%) o incluso hsl(0deg 0% 0%) para definir un negro verdadero. Esto se debe a que el parámetro de tono define el grado en la rueda de colores, que, si usas el tipo de número, es de 0 a 360. También puedes usar el tipo de ángulo, que es (0deg) o (0turn). Tanto la saturación como la luminosidad se definen con porcentajes.

# `Palabras clave de color`

Hay 148 colores con nombres en CSS. Estos son nombres en inglés simple, como morado, tomate y dorado. Algunos de los nombres más populares, según el Web Almanac, son negro, blanco, rojo, azul y gris. Entre nuestros favoritos, se incluyen dorado, azul alice y rosa intenso.

Además de los colores estándar, también hay palabras clave especiales disponibles:

- `transparent` es un color completamente transparente. También es el valor inicial de background-color.
- `currentColor` es el valor dinámico calculado contextual de la propiedad color. Si tienes un color de texto de red y, luego, estableces border-color como currentColor, también será rojo. Si el elemento en el que defines currentColor no tiene un valor definido para color, la cascada calculará currentColor

[TOP](#color)
