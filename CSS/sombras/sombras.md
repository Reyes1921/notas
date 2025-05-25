[Volver al Menú](../root.md)

# `Sombras`

Supongamos que te enviaron un diseño para compilar y, en ese diseño, hay una foto de una camiseta cortada con una sombra. El diseñador te dice que la imagen del producto es dinámica y se puede actualizar a través del sistema de administración de contenido, por lo que la sombra también debe ser dinámica. En lugar de una camiseta, la imagen puede ser un visor, pantalones cortos o cualquier otro elemento. ¿Cómo lo haces con CSS?

CSS tiene las propiedades `box-shadow` y `text-shadow`, pero la imagen no es texto, por lo que no puedes usar `text-shadow`. Si usas `box-shadow`, la sombra está en el cuadro circundante, no alrededor de la camiseta.

Por suerte, hay otra opción: el filtro `drop-shadow()`. Esto te permite hacer exactamente lo que pidió el diseñador. Hay muchas opciones en cuanto a las sombras en CSS, cada una diseñada para un caso de uso diferente.

# `Sombra difuminada`

La propiedad box-shadow se usa para agregar sombras al cuadro de un elemento HTML. Funciona en elementos de bloque y elementos intercalados.

```JSON
.my-element {
    box-shadow: 5px 5px 20px 5px #000;
}
```

## `Varias sombras`

Puedes agregar tantas sombras como quieras con box-shadow. Para lograrlo, agrega una colección de conjuntos de valores separados por comas:

```JSON
.my-element {
  box-shadow: 5px 5px 20px 5px darkslateblue, -5px -5px 20px 5px dodgerblue,
    inset 0px 0px 10px 2px darkslategray, inset 0px 0px 20px 10px steelblue;
}
```

# `Sombra del texto`

La propiedad text-shadow es muy similar a la propiedad box-shadow. Solo funciona en nodos de texto.

```JSON
.my-element {
  text-shadow: 3px 3px 3px hotpink;
}
```

Los valores de text-shadow son los mismos que los de box-shadow y están en el mismo orden. La única diferencia es que text-shadow no tiene un valor spread ni una palabra clave inset.

# `Sombra paralela`

Para lograr una sombra que siga las posibles curvas de una imagen, usa el filtro drop-shadow de CSS. Esta sombra se aplica a una máscara alfa, lo que la hace muy útil para agregar una sombra a una imagen recortada, como en el caso de la introducción de este módulo.

```JSON
.my-image {
  filter: drop-shadow(0px 0px 10px rgba(0 0 0 / 30%))
}
```

[TOP](#sombras)
