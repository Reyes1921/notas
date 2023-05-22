[Volver al Menú](../root.md)

# `Type Casting`
Type conversion (or typecasting) means the transfer of data from one data type to another. Implicit conversion happens when the compiler (for compiled languages) or runtime (for script languages like JavaScript) automatically converts data types

## `Type Conversion VS Coercion`
Type coercion is the automatic or implicit conversion of values from one data type to another (such as strings to numbers). Type conversion is similar to type coercion because they convert values from one data type to another with one key difference — type coercion is implicit. In contrast, type conversion can be either implicit or explicit.

## `Explicit Type Casting`
Type casting means transferring data from one data type to another by explicitly specifying the type to convert the given data to. Explicit type casting is normally done to make data compatible with other variables. Examples of typecasting methods are parseInt(), parseFloat(), toString().

-Conversion de tipos
```
String()
tostring ()
Number()
Boolean()
ParseInt ()
ParseFloat ()
```

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