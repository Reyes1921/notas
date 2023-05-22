[Volver al Menú](../root.md)

# `Selector`

Para aplicar CSS a un elemento, debe seleccionarlo. CSS le proporciona varias formas diferentes de hacer esto.

# `Selectores simples`

El grupo más sencillo de selectores apunta a elementos HTML más las clases, los ID y otros atributos que se pueden agregar a una etiqueta HTML.

## `Selector universal`

Un selector universal, también conocido como comodín, coincide con cualquier elemento.

```
* {
  color: hotpink;
}
```

## `Selector de tipo`

Un selector de tipo coincide directamente con un elemento HTML.

```
section {
  padding: 2em;
}
```

## `Selector de clase`

Un elemento HTML puede tener uno o más elementos definidos en su atributo class. El selector de clase coincide con cualquier elemento que tenga esa clase aplicada.

```
<div class="my-class"></div>
<button class="my-class"></button>
<p class="my-class"></p>
```

## `Selector de ID`

Un elemento HTML con un atributo id debe ser el único elemento en una página con ese valor de identificación. Debe seleccionar elementos con un selector de ID como este:

```
#rad {
  border: 1px solid blue;
}
```

## `Selector de atributos`

Puede buscar elementos que tengan un determinado atributo HTML, o que tengan un determinado valor para un atributo HTML, si utiliza el selector de atributos. Puede indicarle a CSS que busque atributos si encierra el selector entre corchetes cuadrados ([ ]).

```
[data-type='primary'] {
  color: red;
}

[data-type] {
  color: red;
}

<div data-type="primary"></div>
```

Puede utilizar selectores de atributos que distingan entre mayúsculas y minúsculas si añade un operador `s` a su selector de atributos.

```
[data-type='primary' s] {
  color: red;
}
```

Esto significa que si un elemento HTML tuviera un data-type igual a Primary, en lugar de primary, no se mostraría en texto rojo. Puede hacer lo opuesto (insensibilidad a mayúsculas y minúsculas) mediante el uso de un operador `i`.

Junto con los operadores de casos, tiene acceso a los operadores que buscan porciones coincidentes de cadenas dentro de los valores de los atributos.

```
/* Un href que contiene "example.com" */
[href*='example.com'] {
  color: red;
}

/* Un href que comienza con https */
[href^='https'] {
  color: green;
}

/* Un href que termina con .com */
[href$='.com'] {
  color: blue;
}
```

## `Agrupar selectores`

Un selector no tiene que coincidir con un solo elemento. Puede agrupar varios selectores si los separa con comas:

```
strong,
em,
.my-class,
[lang] {
  color: red;
}
```

# `Pseudoclases y pseudoelementos`

CSS proporciona tipos de selectores útiles que se centran en el estado específico de la plataforma, como cuando se desplaza un elemento, estructuras dentro de un elemento o partes de un elemento.

## `Pseudoclases`

Los elementos HTML se encuentran en varios estados, ya sea porque interactúan con ellos o porque uno de sus elementos secundarios está en un estado determinado.

Por ejemplo, un usuario podría colocar el cursor sobre un elemento HTML con el puntero del ratón o el usuario también podría colocar el cursor sobre un elemento secundario. Para esas situaciones, use la pseudoclase :hover.

```
/* El cursor está sobre nuestro enlace */
a:hover {
  outline: 1px dotted green;
}

/* Hace que todos los párrafos pares tengan un fondo diferente */
p:nth-child(even) {
  background: floralwhite;
}
```

## `Pseudoelementos`

Los pseudoelementos se diferencian de las pseudoclases porque en lugar de responder al estado de la plataforma, actúan como si estuvieran insertando un nuevo elemento con CSS. Los pseudoelementos también son sintácticamente diferentes de las pseudoclases, ya que en vez de usar un solo signo de dos puntos `(:)`, utilizamos un signo de dos puntos dobles `(::)`.

```
li::marker {
  color: red;
}

::selection {
  background: black;
  color: white;
}
```

<h2 style="color: red">Nota: </h2>

Un signo de dos puntos dobles (`::`) es lo que distingue a un pseudoelemento de una pseudoclase, pero debido a que esta distinción no estaba presente en las versiones anteriores de las especificaciones de CSS, los navegadores admiten dos puntos simples para los pseudoelementos originales, como `:before` y `:after` para ayudar con la compatibilidad con versiones anteriores de los navegadores más antiguos, como IE8.
