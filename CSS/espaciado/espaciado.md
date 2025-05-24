[Volver al Menú](../root.md)

# `Espaciado`

La propiedad margin podría ofrecerte lo que necesitas, pero también puede agregar espacios adicionales que no deseas. Por ejemplo, ¿cómo te orientas solo al espacio entre cada uno de esos elementos? Algo como gap podría ser más apropiado en este caso. Hay muchas maneras de ajustar el espaciado dentro de una IU, cada uno con sus propias fortalezas y advertencias.

# `Espacio HTML`

El HTML mismo proporciona algunos métodos para espaciar los elementos. Los elementos `<br>` y `<hr>` te permiten espaciar los elementos en la dirección del bloque. que, si usas un idioma de origen latino, es de arriba a abajo.

# `Margen`

La abreviatura margin aplica propiedades en un orden particular: arriba, derecha, abajo e izquierda. Puedes recordar estos errores: TROUBLe.

La abreviatura margin también se puede usar con uno, dos o tres valores. Agregar un cuarto valor te permite configurar cada lado individual. Se aplican de la siguiente manera:

- Se aplicará un valor a todos los lados. (margin: 20px).
- Dos valores: el primer valor se aplicará a la parte superior e inferior. y el segundo valor se aplica a la izquierda y a la derecha. (margin: 20px 40px)
- Tres valores: el primero es top, el segundo valor es left y right, y el tercer valor es bottom. (margin: 20px 40px 30px).

También puedes usar un valor de `auto` para el margen. Para los elementos de nivel de bloque con un tamaño restringido, un margen de `auto` ocupará espacio disponible en la dirección en la que se aplique. Un buen ejemplo es este: del módulo Flexbox, en el que los elementos se alejan entre sí.

## `Propiedades lógicas`

En lugar de especificar `margin-top`, `margin-right`, `margin-bottom` y `margin-left`, puedes usar `margin-block-start`, `margin-inline-end`, `margin-block-end` y `margin-inline-start`.

## `Margen negativo`

Los valores negativos también se pueden usar para el margen. En lugar de agregar espacio entre elementos del mismo nivel reducirá el espacio entre ellos. Esto puede dar como resultado la superposición de elementos, si declaras un valor negativo superior al espacio disponible.

## `Contracción de margen`

La contracción del margen es un concepto engañoso, pero es algo con lo que te encontrarás muy comúnmente cuando compiles interfaces. Supongamos que tienes dos elementos, un encabezado y un párrafo, ambos tienen un margen vertical:

A primera vista, se te perdona pensar que el párrafo estará separado del encabezado 5em porque la combinación de 2rem y 3rem se calcula como 5rem. Sin embargo, debido a que el margen vertical se contrae, el espacio en realidad es 3rem.

La contracción de márgenes funciona seleccionando el valor más grande de dos elementos contiguos con un margen vertical en los lados contiguos. La parte inferior de h1 se une con la parte superior de p, para que se seleccione el valor más alto del margen inferior de h1 y el margen superior de p. Si las h1 tuvieran un 3.5rem de margen inferior, el espacio entre ambos sería 3.5rem porque es mayor que 3rem. Solo los márgenes de bloqueo se contraen, no los márgenes intercalados (horizontales).

# `Relleno`

En lugar de crear espacio en el exterior de la caja, como lo hace margin, En su lugar, la propiedad padding crea espacio en el interior del cuadro: como el aislamiento.

La propiedad padding es la abreviatura de `padding-top`, `padding-right`, `padding-bottom` y `padding-left`.

## `Propiedades lógicas`

`padding-block-start`, `padding-inline-end`, `padding-block-end` y `padding-inline-start`.

# `Posicionamiento`

También se aborda en el módulo sobre diseño. si estableces un valor para position distinto de static, puedes espaciar elementos con las propiedades top, right, bottom y left. Existen algunas diferencias con cómo se comportan estos valores direccionales:

- Un elemento con position: `relative` mantendrá su lugar en el flujo del documento. incluso cuando establezcas estos valores. También estarán relacionados con la posición de tu elemento.
- Un elemento con position: `absolute` basará los valores direccionales a partir de la posición del elemento superior relativo.
- Un elemento con position: `fixed` basará los valores direccionales en el viewport.
- Un elemento con position: `sticky` solo aplicará los valores direccionales cuando el dispositivo esté acoplado o bloqueado.

# `Cuadrícula y flexbox`

Por último, tanto en cuadrícula como en Flexbox, puedes usar la propiedad `gap` para crear espacio entre elementos secundarios. La propiedad `gap` es una abreviatura de `row-gap` y `column-gap`. acepta uno o dos valores, que pueden ser longitudes o porcentajes. También puedes utilizar palabras clave como `unset`, `initial` y `inherit`. Si defines solo un valor, se aplicará la misma gap a las filas y columnas, pero si defines ambos valores, el primer valor es row-gap y el segundo es column-gap.

# `Cómo crear espaciado consistente`

Es muy buena idea elegir una estrategia y seguirla. para ayudarte a crear una interfaz de usuario coherente con un buen flujo y ritmo. Una buena manera de lograrlo es usar medidas coherentes para el espaciado.

Por ejemplo, puedes comprometerte a usar 20px. como una medida coherente para todos los espacios entre elementos, conocidos como medianiles, que todos los diseños se vean y se sientan coherentes. También puedes usar 1em como el espaciado vertical entre el contenido del flujo. lo que lograría un espaciado coherente basado en la font-size del elemento. Sin importar lo que elijas, guardar estos valores como variables (o propiedades personalizadas de CSS) asignar tokens a esos valores y facilitar un poco la coherencia.

[TOP](#espaciado)
