[Volver al Menú](../root.md)

# `Flexbox`

Flexbox es un mecanismo de distribución diseñado para distribuir grupos de elementos en una dimensión.

El modelo de distribución de caja flexible (flexbox) es un modelo de distribución pensado para contenido unidimensional. Se destaca por tomar varios elementos que tienen diferentes tamaños y devolver la mejor distribución para estos.

Este es el modelo de distribución ideal para este patrón de barra lateral. Flexbox no solo ayuda a colocar la barra lateral y el contenido en línea, sino que, donde no queda suficiente espacio, la barra lateral se dividirá en una nueva línea. En lugar de establecer dimensiones rígidas para que las siga el navegador, con flexbox, puede ofrecer límites flexibles para indicar cómo podría mostrarse el contenido.

Las distribuciones flex tienen las siguientes características, que podrá explorar en esta guía.

- Pueden mostrarse como una fila o una columna.

- Respetan el modo de escritura del documento.

- Son de una sola línea por default, pero se les puede pedir que se ajusten a varias líneas.

- Los elementos en el diseño se pueden reordenar visualmente, sin considerar su orden en el DOM.

- El espacio se puede distribuir dentro de los elementos, por lo que se vuelven más grandes y más pequeños según el espacio disponible en su padre.

- El espacio se puede distribuir alrededor de los elementos y las líneas flex en una distribución envolvente, utilizando las propiedades Box Alignment.

- Los elementos en sí se pueden alinear en el eje transversal.

# `El eje principal y el eje transversal`

La clave para comprender flexbox es comprender el concepto de eje principal y eje transversal. El eje principal es el que establece su propiedad `flex-direction`. Si esa es `row`, su eje principal está a lo largo de la fila, si es `column` su eje principal está a lo largo de la columna.

## `El eje principal`

El eje principal está definido por flex-direction, que posee cuatro posibles valores:

- row

- row-reverse

- column

- column-reverse

Si elegimos `row` o `row-reverse`, el eje principal correrá a lo largo de la fila según la dirección de la línea .

<img src='flex-row.png' />

Al elegir `column` o `column-reverse` el eje principal correrá desde el borde superior de la página hasta el final — según la dirección del bloque.

<img src='flex-column.png' />

Imagen para dar contexto

<img src='row-column.svg' />

Los elementos flex se mueven como un grupo en el eje principal. Recuerde: tenemos un montón de cosas y estamos tratando de obtener el mejor diseño para ellas como grupo.

El eje transversal corre en la otra dirección al eje principal, por lo que si `flex-direction` es `row` el eje transversal corre a lo largo de la columna.

## `El eje cruzado - transversal`

El eje cruzado va perpendicular al eje principal, y por lo tanto si `flex-direction` (del eje principal) es `row` o `row-reverse` el eje cruzado irá por las columnas.

<img src='flex2-row.png' />

Si el eje principal es `column` o `column-reverse` entonces el eje cruzado corre a lo largo de las filas.

<img src='flex2-column.png' />

Entender cuál eje es cuál es importante cuando empezamos a mirar la alineación y justificación flexible de los ítems; flexbox posee propiedades que permiten alinear y justificar el contenido sobre un eje o el otro.

# `El contenedor flex`

Un área del documento que contiene un flexbox es llamada contendedor flex. Para crear un contenedor flex, establecemos la propiedad del área del contenedor display como flex o `inline-flex`. Tan pronto como hacemos esto, los hijos directos de este contenedor se vuelven ítems flex. Como con todas las propiedades de CSS, se definen algunos valores iniciales, así que cuando creemos un contenedor flex todos los ítems flex contenidos se comportarán de la siguiente manera.

- Los ítems se despliegan sobre una fila (la propiedad `flex-direction` por defecto es row).

- Los ítems empiezan desde el margen inicial sobre el eje principal.

- Los ítems no se ajustan en la dimensión principal, pero se pueden contraer.

- Los ítems se ajustarán para llenar el tamaño del eje cruzado.

- La propiedad `flex-basis` es definida como auto.

- La propiedad `flex-wrap` es definida como nowrap.

# `Controlar la dirección de los elementos`

- `row` : los elementos se distribuyen como una fila.

- `row-reverse`: los elementos se colocan como una fila desde el final del contenedor flex.

- `column` : los elementos se distribuyen como una columna.

- `column-reverse` : los elementos se distribuyen como una columna desde el final del contenedor flex.

# `Invertir el flujo de elementos y la accesibilidad`

Debe tener cuidado al usar cualquier propiedad que reordene la presentación visual de forma diferente a cómo se ordenan las cosas en el documento HTML, ya que puede afectar negativamente la accesibilidad. Los valores `row-reverse` y `column-reverse` son un buen ejemplo. El reordenamiento solo ocurre para el orden visual, no para el orden lógico. Es importante entender esto, ya que el orden lógico es en el que un lector de pantalla leerá el contenido y cualquiera que navegue usando el teclado lo seguirá.

Puede ver en el siguiente video cómo, en una distribución de columna invertida, la navegación por tab entre enlaces se vuelve desconectada ya que la navegación del teclado sigue al DOM, no a la representación visual.

Cualquier cosa que pueda cambiar el orden de los elementos en flexbox o cuadrícula puede causar este problema. Por lo tanto, cualquier reordenamiento debe incluir pruebas exhaustivas para comprobar que no hará que su sitio sea difícil de usar para algunas personas.

# `Elementos flex envolventes`

El valor inicial de la propiedad `flex-wrap` es `nowrap`. Esto significa que si no hay suficiente espacio en el contenedor, los elementos se desbordarán.

Los elementos que se muestran usando los valores iniciales se encogerán lo más pequeño posible, hasta el tamaño `min-content`, antes de que ocurra el desbordamiento.

Para hacer que los artículos sean envolventes, agregue `flex-wrap: wrap` al contenedor flex.

Cuando un contenedor flex envuelve, crea múltiples líneas flex. En términos de distribución del espacio, cada línea actúa como un nuevo contenedor flex. Por lo tanto, si está ajustando filas, no es posible hacer que algo en la fila 2 se alinee con algo arriba en la fila 1. Esto es lo que significa que flexbox es unidimensional. Puede controlar la alineación en un eje, una fila o una columna, no ambos juntos como podemos hacer en la cuadrícula.

`nowrap` es el valor inicial.

Esta tambien el `wrap-reverse`

# `La notación abreviada flex-flow`

Se pueden combinar las propiedades `flex-direction` y `flex-wrap` en la abreviatura `flex-flow` . El primer valor especificado es `flex-direction` y el segundo valor es `flex-wrap`.

```
.container {
  display: flex;
  flex-flow: column wrap;
}
```

# `Controlar el espacio dentro de los elementos flex`

Suponiendo que nuestro contenedor tiene más espacio del necesario para mostrar los elementos, los elementos se alinean al principio y no crecen para llenar el espacio. Dejan de crecer a su tamaño max-content. Esto se debe a que el valor inicial de las propiedades flex- es:

- `flex-grow`: 0 : los elementos no crecen.

- `flex-shrink`: 1 : los elementos pueden encogerse más pequeños que su `flex-basis`.

- `flex-basis`: auto : los elementos tienen un tamaño base de auto.

## `La propiedad flex-basis`

Con `flex-basis` se define el tamaño de un ítem en términos del espacio que deja como espacio disponible. El valor inicial de esta propiedad es `auto` — en este caso el navegador revisa si los ítems definen un tamaño.

Si los ítems no tiene un tamaño entonces el tamaño de su contenido es usado como `flex-basis`. Y por eso, apenas declarado `display: flex` en el padre a fin de crear ítems flex, todos estos ítems se ubicaron en una sola fila y tomaron solo el espacio necesario para desplegar su contenido.

## `La propiedad flex-grow`

Con la propiedad `flex-grow` definida como un entero positivo, los ítems flex pueden crecer en el eje principal a partir de `flex-basis`. Esto hará que el ítem se ajuste y tome todo el espacio disponible del eje, o una proporción del espacio disponible si otro ítem también puede crecer.

Si le damos a todos los ítems del ejemplo anterior un valor `flex-grow` de 1 entonces el espacio disponible en el contenedor flex será compartido igualitariamente entre estos ítems y se ajustarán para llenar el contenedor sobre el eje principal.

Podemos usar `flex-grow` apropiadamente para distribuir el espacio en proporciones. Si otorgamos al primer ítem un valor `flex-grow` de 2 y a los otros un valor de 1, entonces 2 partes serán dadas al primer ítem y 1 parte para cada uno de los restantes.

## `La propiedad flex-shrink`

Así como la propiedad `flex-grow` se encarga de añadir espacio sobre el eje principal, la propiedad `flex-shrink` controla como se contrae. Si no contamos con suficiente espacio en el contenedor para colocar los ítems y `flex-shrink` posee un valor entero positivo, el ítem puede contraerse a partir de `flex-basis`. Así como podemos asignar diferentes valores de `flex-grow` con el fin que un ítem se expanda más rápido que otros — un ítem con un valor más alto de `flex-shrink` se contraerá más rápido que sus hermanos que poseen valores menores.

El uso de `flex: auto` hará que los elementos terminen en tamaños diferentes, ya que el espacio que se comparte entre los elementos se comparte después de que cada elemento se presenta como tamaño max-content. Entonces, un elemento grande ganará más espacio. Para forzar que todos los elementos tengan un tamaño constante e ignorar el tamaño del contenido, cambie flex:auto a flex: 1 en la demostración.

Esto a su vez quiere decir que:

- `flex-grow`: 1 : los elementos pueden crecer más que su flex-basis.

- `flex-shrink`: 1 : los elementos pueden encogerse más pequeños que su flex-basis.

- `flex-basis`: 0 : los elementos tienen un tamaño base de 0.

El uso de flex: 1 dice que todos los elementos tienen un tamaño cero, por lo tanto, todo el espacio en el contenedor flex está disponible para distribuirse. Como todos los elementos tienen un factor `flex-grow` de 1, todos crecen por igual y el espacio se comparte por igual.

# `Valores abreviados para las propiedades flex`

Difícilmente veremos la propiedades `flex-grow`, `flex-shrink` y `flex-basis` usadas individualmente; si no que han sido combinadas en la abreviación flex . La abreviación flex permite establecer los tres valores en este orden: `flex-grow`, `flex-shrink`, `flex-basis`.

```
   .box {
        display: flex;
      }

      .one {
        flex: 1 1 auto;
      }

      .two {
        flex: 1 1 auto;
      }

      .three {
        flex: 1 1 auto;
      }
```

Hay además algunas abreviaturas de valores que cubren la mayoría de los casos de uso. Se ven con frecuencia utilizados en tutoriales, y en muchos casos es todo lo que necesitamos usar. Los valores predefinidos son los siguientes:

- flex: initial

- flex: auto

- flex: none

- flex: <positive-number>

# `Reordenar artículos flex`

Los elementos en su contenedor flex se pueden reordenar usando la propiedad `order`. Esta propiedad permite ordenar los elementos en grupos ordinales. Los elementos se distribuyen en la dirección dictada por la dirección de `flex-direction`, los valores más bajos primero. Si más de un elemento tiene el mismo valor, se mostrará con los otros elementos con ese valor.

La propiedad order de Flexbox nos permite establecer, como su nombre indica, el orden en el que se van a cargar nuestros elementos HTML en la página web. Este orden se establece mediante un valor numérico, sea negativo o positivo. Es decir, el posicionamiento del elemento dependerá de su valor y su relación con los valores de los demás elementos; el elemento se cargará más cerca al inicio del eje principal cuanto menor sea su valor.

El valor por defecto de esta propiedad, para todos los elementos, es de 1. Cuando hay varios elementos con el mismo valor, el navegador los ordena en el eje principal en función de cómo están escritos en nuestro código. El primero en el código será el primero que se pinta en la página web. Por ello, podríamos darle un valor solo al elemento que queramos mover, teniendo en cuenta que los demás están posicionados como 1.

```
<integer> (... -1, 0 (default), 1, ...)
```

<h2 style="color: red">Ojo</h2>

Usar order tiene los mismos problemas que los valores de `column-reverse row-reverse` y de `flex-direction`. Sería muy fácil crear una experiencia desconectada para algunos usuarios. No use order para está arreglar cosas que están fuera de orden en el documento. Si los elementos lógicamente deberían estar en un orden diferente, ¡cambie su HTML!

# `Alineación, justificación y distribución del espacio libre entre ítems`

Flexbox trajo consigo un conjunto de propiedades para alinear elementos y distribuir el espacio entre ellos. Estas propiedades fueron tan útiles que desde entonces se han movido a su propia especificación, también las encontrará en Grid Layout. Aquí puede averiguar cómo funcionan al usae flexbox.

El conjunto de propiedades se puede dividir en dos grupos. Propiedades de distribución del espacio y propiedades de alineación. Las propiedades que distribuyen el espacio son:

- `justify-content` : distribución del espacio en el eje principal.

- `align-content` : distribución del espacio en el eje transversal.

- `place-content` : una forma abreviada de configurar las dos propiedades anteriores.

Las propiedades utilizadas para la alineación en flexbox son:

- `align-self` : alinea un solo elemento en el eje transversal

- `align-items` : alinea todos los elementos como un grupo en el eje transversal

Si está trabajando en el eje principal, las propiedades comienzan con justify-. En el eje transversal comienzan con align-.

# `Distribuir espacio en el eje principal`

## `justify-content`

Para que la propiedad `justify-content` haga cualquier cosa, debe tener espacio libre en su contenedor en el eje principal. Si sus artículos llenan el eje, entonces no hay espacio para compartir, por lo que la propiedad no hará nada.

Si ha cambiado su `flex-direction` a column entonces `justify-content` funcionará en la columna. Para tener espacio libre en su contenedor cuando trabaje como una columna, debe darle a su contenedor una height o block-size. De lo contrario, no tendrá espacio libre que distribuir.

## `Distribuir espacio entre líneas flex`

Con un contenedor flex envuelto, es posible que tenga espacio para distribuir en el eje transversal. En este caso, puede utilizar la `align-content` con los mismos valores que `justify-content`. A diferencia de `justify-content` que alinea los elementos a `flex-start` por defecto, el valor inicial de `align-content` es `stretch`.

## `La notación abreviada de place-content`

Para configurar tanto `justify-content` como `align-content`, puede usar `place-content` con uno o dos valores. Se utilizará un único valor para ambos ejes, si especifica que el primero se utiliza para `align-content` y el segundo para `justify-content`.

```
.container {
  place-content: center flex-end;
  /* wrapped lines on the cross axis are centered,
  on the main axis items are aligned to the end of the flex container */
}
```

# `Alinear elementos en el eje transversal`

En el eje transversal también puede alinear sus elementos dentro de la línea flex usando `align-items` y `align-self`. El espacio disponible para esta alineación dependerá de la altura del contenedor flex o de la línea flex en el caso de un conjunto envuelto de elementos.

El valor inicial de `align-self` es stretch, por lo que los elementos flex en una fila se extienden hasta la altura del elemento más alto de forma predeterminada. Para cambiar esto, agregue la propiedad `align-self` a cualquiera de sus elementos flex.

La propiedad `align-self` se aplica a elementos individuales. La propiedad `align-items` se puede aplicar al contenedor flex para establecer todas las propiedades `align-self` individuales como un grupo.

# `¿Por qué no hay justify-self en flexbox?`

Los elementos flex actúan como un grupo en el eje principal. Por tanto, no existe el concepto de separar un elemento individual de ese grupo.

En el diseño de cuadrícula, las propiedades `justify-self` y `justify-items` funcionan en el eje en línea para alinear los elementos en ese eje dentro de su área de cuadrícula. Debido a la forma en que los diseños flex tratan los elementos como un grupo, estas propiedades no se implementan en un contexto flex.

# `Cómo centrar un elemento vertical y horizontalmente`

Las propiedades de alineación se pueden utilizar para centrar un elemento dentro de otro cuadro. La propiedad `justify-content` alinea el elemento en el eje principal, que es la fila. La propiedad `align-items` en el eje transversal.

# `FLEXBOX FROGGY`

## `justify-content: Distribución del espacio en el eje principal `

- `flex-start`: Alinea elementos al lado izquierdo del contenedor.

- `flex-end`: Alinea elementos al lado derecho del contenedor.

- `center`: Alinea elementos en el centro del contenedor.

- `space-between`: Muestra elementos con la misma distancia entre ellos.

- `space-around`: Muestra elementos con la misma separación alrededor de ellos.

## `align-items: Alinea todos los elementos como un grupo en el eje transversal`

- `flex-start`: Alinea elementos a la parte superior del contenedor.

- `flex-end`: Alinea elementos a la parte inferior del contenedor.

- `center`: Alinea elementos en el centro (verticalmente hablando) del contenedor.

- `baseline`: Muestra elementos en la línea base del contenedor

- `stretch`: Elementos se estiran para ajustarse al contenedor.

## `flex-direction`

- `row`: Elementos son colocados en la misma dirección del texto.

- `row-reverse`: Elementos son colocados en la dirección opuesta al texto.

- `column`: Elementos se colocan de arriba hacia abajo.

- `column-reverse`: Elementos se colocan de abajo hacia arriba.

## `order`

## `align-self`

## `flex-flow`

## ` align-content`

- `flex-start`: Las líneas se posicionan en la parte superior del contenedor.

- `flex-end`: Las líneas se posicionan en la parte inferior del contenedor.

- `center`: Las líneas se posicionan en el centro (verticalmente hablando) del contenedor.

- `space-between`: Las líneas se muestran con la misma distancia entre ellas.

- `space-around`: Las líneas se muestran con la misma separación alrededor de ellas.

- `stretch`: Las líneas se estiran para ajustarse al contenedor.

[TOP](#flexbox)