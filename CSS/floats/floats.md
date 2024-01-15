[Volver al Menu](../root.md)

# `Float`

La propiedad CSS float ubica un elemento al lado izquierdo o derecho de su contenedor, permitiendo a los elementos de texto y en línea aparecer a su costado. El elemento es removido del normal flujo de la página, aunque aún sigue siendo parte del flujo (a diferencia del posicionamiento absoluto).

Como float implica el uso del layout de bloques, este modifica el valor calculado de los valores display , en algunos casos:

## `Sintaxis`

```
/* Valores clave || Keyword values */
float: left;
float: right;
float: none;
float: inline-start;
float: inline-end;

/* Valores globales || Global values */
float: inherit;
float: initial;
float: unset;
```

# `Limpiando (clearing) flotantes:`

A veces querrás forzar un item a moverse por debajo de elementos flotantes. Por ejemplo, párrafos que han de permanecer adyacentes a elementos flotantes, pero forzar a los encabezados a estar en su propia línea. Para ello revisa el siguiente ejemplo: clear

La propiedad CSS clear especifica si un elemento puede estar al lado de elementos flotantes que lo preceden o si debe ser movido (cleared) debajo de ellos. La propiedad clear aplica a ambos elementos flotantes y no flotantes.

## `Sintaxis`

```
clear: none;
clear: left;
clear: right;
clear: both;
clear: inline-start;
clear: inline-end;

clear: inherit;
```

[TOP](#float)