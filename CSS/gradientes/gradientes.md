[Volver al Menú](../root.md)

# `Gradientes`

# `Gradiente lineal`

La función `linear-gradient()` genera una imagen de dos o más colores de forma progresiva. Toma varios argumentos, pero en su configuración más simple, puedes pasar algunos colores como este y se dividirán automáticamente de forma uniforme mientras se combinan.

```JSON
.my-element {
    background: linear-gradient(black, white);
}
```

También puedes pasar un ángulo o palabras clave que representen un ángulo. Si decides usar palabras clave, especifica una dirección después de la palabra clave to. Esto significa que, si deseas un gradiente en blanco y negro que vaya de la izquierda (negro) a la derecha (blanco), debes especificar el ángulo como to right como primer argumento.

```JSON
.my-element {
    background: linear-gradient(to right, black, white);
}
```

s un valor de parada de color definido donde un color se detiene y se mezcla con sus vecinos. Para un gradiente que comienza con un tono oscuro de rojo que se extiende en un ángulo de 45 grados, en el 30% del tamaño del gradiente que cambia a un rojo más claro, se ve de la siguiente manera.

```JSON
.my-element {
    background: linear-gradient(45deg, darkred 30%, crimson);
}
```

Puedes agregar tantos colores y puntos de color como desees en un linear-gradient(), y puedes superponer gradientes entre sí separándolos con una coma.

```JSON
.my-element {
	background: linear-gradient(45deg, darkred 20%, crimson, darkorange 60%, gold, bisque);
}
```

# `Gradiente radial`

Para crear un gradiente que irradie de forma circular, la función `radial-gradient()` te ayuda. Es similar a `linear-gradient()`, pero, en lugar de especificar un ángulo, puedes especificar de manera opcional una posición y una forma final. Si solo especificas colores, `radial-gradient()` seleccionará automáticamente la posición como center y elegirá un círculo o una elipse, según el tamaño del cuadro.

```JSON
.my-element {
    background: radial-gradient(white, black);
}
```

La posición del gradiente es similar a background-position con palabras clave o valores numéricos. El tamaño del gradiente radial determina el tamaño de la forma final del gradiente (círculo o elipse) y, de forma predeterminada, será farthest-corner, lo que significa que se encuentra exactamente en la esquina más alejada del cuadro desde el centro. También puedes usar las siguientes palabras clave:

- `closest-corner` se encontrará con la esquina más cercana al centro del gradiente.
- `closest-side` se encontrará con el lado del cuadro más cercano al centro del gradiente.
- `farthest-side` hará lo opuesto a closest-side.

Puedes agregar tantos puntos de color como desees, al igual que con linear-gradient. Del mismo modo, puedes agregar tantos radial-gradients como desees.

# `Gradiente cónico`

Un gradiente cónico tiene un punto central en el cuadro y comienza desde la parte superior (de forma predeterminada) y gira en un círculo de 360 grados.

```JSON
.my-element {
	background: conic-gradient(white, black);
}
```

La función `conic-gradient() `acepta argumentos de posición y ángulo.

De forma predeterminada, el ángulo es de 0 grados y comienza en la parte superior, en el centro. Si configuraras el ángulo en 45deg, sería la esquina superior derecha. El argumento de ángulo acepta cualquier tipo de valor de ángulo, como los gradientes lineales y radiales.

La posición es central de forma predeterminada. Al igual que con los gradientes radiales y lineales, el posicionamiento puede basarse en palabras clave o definirse con valores numéricos.

Puedes agregar tantos puntos de parada de color como desees, como con otros tipos de gradientes. Un buen caso de uso para esta función, con gradientes cónicos, es renderizar gráficos circulares con CSS.

```JSON
.my-element {
	background: conic-gradient(
     gold 20deg, lightcoral 20deg 190deg, mediumturquoise 190deg 220deg, plum 220deg 320deg, steelblue 320deg);
  border-radius: 50%;
  border: 10px solid;
}
```

# `Repetición y combinación`

Cada tipo de gradiente también tiene un tipo de repetición. Estos son `repeating-linear-gradient()`, `repeating-radial-gradient()` y `repeating-conic-gradient()`. Son similares a las funciones no repetidas y toman los mismos argumentos. La diferencia es que, si el gradiente definido se puede repetir para llenar el cuadro, según ambos tamaños, lo hará.

```JSON
.my-element {
  background: repeating-linear-gradient(
    45deg,
    red,
    red 30px,
    white 30px,
    white 60px
  );
}
```

# `Interpolación y espacios de color`

Cada tipo de gradiente puede interpolar entre colores de diferentes maneras con los espacios de color y la palabra clave in. Esta opción te permite personalizar los resultados entre dos puntos de color en un gradiente.

Por ejemplo, puedes usar el espacio de color oklab para quitar, en general, los colores medios no saturados y garantizar un gradiente más seguro y más vivo.

```JSON
.my-element {
  background: linear-gradient(in oklch, deeppink, yellow);
}
```

Además de personalizar la interpolación, los espacios de color cilíndricos (HSL, HWB, LCH y OKLCH) ofrecen las palabras clave shorter (predeterminada) o longer para especificar si la línea del gradiente debe tomar la ruta larga alrededor de la rueda de colores o la ruta corta entre los dos colores.

```JSON
.my-element {
  background: linear-gradient(in oklch longer hue, deeppink, yellow);
}
```

[TOP](#gradientes)
