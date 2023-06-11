[Volver al Menú](../root.md)

# `All About Variables`

Es la representación de un espacio en memoria.

# `Variable Declarations`

To use variables in JavaScript, we first need to create it i.e. declare a variable. To declare variables, we use one of the var, let, or const keywords.

No usar mas el var por favor usar let o const.

```
let myName;
const myAge;
```

## `var`

Es la declaración de variable de vieja escuela. Normalmente no lo utilizamos en absoluto.

The `var` statement declares a function-scoped or globally-scoped variable, optionally initializing it to a value. Puede ser redeclarada y reasignada.

# `La vieja "var`

## `“var” no tiene alcance (visibilidad) de bloque.`

Las variables declaradas con var pueden: tener a la función como entorno de visibilidad, o bien ser globales. Su visibilidad atraviesa los bloques.

Por ejemplo:

```
if (true) {
  var test = true; // uso de "var" en lugar de "let"
}

alert(test); // true, la variable vive después del if
```

## `“var” tolera redeclaraciones`

Declarar la misma variable con let dos veces en el mismo entorno es un error:

```
let user;
let user; // SyntaxError: 'user' ya fue declarado
```

Con var podemos redeclarar una variable muchas veces. Si usamos var con una variable ya declarada, simplemente se ignora:

```
var user = "Pete";

var user = "John"; // este "var" no hace nada (ya estaba declarado)
// ...no dispara ningún error

alert(user); // John
```

## `Las variables “var” pueden ser declaradas debajo del lugar en donde se usan`

## `let`

Es la forma moderna de declaración de una variable.

The `let` declaration declares a block-scoped local variable, optionally initializing it to a value. No puede ser redeclarada pero si reasignada.

Una sola declaración let puede definir múltiples vinculaciones. Las definiciones deben estar separadas por comas.

```
let uno = 1, dos = 2;
console.log(uno + dos); // → 3
```

## `const`

Es como let, pero el valor de la variable no puede ser alterado.

Constants are block-scoped, much like variables declared using the let keyword. The value of a constant can't be changed through reassignment, and it can't be redeclared. However, if a constant is an object or array its properties or items can be updated or removed.

Las constantes siempre deben ser inicializadas con algún valor

# `Initializing a variable`

Once you've declared a variable, you can initialize it with a value. You do this by typing the variable name, followed by an equals sign (=), followed by the value you want to give it.

# `Hoisting (Elevacion)`

JavaScript Hoisting refers to the process whereby the interpreter appears to move the declaration of functions, variables, or classes to the top of their scope, prior to execution of the code.

Esto solo funciona con las palabras claves `var` y `function`. Es decir hoisting solo funciona con declaracion de funciones y no con las expresiones de funcion.

Una Declaración de Función puede ser llamada antes de ser definida.Esto se debe a los algoritmos internos.
Cuando JavaScript se prepara para ejecutar el script, primero busca Declaraciones de Funciones globales en él y crea las funciones.
Podemos pensar en esto como una “etapa de inicialización” o tambien "Hoisting".

```
sayHi("John"); // Hola, John

function sayHi(name) {
  alert( `Hola, ${name}` );
}//funciona sin problema
```

Resumen:

- `var` declaracion
- `function` completo
- `import` completo
- `class` no

# `Variable Naming Rules`

Existen dos limitaciones de nombre de variables en JavaScript:

- El nombre únicamente puede incluir letras, dígitos, o los símbolos $ y _.
- El primer carácter no puede ser un dígito.
- Los alfabetos y jeroglíficos no latinos también están permitidos, pero comúnmente no se usan.

Some common casing conventions are as follows:

- `camelCasing`: every word's first letter is uppercased except for that of the first word. Camel casing is the casing used in JavaScript. Here are some identifier names from JavaScript: indexOf, getElementById, querySelectorAll.

- `PascalCasing`: every word's first character is uppercased. C# uses Pascal casing for almost all identifiers. Some examples from C# are as follows: WriteLine, ReadLine, GetType.

- `snake_casing`: every word is lowercased and separated from the other using the _ (underscore) character. PHP uses snake casing for most of its predefined functions. Some examples from PHP are as follows: array_push, mysqli_connect, str_split.

- `SCREAMING_SNAKE_CASING`: every word is uppercased and separated from the other using the _ (underscore) character. This casing is commonly used to denote constants in many programming languages, including JavaScript. Some examples are: MAX_VALUE, MAX_SAFE_INTEGER.

<h2 style="color:red">Nombres reservados</h2>

Hay una lista de palabras reservadas, las cuales no pueden ser utilizadas como nombre de variable porque el lenguaje en sí las utiliza.

Por ejemplo: let, class, return, y function están reservadas.

El siguiente código nos da un error de sintaxis:
```
let let = 5; // no se puede le nombrar "let" a una variable  ¡Error!
let return = 5; // tampoco se le puede nombrar "return", ¡Error!
```

<h2 style="color:red">Una asignación sin utilizar use strict</h2>

Normalmente, debemos definir una variable antes de utilizarla. Pero, en los viejos tiempos, era técnicamente posible crear una variable simplemente asignando un valor sin utilizar ‘let’. Esto aún funciona si no ponemos ‘use strict’ en nuestros scripts para mantener la compatibilidad con scripts antiguos.

## `Constantes mayúsculas`

Existe una práctica utilizada ampliamente de utilizar constantes como aliases de valores difíciles-de-recordar y que se conocen previo a la ejecución.

Tales constantes se nombran utilizando letras mayúsculas y guiones bajos.

Por ejemplo, creemos constantes para los colores en el formato “web” (hexadecimal):
```
const COLOR_RED = "#F00";
const COLOR_GREEN = "#0F0";
const COLOR_BLUE = "#00F";
const COLOR_ORANGE = "#FF7F00";
```

# `Variable Scope`

In JavaScript, scope refers to the visibility of a variable or how it can be used after it is declared. The scope of a variable depends on the keyword that was used to declare it.

The three types of Scope are `Global Scope`, `Function Scope`, and `Block Scope`. Before ES6 (2015), JavaScript had only `Global Scope` and `Function Scope` with the var keyword. ES6 introduced let and const which allow `Block Scope` in JavaScript.

`Global Scope`: Variables declared outside any function or curly braces ’{}’ have `Global Scope`, and can be accessed from anywhere within the same Javascript code. var, let and const all provide this Scope.

`Function Scope`: Variables declared within a function can only be used within that same function. Outside that function, they are undefined. var, let and const all provide this Scope.

`Block Scope`: A block is any part of JavaScript code bounded by ’{}‘. Variables declared within a block can not be accessed outside that block. This Scope is only provided by the let and const keywords. If you declare a variable within a block using the var keyword, it will NOT have `Block Scope`.

[TOP](#all-about-variables)