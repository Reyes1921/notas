[Volver al Menú](../root.md)

# `Fondos`

Detrás de cada cuadro de CSS, hay una capa especializada llamada capa de fondo. El CSS ofrece una variedad de formas de realizar cambios significativos, lo que incluye permitir varios fondos.

Las capas de fondo están más lejos del usuario y se renderizan detrás del contenido de un cuadro a partir de su región padding-box. Esto permite que la capa de fondo no se superponga con los bordes.

# `Color de fondo`

Uno de los efectos más simples que puedes aplicar a una capa de fondo es establecer el color. El valor inicial de `background-color` es `transparent`, lo que permite que el contenido de un elemento superior sea visible. Un color válido establecido en una capa de fondo se encuentra detrás de otros elementos pintados en ese elemento.

# `Imágenes de fondo`

En la parte superior de la capa `background-color`, puedes agregar una imagen de fondo con la propiedad `background-image`. Un `background-image` acepta lo siguiente:

- Una URL de imagen o un URI de datos con la función CSS url
- Es una imagen creada de forma dinámica por una función de gradiente CSS.

# `Repite las imágenes de fondo`

De forma predeterminada, las imágenes de fondo se repiten horizontal y verticalmente para ocupar todo el espacio de la capa de fondo.

Para cambiar esto, usa la propiedad background-repeat con uno de los siguientes valores:

- `repeat`: La imagen se repite dentro del espacio disponible y se recorta según sea necesario.
- `round`: La imagen se repite horizontal y verticalmente para que se ajusten tantas instancias como sea posible en el espacio disponible. A medida que aumenta el espacio disponible, la imagen se estira y, después de estirar la mitad del ancho original de la imagen, se comprime para agregar más instancias de imagen.
- `space`: La imagen se repite horizontal y verticalmente para que quepan tantas instancias como sea posible en el espacio disponible sin recortarse, y se espacia según sea necesario. Las imágenes repetidas tocan los bordes del espacio que ocupa una capa de fondo, con espacios en blanco distribuidos de manera uniforme entre ellas.

# `Posición del fondo`

Es posible que hayas notado que, cuando algunas imágenes en la Web se aplican estilos con una declaración background-repeat: no-repeat, estas se muestran en la parte superior izquierda de su contenedor.

La posición inicial de las imágenes de fondo es la esquina superior izquierda. La propiedad background-position te permite cambiar este comportamiento compensando la posición de la imagen.

Al igual que con background-repeat, la propiedad background-position te permite posicionar imágenes a lo largo de los ejes x e y de forma independiente con dos valores de forma predeterminada.

# `Tamaño del fondo`

La propiedad `background-size` establece el tamaño de las imágenes de fondo. De forma predeterminada, el tamaño de las imágenes de fondo se basa en su ancho, altura y relación de aspecto intrínsecos (reales).

La propiedad `background-size` usa valores de longitud y porcentaje de CSS o palabras clave específicas. La propiedad acepta hasta dos parámetros que te permiten cambiar el ancho y la altura de un fondo de forma independiente.

La propiedad `background-size` acepta las siguientes palabras clave:

- `auto`: Cuando se usa de forma independiente, el tamaño de la imagen de fondo se basa en su ancho y alto intrínsecos. Cuando se usa auto junto con otro valor de CSS para el ancho (primer parámetro) o la altura (segundo parámetro), el tamaño de la dimensión establecida en auto se ajusta según sea necesario para mantener la relación de aspecto natural de la imagen. Este es el comportamiento predeterminado de la propiedad `background-size`.
- `cover`: Cubre toda el área de la capa de fondo. Esto puede significar que la imagen se ajustó o se recortó.
- `contain`: Ajusta el tamaño de la imagen para que ocupe todo el espacio sin estirarla ni recortarla. Como resultado, puede quedar espacio vacío que hará que la imagen se repita, a menos que background-repeat se configure como no-repeat.

# `Conexión en segundo plano`

La propiedad `background-attachment` te permite modificar el comportamiento de posición fija de las imágenes de fondo (imágenes que forman parte de una capa de fondo) una vez que la capa es visible en una pantalla.

Acepta 3 palabras clave: `scroll`, `fixed` y `local`.

El comportamiento predeterminado de la propiedad `background-attachment` es el valor inicial de scroll. Cuando se necesita más espacio, las imágenes se mueven con ese espacio dentro de la capa de fondo determinada por los límites del cuadro CSS.

# `Origen del fondo`

La propiedad `background-origin` te permite modificar el área de los fondos asociados con un cuadro en particular. Los valores que acepta la propiedad corresponden a las regiones `border-box`, `padding-box` y `content-box` de un cuadro .

# `Clip de fondo`

La propiedad `background-clip` controla lo que se ve visualmente desde una capa de fondo, independientemente de los límites creados por la propiedad `background-origin`.

Al igual que `background-origin`, las regiones que se pueden especificar son border-box, padding-box y content-box, que corresponden a dónde se puede renderizar una capa de fondo de CSS. Cuando se usan estas palabras clave, se recortará cualquier renderización del fondo más allá de la región especificada.

La propiedad `background-clip` también acepta una palabra clave text que recorta el fondo para que no se extienda más allá del texto dentro del cuadro de contenido. Para que este efecto sea evidente en el texto real dentro de un cuadro de CSS, el texto debe ser parcialmente o completamente transparente.

Es una propiedad relativamente nueva. En el momento de escribir este artículo, Chrome y la mayoría de los navegadores requieren el prefijo -webkit- para usarla.

```JSON
#demoBox {
  aspect-ratio: 1/1;
  border: 0.5px solid hsla(0deg, 0%, 60%, 0.5);
  padding: 1rem;

  font-family: "Google Sans", "Google Sans Text", Roboto, sans-serif;
  font-size: 10rem;
  font-weight: bold;
  text-align: center;

  background-image: url("https://images.unsplash.com/photo-1567095761054-7a02e69e5c43?auto=format&fit=crop&w=690&q=80");
  background-size: contain;
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
}
```

# `Varios fondos`

Como se mencionó al comienzo del módulo, la capa de fondo permite definir varias subcapas. Para abreviar, me referiré a estas subcapas como fondos.

Los múltiples fondos se definen de arriba abajo. El primer fondo es el más cercano al usuario, mientras que el último es el más alejado.

El navegador designa como capa de fondo final el único fondo definido o la última capa. Solo esta capa puede asignar un `background-color`.

Se pueden configurar varias capas de forma individual con la mayoría de las propiedades CSS relacionadas con el fondo que están separadas por comas, como se muestra en el siguiente fragmento de código y en la demostración en vivo.

```JSON
background-image: url("https://assets.codepen.io/7518/pngaaa.com-1272986.png"),
    url("https://assets.codepen.io/7518/blob.svg"),
    linear-gradient(hsl(191deg, 40%, 86%), hsla(191deg, 96%, 96%, 0.5));
  background-size: contain, cover, auto;
  background-repeat: no-repeat, no-repeat, no-repeat;
  background-position: 50% 50%, 10% 50%, 0% 0%;
  background-origin: padding-box, border-box, content-box;
```

# `La abreviatura de background`

Para facilitar la aplicación de diseño a la capa de fondo de un cuadro, especialmente cuando se desean varias capas de fondo, existe un atajo que sigue el siguiente patrón específico:

```JSON
background:
  <background-image>
  <background-position> / <background-size>?
  <background-repeat>
  <background-attachment>
  <background-origin>
  <background-clip>
  <background-color>?
```

[TOP](#fondos)
