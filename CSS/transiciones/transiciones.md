[Volver al Menú](../root.md)

# `Transiciones `

Cuando interactúas con un sitio web, es posible que notes que muchos elementos tienen estado. Por ejemplo, los menús desplegables pueden estar abiertos o cerrados. Los botones pueden cambiar de color cuando se enfocan o se coloca el cursor sobre ellos. Las ventanas modales aparecen y desaparecen.

De forma predeterminada, el CSS cambia el estilo de estos estados de inmediato.

Con las transiciones de CSS, podemos interpolar entre el estado inicial y el estado objetivo del elemento. La transición entre los dos mejora la experiencia del usuario, ya que proporciona dirección visual, asistencia y sugerencias sobre la causa y el efecto de la interacción.

# `Propiedades de transición`

Para usar transiciones en CSS, puedes usar las diversas propiedades de transición o la propiedad abreviada `transition`.

## `transition-property`

La propiedad transition-property especifica qué diseños se deben migrar.

```JSON
.my-element {
  transition-property: background-color;
}
```

transition-property acepta uno o más nombres de propiedades CSS en una lista separada por comas.

De manera opcional, puedes usar `transition-property: all` para indicar que todas las propiedades deben realizar la transición.

```JSON
.square.tp-transform {
  transition-property: transform;
}

.square.tp-color {
  transition-property: background-color;
}
```

## `transition-duration`

La propiedad `transition-duration` se usa para definir el tiempo que tardará en completarse una transición.

`transition-duration` acepta unidades de tiempo, ya sea en segundos (s) o milisegundos (ms), y el valor predeterminado es 0s.

## `transition-timing-function`

Usa la propiedad transition-timing-function para variar la velocidad de una transición de CSS a lo largo del transition-duration.

De forma predeterminada, CSS hará la transición de tus elementos a una velocidad constante (transition-timing-function: linear). Sin embargo, las transiciones lineales pueden terminar pareciendo algo artificiales: en la vida real, los objetos tienen peso y no pueden detenerse ni comenzar de inmediato. Suavizar la entrada o salida de una transición puede hacer que tus transiciones sean más animadas y naturales.

## `transition-delay`

Usa la propiedad `transition-delay` para especificar el momento en que comenzará una transición. Si no se especifica `transition-delay`, las transiciones comenzarán de inmediato porque el valor predeterminado es 0s. Esta propiedad acepta una unidad de tiempo, por ejemplo, segundos (s) o milisegundos (ms).

## `abreviatura: transición`

Como la mayoría de las propiedades CSS, hay una versión abreviada. `transition` combina `transition-property`, `transition-duration`, `transition-timing-function` y `transition-delay`.

```JSON
.longhand {
  transition-property: transform;
  transition-duration: 300ms;
  transition-timing-function: ease-in-out;
  transition-delay: 0s;
}

.shorthand {
  transition: transform 300ms ease-in-out 0s;
}
```

# `¿Qué se puede transferir y qué no?`

Cuando escribes CSS, puedes especificar qué propiedades deben tener transiciones animadas. Consulta esta lista de MDN de propiedades CSS animables.

En general, solo es posible realizar transiciones de elementos que pueden tener un "estado intermedio" entre sus estados inicial y final. Por ejemplo, es imposible agregar transiciones para font-family, ya que no está claro cómo debería verse el "estado intermedio" entre serif y monospace. Por otro lado, es posible agregar transiciones para font-size porque su unidad es una longitud que se puede interpolar.

Estas son algunas propiedades comunes que puedes usar para la transición.

## `Transformar`

La propiedad CSS transform suele tener una transición porque es una propiedad acelerada por la GPU que genera una animación más fluida y que también consume menos batería. Esta propiedad te permite escalar, rotar, traducir o sesgar un elemento de forma arbitraria.

## `Color`

Antes, durante y después de la interacción, el color puede ser un excelente indicador del estado. Por ejemplo, un botón puede cambiar de color si se coloca el cursor sobre él. Este cambio de color puede proporcionarle al usuario comentarios sobre si se puede hacer clic en el botón.

## `Sombras`

A menudo, se usa la transición de sombras para indicar un cambio de elevación, como desde el enfoque del usuario.

## `Filtros`

filter es una potente propiedad CSS que te permite agregar efectos gráficos sobre la marcha. La transición entre diferentes estados de filter puede crear resultados bastante impresionantes.

# `Activadores de transición`

Tu CSS debe incluir un cambio de estado y un evento que active ese cambio de estado para que se activen las transiciones de CSS. Un ejemplo típico de tal activador es la pseudoclase :hover. Esta pseudoclase coincide cuando el usuario coloca el cursor sobre un elemento.

A continuación, se muestra una lista de algunas pseudoclases y eventos que pueden activar cambios de estado en tus elementos.

- `:hover`: Coincide si el cursor está sobre el elemento.
- `:focus`: Coincide si el elemento está enfocado.
- `:focus-within` : Coincide si el elemento o cualquiera de sus elementos secundarios está enfocado.
- `:target`: Coincide cuando el fragmento de la URL actual coincide con el ID del elemento.
- `:active`: Coincide cuando se activa el elemento (por lo general, cuando se presiona el mouse sobre él).
- Cambio de class desde JavaScript: Cuando el class de CSS de un elemento cambia a través de JavaScript, el CSS realizará la transición de las propiedades aptas que hayan cambiado.

# `Diferentes transiciones para entrar o salir`

Si configuras diferentes propiedades transition en el desplazamiento del mouse o el enfoque, es posible crear algunos efectos interesantes.

```JSON
.my-element {
  background: red;

  /* This transition is applied on the "exit" transition */
  transition: background 2000ms ease-in;
}

.my-element:hover {
  background: blue;

  /* This transition is applied on the "enter" transition */
  transition: background 150ms ease;
}
```

# `Consideraciones de accesibilidad`

Las transiciones de CSS no son para todos. En algunas personas, las transiciones y las animaciones pueden causar mareos o molestias. Por suerte, CSS tiene una función de medios llamada prefers-reduced-motion que detecta si un usuario indicó una preferencia por menos movimiento en su dispositivo.

# `Consideraciones de rendimiento`

Cuando trabajas con transiciones de CSS, es posible que tengas problemas de rendimiento si agregas transiciones para ciertas propiedades de CSS. Por ejemplo, cuando cambian propiedades como width o height, se envía contenido al resto de la página. Esto obliga al CSS a calcular posiciones nuevas para cada elemento afectado en cada fotograma de la transición. Cuando sea posible, te recomendamos que uses propiedades como transform y opacity.

[TOP](#transiciones)
