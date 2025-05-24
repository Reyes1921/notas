[Volver al Menú](../root.md)

# `Animaciones `

A veces, ves pequeños ayudantes en las interfaces que, cuando se hace clic en ellos, proporcionan información útil sobre esa sección en particular. A menudo, tienen una animación intermitente para informarte sutilmente que la información está allí y que debes interactuar con ella. En este módulo, se muestra cómo crear esos ayudantes y otras animaciones con CSS.

# `¿Qué es un fotograma clave?`

En la mayoría de las herramientas de animación, los fotogramas clave son el mecanismo que usas para asignar estados de animación a marcas de tiempo en un cronograma.

# `@keyframes`

Los `@keyframes` de CSS se basan en el mismo concepto que los fotogramas clave de animación.

```JSON
@keyframes my-animation {
  from {
    transform: translateY(20px);
  }
  to {
    transform: translateY(0px);
  }
}
```

La primera parte importante es el identificador personalizado (custom-ident), el nombre de la regla de fotogramas clave. El identificador en este ejemplo es my-animation. El identificador personalizado funciona como un nombre de función, lo que te permite hacer referencia a la regla de fotogramas clave en otra parte de tu código CSS.

Dentro de la regla de fotogramas clave, from y to son palabras clave que representan 0% y 100%, que son el inicio y el final de la animación. Puedes volver a crear la misma regla de la siguiente manera:

```JSON
@keyframes my-animation {
    0% {
        transform: translateY(20px);
    }
    100% {
        transform: translateY(0px);
    }
}
```

Puedes agregar tantas posiciones como desees durante el período

```json
@keyframes pulse {
  0% {
    opacity: 0;
  }
  50% {
    transform: scale(1.4);
    opacity: 0.4;
  }
}
```

# `Las propiedades animation`

Para usar tu `@keyframes` en una regla de CSS, puedes definir varias propiedades de animación de forma individual o usar la propiedad de abreviatura `animation`.

## `animation-duration`

```json
.my-element {
    animation-duration: 10s;
}
```

## `animation-timing-function`

Para ayudar a recrear el movimiento natural en la animación, puedes usar funciones de tiempo que calculan la velocidad de una animación en cada punto. Los valores calculados suelen ser curvos, lo que hace que la animación se ejecute a velocidades variables a lo largo de animation-duration y que el elemento parezca rebotar si el navegador calcula un valor más allá de los definidos en @keyframes.

Hay varias palabras clave disponibles como ajustes predeterminados en CSS, que se usan como valor para animation-timing-function: `linear`, `ease`, `ease-in`, `ease-out`, `ease-in-out`.

```json
.my-element {
    animation-timing-function: ease-in-out;
}
```

### `La función de suavización steps`

A veces, es posible que quieras controlar tu animación de forma más detallada moviéndola en intervalos en lugar de hacerlo a lo largo de una curva. La función de suavización steps() te permite dividir la línea de tiempo en intervalos definidos de duración igual.

```JSON
.my-element {
    animation-timing-function: steps(10, end);
}
```

## `animation-iteration-count`

La propiedad animation-iteration-count define cuántas veces se debe ejecutar el cronograma @keyframes durante la animación. De forma predeterminada, es 1, lo que significa que la animación se detiene cuando llega al final de la línea de tiempo. Este valor no puede ser un número negativo.

```JSON
.my-element {
    animation-iteration-count: 10;
}
```

## `animation-direction`

```JSON
.my-element {
    animation-direction: reverse;
}
```

Puedes establecer en qué dirección se ejecuta la línea de tiempo sobre tus fotogramas clave con animation-direction, que toma los siguientes valores:

- `normal`: El valor predeterminado, que es hacia adelante.
- `reverse`: Se ejecuta hacia atrás en tu línea de tiempo.
- `alternate`: Para cada iteración de animación, la línea de tiempo alterna entre la reproducción hacia adelante y hacia atrás.
- `alternate-reverse`: Es similar a alternate, pero la animación comienza con la línea de tiempo reproduciéndose hacia atrás.

## `animation-delay`

La propiedad animation-delay define cuánto tiempo espera el navegador antes de iniciar la animación. Al igual que la propiedad animation-duration, acepta un valor de tiempo.

A diferencia de animation-duration, puedes definir animation-delay como un valor negativo, lo que hace que la animación comience en el punto correspondiente de tu línea de tiempo. Por ejemplo, si tu animación dura 10 segundos y configuras animation-delay en -5s, la animación comienza a la mitad de tu línea de tiempo.

```JSON
.my-element {
    animation-delay: 5s;
}
```

## `animation-play-state`

La propiedad animation-play-state te permite reproducir y pausar la animación. El valor predeterminado es running. Si lo configuras como paused, la animación se pausa.

```JSON
.my-element:hover {
    animation-play-state: paused;
}
```

## `animation-fill-mode`

La propiedad animation-fill-mode define qué valores de tu línea de tiempo @keyframes persisten antes de que comience la animación o después de que finalice. El valor predeterminado es none, lo que significa que, cuando se completa la animación, se descartan los valores de tu línea de tiempo. Estas son otras opciones:

- `forwards`: El último fotograma clave persiste según la dirección de la animación.
- `backwards`: El primer fotograma clave persiste según la dirección de la animación.
- `both`: Tanto el primer fotograma clave como el último persisten.

## `La abreviatura animation`

En lugar de definir cada propiedad por separado, puedes definirlas en una representación simbólica `animation`, que te permite definir las propiedades de animación en el siguiente orden:

- `animation-name`
- `animation-duration`
- `animation-timing-function`
- `animation-delay`
- `animation-iteration-count`
- `animation-direction`
- `animation-fill-mode`
- `animation-play-state`

```JSON
.my-element {
    animation: my-animation 10s ease-in-out 1s infinite forwards forwards running;
}
```

[TOP](#animaciones)
