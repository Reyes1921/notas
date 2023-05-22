[Volver al Menú](../root.md)

# `Expressions and Operators`

# `Assignment Operators`

An assignment operator assigns a value to its left operand based on the value of its right operand. The simple assignment operator is equal (=), which assigns the value of its right operand to its left operand. That is, x = f() is an assignment expression that assigns the value of f() to x.

Ejemplo:

- `x = f()`
- `x += f()`
- `	x -= f()`
- `x *= f()`
- `x /= f()`
- `x %= f()`
- `x **= f()`

# `Comparison Operators`

Conocemos muchos operadores de comparación de las matemáticas:

En Javascript se escriben así:

- Mayor/menor que: a > b, a < b.
- Mayor/menor o igual que: a >= b, a <= b.
- Igual: a == b (ten en cuenta que el doble signo == significa comparación, mientras que un solo símbolo a = b significaría una asignación).
- Distinto. En matemáticas la notación es ≠, pero en JavaScript se escribe como una asignación con un signo de exclamación delante: a != b.

NO ES RECOMENDABLE USAR != Y ==, ES MEJOR USAR !== Y ===

# `Arithmetic operators`

The Arithmetic operators perform addition, subtraction, multiplication, division, exponentiation, and remainder operations.

Arithmetic operators in JavaScript are as follows:

- `+` (Addition)
- `-` (Subtraction)
- `*` (Multiplication)
- `**` (Exponentiation)
- `/` (Division)
- `%` (Modulus i.e. Remainder)
- `++` (Increment)
- `--` (Decrement)

## `Precedencia del operador`

Si una expresión tiene más de un operador, el orden de ejecución se define por su precedencia o, en otras palabras, el orden de prioridad predeterminado de los operadores.

Desde la escuela, todos sabemos que la multiplicación en la expresión 1 + 2 \* 2 debe calcularse antes de la suma. Eso es exactamente la precedencia. Se dice que la multiplicación tiene una mayor precedencia que la suma.

Los paréntesis anulan cualquier precedencia, por lo que si no estamos satisfechos con el orden predeterminado, podemos usarlos para cambiarlo. Por ejemplo, escriba (1 + 2) \* 2.

| Precedencia | Nombre          | Signo |
| ----------- | --------------- | ----- |
| 14          | suma unaria     | +     |
| 14          | negación unaria | -     |
| 13          | exponenciación  | \*\*  |
| 12          | multiplicación  | \*    |
| 12          | división        | /     |
| 11          | suma            | +     |
| 11          | resta           | -     |
| …           | …               | …     |
| 2           | asignación      | =     |

# `Bitwise operators`

Bitwise operators fall into two categories, `Logical` operations and `shift` operations. Similar to the logical operators `AND`, `OR` and `NOT` there are bitwise operators `AND`, `OR`, Exclusive `OR` and `NOT`. However, the bitwise logical operators compare individual bits rather than values comprised of bytes. The second type of bitwise operation, the shift, is not the result of an operation, but rather a movement of the bits in a byte to either the left or the rigth

## `Convert Decimal to Binary`

To convert base 10 (decimal) to base 2 (binary) repeatedlydivide a decimal number by two and keep track of the remainders.

```
6/2 = 3 r0
3/2 = 1 r1
1/2 = 0 r1
```

Do you see the binary number? Start from the bottom (the last division) and read up to get 110.

Now you may be wondering how to convert from binary to decimal. You need to understand that each digists position corresponds to a power of two. Let's consider 110 as it appears stored in a byte:

| 7   | 6   | 5   | 4   | 3   | 2   | 1   | 0   |
| --- | --- | --- | --- | --- | --- | --- | --- |
| 0   | 0   | 0   | 0   | 1   | 1   | 0   | 0   |
| --- | --- | --- | --- | --- | --- | --- | --- |
| 128 | 64  | 32  | 16  | 8   | 4   | 2   | 1   |

As a result: 2 + 4 = 6

<h2 style="color: red">Nota</h2>

The right-most bit is called the least significant bit and the left-most bit, with a power of 7, is called the most significant bit.

Bitwise operators treat arguments as 32-bits (zeros & ones) and work on the level of their binary representation. Ex. Decimal number 9 has a binary representation of 1001. Bitwise operators perform their operations on such binary representations, but they return standard JavaScript numerical values.

Bitwise operators in JavaScript are as follows:

- `&` (AND):

The bitwise `&` operator requires two operands. The bits in the first operand are compared to corresponding bits in the second operand. When both bits are 1, the the resultant bit is 1. Otherwise the resultant is 0.

```
00001100 &
00000111
---------
00000100 = 4 (decimal)
```

- `|` (OR)

The bitwise `|` operator requires two operands. The bits in the first operand are compared to corresponding bits in the second operand. When any of the bits is 1, then the resultant bit is 1. Otherwise the resultant is 0.

```
00001100 |
00000111
---------
00001111 = 15 (decimal)
```

- `^` (XOR/ Exclusive OR)

The bitwise `^` operator requires two operands. The bits in the first operand are compared to corresponding bits in the second operand. If one bit is 0 and the other bit is 1, the corresponding result bit is set to 1. Otherwise the corresponding result bit is set to 0.

The Exclusive OR returns true only when two bits are different.

For example 12^7 results in 11:

```
00001100 ^
00000111
---------
00001011 = 11 (decimal)
```

- `~` (NOT)

The bitwise `~` operator, also called `NOT` operator, flips every bit of the operand.

For example, ~12 flips the bits representing 12 (1100). You migth think the result should be 3 (0011). But the actual result may surprised you:

| ~   | 0   | 0   | 0   | 0   | 1   | 1   | 0   | 0   |
| --- | --- | --- | --- | --- | --- | --- | --- | --- |

=

| 1   | 1   | 1   | 1   | 0   | 0   | 1   | 1   |
| --- | --- | --- | --- | --- | --- | --- | --- |

The result of ~12 = - 13

This result occurs because the `~` operator aplies to the entire byte.

-128 + 64 + 32 + 16 + 2 + 1 = -13

the first most significant bit indicates the sign of the number, +/- so that's how we change from positive to negative.

- `>>` (Right SHIFT)

The bitwise `>>` operator requires two operands. The bits in the first operand are shifted to the right by the number of positions specified in the second operand. When bits are shifted to the right, low order bits are shifted out and 0s are shifted into high order bits.

For example, 12 >> 2 shifts the bits representing 12 (1100) two places to the rigth to result in 11:

| 0   | 0   | 0   | 0   | 1   | 1   | 0   | 0   |
| --- | --- | --- | --- | --- | --- | --- | --- |

.>>2

| 0   | 0   | 0   | 0   | 0   | 0   | 1   | 1   |
| --- | --- | --- | --- | --- | --- | --- | --- |

the result 11 is 3 in decimal

<h2 style="color: red">Nota</h2>

A single rigth shift operation is equivalent to dividing the first operand by 2

- `<<` (Left SHIFT)

The bitwise `<<` operator requires two operands. The bits in the first operand are shifted to the left by the number of positions specified in the second operand. When bits are shifted to the left, low order bits are shifted out and 0s are shifted into high order bits.

For example, 12 << 2 shifts the bits representing 12 (1100) two places to the left to result in 110000:

| 0   | 0   | 0   | 0   | 1   | 1   | 0   | 0   |
| --- | --- | --- | --- | --- | --- | --- | --- |

<< 2

| 0   | 0   | 1   | 1   | 0   | 0   | 0   | 0   |
| --- | --- | --- | --- | --- | --- | --- | --- |

the result 110000 is 48 in decimal

<h2 style="color: red">Nota</h2>

A single rigth shift operation is equivalent to multipliying the first operand by 2

- `>>>` (Zero-Fill Right SHIFT)

This operator shifts the first operand the specified number of bits to the right. Excess bits shifted off to the right are discarded. Zero bits are shifted in from the left. The sign bit becomes 0, so the result is always non-negative. Unlike the other bitwise operators, zero-fill right shift returns an unsigned 32-bit integer.

[Mas informacion](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/Unsigned_right_shift)

# `Logical Operators`

Hay cuatro operadores lógicos en JavaScript: || (O), && (Y), ! (NO), ?? (Fusión de nulos)

Aunque sean llamados lógicos, pueden ser aplicados a valores de cualquier tipo, no solo booleanos. El resultado también puede ser de cualquier tipo.

## `||` (OR)

El operador `OR` se representa con dos símbolos de linea vertical:

```
result = a || b;
```

En la programación clásica, el OR lógico esta pensado para manipular solo valores booleanos. Si cualquiera de sus argumentos es true, retorna true, de lo contrario retorna false.

Con el operador logico || lee de izquierda a derecha y cuando encuentra al primer verdadero lo devuelve si todos son false devuelve el ultimo.

## `&&` (AND)

El operador AND es representado con dos ampersands `&&`:

```
result = a && b;
```

En la programación clásica, `AND` retorna true si ambos operandos son valores verdaderos y false en cualquier otro caso.

Lo mismo para `&&` pero alreves xD devuelve el primero que sea false si no devuelve el ultimo.

## `!` (NOT)

El operador booleano `NOT` se representa con un signo de exclamación `!`.

La sintaxis es bastante simple:

```
result = !value;
```

El operador acepta un solo argumento y realiza lo siguiente:

Convierte el operando al tipo booleano: true/false.
Retorna el valor contrario.

Por ejemplo:

```
alert(!true); // false
alert(!0); // true
```

-Con !! convertimos un valor a boleano, primero lo pasa a boleano y luego devuelve el inverso, Ejemplo: !!'hola' => !false => true

## `Operador Nullish Coalescing` `??`

El operador “nullish coalescing” (fusión de null) se escribe con un doble signo de cierre de interrogación `??`.

Como este trata a null y a undefined de forma similar, usaremos un término especial para este artículo. Diremos que una expresión es “definida” cuando no es null ni undefined.

El resultado de `a ?? b`:

- si a está “definida”, será a,
- si a no está “definida”, será b.
- Es decir, ?? devuelve el primer argumento cuando este no es null ni undefined. En caso contrario, devuelve el segundo.

El operador “nullish coalescing” no es algo completamente nuevo. Es solamente una sintaxis agradable para obtener el primer valor “definido” de entre dos.

Podemos reescribir `result = a ?? b` usando los operadores que ya conocemos:

```
result = (a !== null && a !== undefined) ? a : b;
```

- El operador ?? tiene una precedencia muy baja, un poco más alta que ? y =.
- Está prohibido su uso con || y && sin paréntesis explícitos.

-Nullish parecido al || pero ?? devuelve el primer valor que este definido por (a ?? b ?? c ??).

-No se pueden usar juntos ||, &&, ?? o usarlos pero con parentesis siempre son como harry,hermino y ron xD.

# `String Operators`

In addition to the comparison operators, which can be used on string values, the concatenation operator (`+`) concatenates two string values together, returning another string that is the union of the two operand strings.

The shorthand assignment operator `+=` can also be used to concatenate strings.

El operador + es el unico que funciona con strings y los concatena y el valor resultante siempre es string.

Al usar cualquier otro operador con strings el valor resultante es siempre entero.

Si es 2+2+'2' primero se tratan los enteros normal y luego se concatena el resultado seria "42" si es al reves '2'+2+2 se concatena primero y el resultado es "222".

# `Operador ternario` ‘?’ (Conditional operators)

La Sintaxis es:

```
let result = condition ? value1 : value2;
```

Se evalúa condition: si es verdadera entonces devuelve value1 , de lo contrario value2.

Por ejemplo:

```
let accessAllowed = (age > 18) ? true : false;
```

Técnicamente, podemos omitir el paréntesis alrededor de age > 18. El operador de signo de interrogación tiene una precedencia baja, por lo que se ejecuta después de la comparación >.
En este ejemplo realizaremos lo mismo que en el anterior:

```
// el operador de comparación  "age > 18" se ejecuta primero de cualquier forma
// (no necesitamos agregar los paréntesis)
let accessAllowed = age > 18 ? true : false;
```

Pero los paréntesis hacen el código mas legible, asi que recomendamos utilizarlos.

Por favor tome nota:
En el ejemplo de arriba, podrías evitar utilizar el operador de signo de interrogación porque esta comparación devuelve directamente `true/false`:

```
// es lo mismo que
let accessAllowed = age > 18;
```

## `Múltiples ‘?’`

Una secuencia de operadores de signos de interrogación ? puede devolver un valor que depende de más de una condición.

Por ejemplo:

```
let age = prompt('¿edad?', 18);

let message = (age < 3) ? '¡Hola, bebé!' :
  (age < 18) ? '¡Hola!' :
  (age < 100) ? '¡Felicidades!' :
  '¡Qué edad tan inusual!';

alert( message );
```

Puede ser difícil al principio comprender lo que está sucediendo. Pero después de una mirada más cercana, podemos ver que es solo una secuencia ordinaria de condiciones:

- El primer signo de pregunta revisa si age < 3.
- Si es cierto – devuelve '¡Hola, bebé!'. De lo contrario, continua a la expresión que está después de los dos puntos ‘":"’, revisando age < 18.
- Si es cierto – devuelve '¡Hola!'. De lo contrario, continúa con la expresión que está después de los dos puntos siguientes ‘":"’, revisando age < 100.
- Si es cierto – devuelve '¡Felicidades!'. De lo contrario, continúa a la expresión que está después de los dos puntos ‘":"’, devolviendo '¡Qué edad tan inusual!'.
- Aquí lo podemos ver utilizando if..else:

```
if (age < 3) {
  message = '¡Hola, bebé!';
} else if (age < 18) {
  message = '¡Hola!';
} else if (age < 100) {
  message = '¡Felicidades!';
} else {
  message = '¡Qué edad tan inusual!';
}
```

# `Comma operators`

The comma operator (,) evaluates each of its operands (from left to right) and returns the value of the last operand. This lets you create a compound expression in which multiple expressions are evaluated, with the compound expression's final value being the value of the rightmost of its member expressions. This is commonly used to provide multiple parameters to a for loop.

```
let x = 1;

x = (x++, x);

console.log(x);
// expected output: 2

x = (2, 3);

console.log(x);
// expected output: 3
```

## `Parameters`

expr1, expr2, expr3, …
One or more expressions, the last of which is returned as the value of the compound expression.

## `Usage notes`

You can use the comma operator when you want to include multiple expressions in a location that requires a single expression. The most common usage of this operator is to supply multiple parameters in a for loop.

The comma operator is fully different from the comma within arrays, objects, and function arguments and parameters.

## `Processing and then returning`

Another example that one could make with comma operator is processing before returning. As stated, only the last element will be returned but all others are going to be evaluated as well. So, one could do:

```
function myFunc() {
  let x = 0;

  return (x += 1, x); // the same as return ++x;
}
```

# `Unary Operators`

JavaScript Unary Operators are the special operators that consider a single operand and perform all the types of operations on that single operand. These operators include unary plus, unary minus, prefix increments, postfix increments, prefix decrements, and postfix decrements.

A unary operation is an operation with only one operand.

- `delete`: The delete operator deletes a property from an object.

- `void`: The void operator discards an expression's return value.

- `typeof`: The typeof operator determines the type of a given object.

- `+`: The unary plus operator converts its operand to Number type.

- `-`: The unary negation operator converts its operand to Number type and then negates it.

- `~`: Bitwise NOT operator.

- `!`: Logical NOT operator.

- `++`

- `--`

# `Relational operators`

A comparison operator compares its operands and returns a boolean value based on whether the comparison is true.

- `in`: The in operator determines whether an object has a given property.

- `instanceof`: The instanceof operator determines whether an object is an instance of another object.

- `<` (Less than): Less than operator.

- `>` (Greater than): Greater than operator.

- `<=`: Less than or equal operator.

- `>=`: Greater than or equal operator.

[TOP](#expressions-and-operators)
