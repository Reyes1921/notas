[Volver al Menú](../root.md)

# `Control Flow`

In JavaScript, the `Control flow` is a way of how your computer runs code from top to bottom. It starts from the first line and ends at the last line unless it hits any statement that changes the control flow of the program such as loops, conditionals, etc.

We can control the flow of the program through any of these control structures:

- Sequential (default mode)
- Conditional Statements
- Exception Handling
- Loops and Iterations

## `Conditional statements`

When you write code, you often want to perform different actions for different decisions. You can use conditional statements in your code to do this. In JavaScript, we have three conditional statements: `if`, `if...else`, and `switch`.

### `if else`

The `if` statement executes a statement if a specified condition is `truthy`. If the condition is `falsy`, another statement in the optional `else` clause will be executed.

La sentencia `if(...)` evalúa la condición en los paréntesis, y si el resultado es `true` ejecuta un bloque de código.

```
let year = prompt('¿En que año fué publicada la especificación ECMAScript-2015?', '');

if (year == 2015) alert( '¡Estás en lo cierto!' );
```

La cláusula `“else”`
La sentencia `if` quizás contenga un bloque `“else”` opcional. Este se ejecutará cuando la condición sea `falsa`.

 Ejemplo: 
 ```
 let year = prompt('¿En qué año fue publicada la especificación ECMAScript-2015?', '');

if (year == 2015) {
  alert( '¡Lo adivinaste, correcto!' );
} else {
  alert( '¿Cómo puedes estar tan equivocado?' ); // cualquier valor excepto 2015
}
```
### `Switch Case`

The `switch` statement evaluates an expression, matching the expression's value against a series of `case` clauses, and executes statements after the first `case` clause with a matching value, until a `break` statement is encountered. The `default` clause of a `switch` statement will be jumped to if no `case` matches the expression's value.

switch tiene uno o mas bloques casey un opcional default. Ejemplo:
```
switch (expression) {
  case value1:
    //Statements executed when the result of expression matches value1
    break; 
  case value2:
    //Statements executed when the result of expression matches value2
    break; 
  ...
  case valueN:
    //Statements executed when the result of expression matches valueN
    break; 
  default:
    //Statements executed when none of the values match the value of the expression
    break; 
} 
```

Si no existe break entonces la ejecución continúa con el próximo case sin ninguna revisión.

**Agrupamiento de “case”**

Varias variantes de case los cuales comparten el mismo código pueden ser agrupadas.

Por ejemplo, si queremos que se ejecute el mismo código para case 3 y case 5:
```
let a = 2 + 2;

switch (a) {
  case 4:
    alert('¡Correcto!');
    break;

  case 3:                    // (*) agrupando dos cases
  case 5:
    alert('¡Incorrecto!');
    alert("¿Por qué no tomas una clase de matemáticas?");
    break;

  default:
    alert('El resultado es extraño. Realmente.');
}
```

**El tipo importa**

Vamos a enfatizar que la comparación de igualdad es siempre estricta. Los valores deben ser del mismo tipo para coincidir.

## `Exception Handling`

[ERROR](error.md)

[TOP](#control-flow)