[Volver al Menú](root.md)

# `Resumen`

# `srcset`

One or more strings separated by commas, indicating possible image sources for the user agent to use. Each string is composed of:

- A URL to an image
- Optionally, whitespace followed by one of:
  - A width descriptor (a positive integer directly followed by w). The width descriptor is divided by the source size given in the sizes attribute to calculate the effective pixel density.
  - A pixel density descriptor (a positive floating point number directly followed by x).

# `Specificity `

Este módulo analiza en profundidad la especificidad, una parte clave de la cascada.

- !important overrides all other styles regardless of the specificity of the selector where it is used - 10000
- Inline Styles - 1000
- ID selectors - 100
- Classes, Attributes and Pseudo-classes - 10
- Elements and Pseudo-elements - 1

---

# `Box Sizing`

- `content-box` gives you the default CSS box-sizing behavior. If you set an element's width to 100 pixels, then the element's content box will be 100 pixels wide, and the width of any border or padding will be added to the final rendered width, making the element wider than 100px.

- `border-box `tells the browser to account for any border and padding in the values you specify for an element's width and height. If you set an element's width to 100 pixels, that 100 pixels will include any border or padding you added, and the content box will shrink to absorb that extra width. This typically makes it much easier to size elements. box-sizing: border-box is the default styling that browsers use for the `<table>`, `<select>`, and `<button>` elements, and for `<input>` elements whose type is radio, checkbox, reset, button, submit, color, or search.

---

# `%`

Toma las medidas de su padre.

---

# `Rem & Em`

## `Em`

Tiene como referencia de medida el font-size del elemento actual.

`Bueno para paddings de los botones, no tanto en los margenes o el fontsize.`

## `Rem`

Tiene como referencia de medida el font-size del elemento root, la etiqueta `<html>`.

`Bueno para margenes, paddings y fontsize da mas consistencia.`

---

# `Width & Height`

## `width`

Usar `ch` de ser posible con las fuentes.

## `min-Width`

Se selecciona la unidad de medida y aparte se agranda el espacio si es necesario, es decir no hay overflow.

## `max-Width`

Ancho maximo antes del overflow.

## `height`

Necesito el `height`? si es asi usar el `min-height` y usar `rem` o `vh`

## `min-heigth`

Se selecciona la unidad de medida y aparte se agranda el espacio si es necesario, es decir no hay overflow.

## `max-height`

Tamaño maximo antes del overflow.

---

# `px`

Solo para shadows, borders etc.

---

# `fonts`

---

# `Imagenes`

Tratar de colocar solo `width` con eso basta ya que el `height` pot defecto viene en `auto`

---

# `Media Queries`

Usar `em`

[TOP](#resumen)
