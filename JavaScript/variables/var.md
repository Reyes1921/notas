[Volver al Menú](../root.md)

# `All About Variables`

Es la representación de un espacio en memoria.

# `Variable Declarations`

To use variables in JavaScript, we first need to create it i.e. declare a variable. To declare variables, we use one of the var, let, or const keywords.

No usar mas el var por favor usar let o const.

## `var`

The `var` statement declares a function-scoped or globally-scoped variable, optionally initializing it to a value. Puede ser redeclarada y reasignada.

## `let`

The `let` declaration declares a block-scoped local variable, optionally initializing it to a value. No puede ser redeclarada pero si reasignada.

Una sola declaración let puede definir múltiples vinculaciones. Las definiciones deben estar separadas por comas.

```
let uno = 1, dos = 2;
console.log(uno + dos); // → 3
```

## `const`

Constants are block-scoped, much like variables declared using the let keyword. The value of a constant can't be changed through reassignment, and it can't be redeclared. However, if a constant is an object or array its properties or items can be updated or removed.

Las constantes siempre deben ser inicializadas con algún valor

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

Letras y dígitos, pero el primer carácter no puede ser un dígito.
Los caracteres $ y `\_` son normales, al igual que las letras.
Los alfabetos y jeroglíficos no latinos también están permitidos, pero comúnmente no se usan.

Some common casing conventions are as follows:

- `camelCasing`: every word's first letter is uppercased except for that of the first word. Camel casing is the casing used in JavaScript. Here are some identifier names from JavaScript: indexOf, getElementById, querySelectorAll.

- `PascalCasing`: every word's first character is uppercased. C# uses Pascal casing for almost all identifiers. Some examples from C# are as follows: WriteLine, ReadLine, GetType.

- `snake_casing`: every word is lowercased and separated from the other using the _ (underscore) character. PHP uses snake casing for most of its predefined functions. Some examples from PHP are as follows: array_push, mysqli_connect, str_split.

- `SCREAMING_SNAKE_CASING`: every word is uppercased and separated from the other using the _ (underscore) character. This casing is commonly used to denote constants in many programming languages, including JavaScript. Some examples are: MAX_VALUE, MAX_SAFE_INTEGER.

# `Variable Scope`

Before ES6 (2015), JavaScript had only Global Scope and Function Scope. ES6 introduced two important new JavaScript keywords: let and const. These two keywords provide Block Scope in JavaScript.

- Block: Variables declared inside a { } block cannot be accessed from outside the block, if it is a `var` variable it does.

- Function: When a variable is declared inside a function, it is only accessible within that function and cannot be used outside that function.

- Global: Variables declared Globally (outside any function) have Global Scope. Global variables can be accessed from anywhere in a JavaScript program.
