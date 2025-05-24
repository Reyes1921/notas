[Volver al Menú](../root.md)

# `Filtros`

Una combinación de filtros CSS y `backdrop-filter` nos permite aplicar efectos y desenfocar lo que sea necesario en tiempo real. La desenfoque y la opacidad son dos de los muchos filtros disponibles, así que repasemos rápidamente qué hacen y cómo usarlos.

# `La propiedad filter`

## `blur`

Esto aplica un desenfoque Gaussiano, y el único argumento que puedes pasar es un radius, que es la cantidad de desenfoque que se aplica. Debe ser una unidad de longitud, como 10px. No se aceptan porcentajes.

```JSON
.my-element {
    filter: blur(0.2em);
}
```

## `brightness`

Para aumentar o disminuir el brillo de un elemento, usa la función de brillo. El valor de brillo se expresa como un porcentaje, y la imagen sin cambios se expresa como un valor del 100%. Un valor del 0% hace que la imagen sea completamente negra, por lo que los valores entre el 0% y el 100% hacen que la imagen sea menos brillante. Usa valores superiores al 100% para aumentar el brillo.

```JSON
.my-element {
    filter: brightness(80%);
}
```

## `contrast`

Establece un valor entre el 0% y el 100% para disminuir o aumentar el contraste, respectivamente.

```JSON
    .my-element {
    filter: contrast(160%);
}
```

## `grayscale`

Puedes aplicar un efecto de escala de grises completo usando 1 como valor para grayscale() o 0 para tener un elemento completamente saturado. También puedes usar valores porcentuales o decimales para aplicar solo un efecto parcial en escala de grises. Si no pasas argumentos, el elemento será completamente en escala de grises. Si pasas un valor superior al 100%, se limitará al 100%.

```JSON
.my-element {
    filter: grayscale(80%);
}
```

## `invert`

Al igual que con grayscale, puedes pasar 1 o 0 a la función invert() para activarla o desactivarla. Cuando está activada, los colores del elemento se invierten por completo. También puedes usar valores porcentuales o decimales para aplicar solo una inversión parcial de colores. Si no pasas ningún argumento a la función invert(), el elemento se invertirá por completo.

```JSON
.my-element {
    filter: invert(1);
}
```

## `opacity`

El filtro opacity() funciona igual que la propiedad opacity, en la que puedes pasar un número o un porcentaje para aumentar o reducir la opacidad. Si no pasas argumentos, el elemento es completamente visible.

```JSON
.my-element {
    filter: opacity(0.3);
}
```

## `saturate`

El filtro de saturación es muy similar al filtro brightness y acepta el mismo argumento: número o porcentaje. En lugar de aumentar o disminuir el efecto de brillo, saturate aumenta o disminuye la saturación del color.

```JSON
.my-element {
    filter: saturate(155%);
}
```

## `sepia`

Puedes agregar un efecto de tono sepia con este filtro que funciona como grayscale(). El tono sepia es una técnica de impresión fotográfica que convierte los tonos negros en tonos marrones para darles un aspecto más cálido. Puedes pasar un número o un porcentaje como argumento de sepia(), que aumenta o disminuye el efecto. Si no pasas argumentos, se agrega un efecto sepia completo (equivalente a sepia(100%)).

```JSON
.my-element {
    filter: sepia(70%);
}
```

## `hue-rotate`

En la lección de colores, aprendiste cómo el tono en hsl hace referencia a una rotación de la rueda de colores, y este filtro funciona de manera similar. Si pasas un ángulo, como grados o giros, se cambia el tono de todos los colores del elemento y se modifica la parte de la rueda de colores a la que hace referencia. Si no pasas ningún argumento, no hará nada.

```JSON
.my-element {
    filter: hue-rotate(120deg);
}
```

## `drop-shadow`

Puedes aplicar una sombra paralela a la curva como lo harías en una herramienta de diseño, como Photoshop con drop-shadow. Esta sombra se aplica a una máscara alfa, lo que la hace muy útil para agregar una sombra a una imagen recortada. El filtro drop-shadow toma un parámetro de sombra que contiene valores de offset-x, offset-y, desenfoque y color separados por espacios. Es casi idéntico a box-shadow, pero no se admiten la palabra clave inset ni el valor de propagación.

```JSON
.my-element {
    filter: drop-shadow(5px 5px 10px orange);
}
```

## `url`

El filtro url te permite aplicar un filtro SVG desde un elemento o archivo SVG vinculado. Puedes leer más sobre los filtros SVG aquí.

```JSON
.my-element {
  /*  Defined in SVG  */
  filter: url(#pink-filter);
}

```

# `Filtro de fondo`

La propiedad `backdrop-filter` acepta todos los mismos valores de la función de filtro que `filter`. La diferencia entre `backdrop-filter` y `filter` es que la propiedad `backdrop-filter` solo aplica los filtros al fondo, mientras que la propiedad `filter` los aplica a todo el elemento.

El ejemplo que aparece al comienzo de esta lección es el ejemplo perfecto, porque no quieres que el texto se desenfoque y, lo ideal, es que no quieras tener que agregar elementos HTML adicionales. Poder aplicar filtros solo al fondo permite hacerlo.

```JSON
.my-element h1 {
  padding: 1.5em;
  background: hsl(0 100% 100% / 55%);
  backdrop-filter: blur(10px);
  z-index: 1;
  font-weight: bold;
  text-transform: uppercase;
}
```

[TOP](#filtros)
