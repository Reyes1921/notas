[Volver al Menú](../root.md)

# `Type Casting`
Type conversion (or typecasting) means the transfer of data from one data type to another. Implicit conversion happens when the compiler (for compiled languages) or runtime (for script languages like JavaScript) automatically converts data types

## `Type Conversion VS Coercion`
Type coercion is the automatic or implicit conversion of values from one data type to another (such as strings to numbers). Type conversion is similar to type coercion because they convert values from one data type to another with one key difference — type coercion is implicit. In contrast, type conversion can be either implicit or explicit.

## `Explicit Type Casting`
Type casting means transferring data from one data type to another by explicitly specifying the type to convert the given data to. Explicit type casting is normally done to make data compatible with other variables. Examples of typecasting methods are `parseInt()`, `parseFloat()`, `toString()`.

### `Conversion de tipos`

La mayoría de las veces, los operadores y funciones convierten automáticamente los valores que se les pasan al tipo correcto. Esto es llamado “conversión de tipo”.

```
String()
toString()
Number()
Boolean()
ParseInt ()
ParseFloat ()
```
`ToString` 

La conversión a string ocurre cuando necesitamos la representación en forma de texto de un valor.
```
let value = true;
alert(typeof value); // boolean

value = String(value); // ahora value es el string "true"
alert(typeof value); // string
```

`ToNumber`

La conversión numérica ocurre automáticamente en funciones matemáticas y expresiones. La conversión explícita es requerida usualmente cuando leemos un valor desde una fuente basada en texto, como lo son los campos de texto en los formularios, pero que esperamos que contengan un valor numérico.

Si el string no es un número válido, el resultado de la conversión será `NaN`

<table>
<thead>
<tr>
<th>Valor</th>
<th>Se convierte en…</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>undefined</code></td>
<td><code>NaN</code></td>
</tr>
<tr>
<td><code>null</code></td>
<td><code>0</code></td>
</tr>
<tr>
<td><code>true&nbsp;and&nbsp;false</code></td>
<td><code>1</code> y <code>0</code></td>
</tr>
<tr>
<td><code>string</code></td>
<td>Se eliminan los espacios (incluye espacios, tabs <code>\t</code>, saltos de línea <code>\n</code>, etc.) al inicio y final del texto. Si el string resultante es vacío, el resultado es <code>0</code>, en caso contrario el número es “leído” del string. Un error devuelve <code>NaN</code>.</td>
</tr>
</tbody>
</table>

`ToBoolean`

La conversión a boolean es la más simple.

Ocurre en operaciones lógicas (más adelante veremos test condicionales y otras cosas similares), pero también puede realizarse de forma explícita llamando a la función Boolean(value).

Las reglas de conversión:

- Los valores que son intuitivamente “vacíos”, como `0`, `""`, `null`, `undefined`, y `NaN`, se convierten en false.
- Otros valores se convierten en true.

## `Duck Tiping`

Si camina como un pato, nada como un pato y suena como un pato, entonces probablemente sea un pato.

Es de las criticas mas fuertes que se le puede hacer a JavaScript. Es una de las razones por las que muchos desarrolladores prefieren otros lenguajes de programación. Pero, ¿qué es el tipado de pato? ¿Por qué es tan malo? ¿Y por qué es tan popular?

## `Implicit Type Casting`
Implicit type conversion happens when the compiler or runtime automatically converts data types. JavaScript is loosely typed language and most of the time operators automatically convert a value to the right type.

## `Curiosidades`

```
[]+[] // ""
[]+{} // "[object Object]"
{}+[] // 0
{}+{} // NaN
```

- Convertir un valor a string concatenando con un string vacio
```
2022 + '' // "2022"
```

- Si no es null o undefined podemos usar tostring
```
(2022).toString() // "2022"
```
- Podemos obtener un number colocando un + delante del valor que queramos convertir
```
+'2022' // 2022
+true // 1
```
- Con boolean podemos usar !! para convertir a boolean
```
var texto = 'Hola';
!!texto // true
```

Como debemos convertir tipos de datos en JavaScript? 

Con las funciones o con los operadores? la verdad es lo mismo

[TOP](#type-casting)