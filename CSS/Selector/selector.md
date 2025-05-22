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

<ul>
  <li><a href="/es/docs/Web/CSS/:active"><code>:active</code></a></li>
  <li><a href="/es/docs/Web/CSS/:checked"><code>:checked</code></a></li>
  <li><a href="/es/docs/Web/CSS/:default"><code>:default</code></a></li>
  <li><a href="/es/docs/Web/CSS/:dir"><code>:dir()</code></a></li>
  <li><a href="/es/docs/Web/CSS/:disabled"><code>:disabled</code></a></li>
  <li><a href="/es/docs/Web/CSS/:empty"><code>:empty</code></a></li>
  <li><a href="/es/docs/Web/CSS/:enabled"><code>:enabled</code></a></li>
  <li><a href="/es/docs/Web/CSS/:first"><code>:first</code></a></li>
  <li><a href="/es/docs/Web/CSS/:first-child"><code>:first-child</code></a></li>
  <li><a href="/es/docs/Web/CSS/:first-of-type"><code>:first-of-type</code></a></li>
  <li><a href="/es/docs/Web/CSS/:fullscreen"><code>:fullscreen</code></a></li>
  <li><a href="/es/docs/Web/CSS/:focus"><code>:focus</code></a></li>
  <li><a href="/es/docs/Web/CSS/:hover"><code>:hover</code></a></li>
  <li><a href="/es/docs/Web/CSS/:indeterminate"><code>:indeterminate</code></a></li>
  <li><a href="/es/docs/Web/CSS/:in-range"><code>:in-range</code></a></li>
  <li><a href="/es/docs/Web/CSS/:invalid"><code>:invalid</code></a></li>
  <li><a href="/es/docs/Web/CSS/:lang"><code>:lang()</code></a></li>
  <li><a href="/es/docs/Web/CSS/:last-child"><code>:last-child</code></a></li>
  <li><a href="/es/docs/Web/CSS/:last-of-type"><code>:last-of-type</code></a></li>
  <li><a href="/es/docs/Web/CSS/:left"><code>:left</code></a></li>
  <li><a href="/es/docs/Web/CSS/:link"><code>:link</code></a></li>
  <li><a href="/es/docs/Web/CSS/:not"><code>:not()</code></a></li>
  <li><a href="/es/docs/Web/CSS/:nth-child"><code>:nth-child()</code></a></li>
  <li><a href="/es/docs/Web/CSS/:nth-last-child"><code>:nth-last-child()</code></a></li>
  <li><a href="/es/docs/Web/CSS/:nth-last-of-type"><code>:nth-last-of-type()</code></a></li>
  <li><a href="/es/docs/Web/CSS/:nth-of-type"><code>:nth-of-type()</code></a></li>
  <li><a href="/es/docs/Web/CSS/:only-child"><code>:only-child</code></a></li>
  <li><a href="/es/docs/Web/CSS/:only-of-type"><code>:only-of-type</code></a></li>
  <li><a href="/es/docs/Web/CSS/:optional"><code>:optional</code></a></li>
  <li><a href="/es/docs/Web/CSS/:out-of-range"><code>:out-of-range</code></a></li>
  <li><a href="/es/docs/Web/CSS/:read-only"><code>:read-only</code></a></li>
  <li><a href="/es/docs/Web/CSS/:read-write"><code>:read-write</code></a></li>
  <li><a href="/es/docs/Web/CSS/:required"><code>:required</code></a></li>
  <li><a href="/es/docs/Web/CSS/:right"><code>:right</code></a></li>
  <li><a href="/es/docs/Web/CSS/:root"><code>:root</code></a></li>
  <li><a class="only-in-en-us" title="Esta página está disponible solo en inglés" href="/en-US/docs/Web/CSS/:scope"><code>:scope</code></a></li>
  <li><a href="/es/docs/Web/CSS/:target"><code>:target</code></a></li>
  <li><a href="/es/docs/Web/CSS/:valid"><code>:valid</code></a></li>
  <li><a href="/es/docs/Web/CSS/:visited"><code>:visited</code></a></li>
</ul>

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

<ul>
  <li><a href="/es/docs/Web/CSS/::after"><code>::after</code></a></li>
  <li><a href="/es/docs/Web/CSS/::before"><code>::before</code></a></li>
  <li><a href="/es/docs/Web/CSS/::first-letter"><code>::first-letter</code></a></li>
  <li><a href="/es/docs/Web/CSS/::first-line"><code>::first-line</code></a></li>
  <li><a href="/es/docs/Web/CSS/::selection"><code>::selection</code></a></li>
  <li><a href="/es/docs/Web/CSS/::backdrop"><code>::backdrop</code></a></li>
  <li><a href="/es/docs/Web/CSS/::placeholder"><code>::placeholder</code></a> <abbr class="icon icon-experimental" title="Experimental. Espere que el comportamiento cambie en el futuro.">
    <span class="visually-hidden">Experimental</span>
</abbr></li>
  <li><a href="/es/docs/Web/CSS/::marker"><code>::marker</code></a> <abbr class="icon icon-experimental" title="Experimental. Espere que el comportamiento cambie en el futuro.">
    <span class="visually-hidden">Experimental</span>
</abbr></li>
  <li><a href="/es/docs/Web/CSS/::spelling-error"><code>::spelling-error</code></a> <abbr class="icon icon-experimental" title="Experimental. Espere que el comportamiento cambie en el futuro.">
    <span class="visually-hidden">Experimental</span>
</abbr></li>
  <li><a class="only-in-en-us" title="Esta página está disponible solo en inglés" href="/en-US/docs/Web/CSS/::grammar-error"><code>::grammar-error</code></a> <abbr class="icon icon-experimental" title="Experimental. Espere que el comportamiento cambie en el futuro.">
    <span class="visually-hidden">Experimental</span>
</abbr></li>
</ul>

<h2 style="color: red">Nota: </h2>

Un signo de dos puntos dobles (`::`) es lo que distingue a un pseudoelemento de una pseudoclase, pero debido a que esta distinción no estaba presente en las versiones anteriores de las especificaciones de CSS, los navegadores admiten dos puntos simples para los pseudoelementos originales, como `:before` y `:after` para ayudar con la compatibilidad con versiones anteriores de los navegadores más antiguos, como IE8.

# `Extras`

## `:nth-child`

```bash
div p:nth-child(0) //get childs
ul li:nth-child(2n+3)
```

## `:last-child - :first-child`

The `:first-child` pseudo class means "if this element is the first child of its parent".
`:last-child` means "if this element is the last child of its parent".

```bash
div#test p:first-child {text-decoration: underline;}
div#test p:last-child {color: red;}
```

## `:not()`

```bash
div p:not(.foo) //omit class
form >:not([disabled]) /omit attribute
```

## `>`

```bash
div > \* //get only direct children
```

## `~`

Selecciona todo lo que esta debajo a ese mismo nivel.

```bash
p ~ span
h1 ~ h2 // Hermano
```

## `+`

Adyacente.

```bash
h1 + h2 //adyacente
```

[https://css-speedrun.netlify.app/](https://css-speedrun.netlify.app/)

[TOP](#selector)
