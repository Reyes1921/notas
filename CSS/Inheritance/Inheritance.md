[Volver al Menú](../root.md)

# `Inheritance`

Algunas propiedades CSS se heredan si no especifica un valor para ellas. Descubra cómo funciona esto y cómo utilizarlo en su beneficio en este módulo.

# `Flujo de la herencia`

Echemos un vistazo a cómo funciona la herencia, mediante este fragmento de HTML:

```
<html>
  <body>
    <article>
      <p>Lorem ipsum dolor sit amet.</p>
    </article>
  </body>
</html>
```

El elemento raíz `(<html>`) no heredará nada porque es el primer elemento del documento. Agregue algo de CSS en el elemento HTML y comenzará a heredarse en cascada por el documento.

```
html {
  color: lightslategray;
}
```

La propiedad color es heredada por otros elementos. El elemento html tiene un valor color: lightslategray, por lo tanto, todos los elementos que pueden heredar el color ahora tendrán un color lightslategray.

# `¿Qué propiedades son heredables?`

No todas las propiedades CSS son heredables, pero hay muchas que sí lo son. Como referencia, esta es la lista completa de propiedades heredables, tomada de la referencia W3 de todas las propiedades CSS:

- azimut
- border-collapse
- border-spacing
- caption-side
- color
- cursor
- direction
- empty-cells
- font-family
- font-size
- font-style
- font-variant
- font-weight
- font
- letter-spacing
- line-height
- list-style-image
- list-style-position
- list-style-type
- list-style
- orphans
- quotes
- text-align
- text-indent
- text-transform
- visibility
- white-space
- widows
- word-spacing

# `Cómo funciona la herencia #`

Cada elemento HTML tiene todas las propiedades CSS definidas por defecto con un valor inicial. Un valor inicial es una propiedad que no se hereda y aparece como predeterminada si la cascada no calcula un valor para ese elemento.

Las propiedades que se pueden heredar descienden en cascada y los elementos secundarios obtendrán un valor calculado que representa el valor de sus primarios. Esto significa que si un primario tiene el elemento font-weight establecido en bold, todos los elementos secundarios estarán en negrita, a menos que su elemento font-weight se establezca en un valor diferente, o la hoja de estilo del agente de usuario tenga un valor font-weight para ese elemento.

# `Cómo heredar y controlar explícitamente la herencia`

La herencia puede afectar los elementos de formas inesperadas, por lo que CSS tiene herramientas para ayudar con eso.

## `La palabra clave inherit`

Puede hacer que cualquier propiedad herede el valor calculado de su elemento primario con la palabra clave `inherit`. Una forma útil de usar esta palabra clave es crear excepciones.

```
.my-component strong {
  font-weight: inherit;
}
```

## `La palabra clave initial`

La herencia puede causar problemas con sus elementos y la palabra clave `initial` proporciona una poderosa opción de reinicio.

Aprendió anteriormente que cada propiedad tiene un valor predeterminado en CSS. La palabra clave `initial` establece una propiedad de nuevo a ese valor predeterminado inicial.

```
aside strong {
  font-weight: `initial`;
}
```

## `La palabra clave unset`

La propiedad `unset` se comporta de manera diferente si una propiedad es heredable o no. Si una propiedad es heredable, la palabra clave `unset` se comportará lo mismo que inherit. Si la propiedad no es heredable, la palabra clave `unset` se comporta igual que `initial`.

Recordar qué propiedades CSS son heredables puede ser difícil, pero `unset` puede ser útil en ese contexto.

También puede utilizar el valor `unset` con la propiedad `all`.

Si en vez de ello, cambia la regla aside p a all: `unset`, no importa qué estilos globales se apliquen a p en el futuro, siempre estarán desactivados.

```
aside p {
	margin: unset;
	color: unset;
	all: unset;
}
```
[TOP](#inheritance)