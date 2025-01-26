[Volver al Menú](./root.md)

# `Data Types`

`PHP` is a flexible and widely-used language that supports several types of data. These types include `integers`, `floating-point numbers`, `strings`, `arrays`, `objects`, `NULL`, `booleans`, `void`, `never` and `many more`. The different data types allow developers to efficiently manage and handle data in their applications. For example, an integer data type in `PHP` can be a non-decimal number between -2,147,483,648 and 2,147,483,647. Here’s a small sample `PHP` code snippet that assigns different data types to variables:

```json
$text = "Hello world!";  // String
$number = 1234;  // Integer
$decimalNumber = 12.34;  // Floating-point number
$boolean = true; // Boolean
```

## `NULL`

The null type is PHP's unit type, i.e. it has only one value: null.

## `Booleans`

The bool type only has two values, and is used to express a truth value. It can be either true or false.

## `Integers`

An int is a number of the set ℤ = {..., -2, -1, 0, 1, 2, ...}.

## `Floating point numbers`

Floating point numbers (also known as "floats", "doubles", or "real numbers") can be specified using any of the following syntaxes:

```json
<?php
$a = 1.234;
$b = 1.2e3;
$c = 7E-10;
$d = 1_234.567; // as of PHP 7.4.0
?>
```

## `Strings`

A string is a series of characters, where a character is the same as a byte. This means that PHP only supports a 256-character set, and hence does not offer native Unicode support.

## `Numeric strings`

A PHP string is considered numeric if it can be interpreted as an int or a float.

Formally as of PHP 8.0.0:

```
WHITESPACES \s*
LNUM [0-9]+
DNUM ([0-9]*[\.]{LNUM}) | ({LNUM}[\.][0-9]\*)
EXPONENT_DNUM (({LNUM} | {DNUM}) [eE][+-]? {LNUM})
INT_NUM_STRING {WHITESPACES} [+-]? {LNUM} {WHITESPACES}
FLOAT_NUM_STRING {WHITESPACES} [+-]? ({DNUM} | {EXPONENT_DNUM}) {WHITESPACES}
NUM_STRING ({INT_NUM_STRING} | {FLOAT_NUM_STRING})
```

## `Arrays`

An array in PHP is actually an ordered map. A map is a type that associates values to keys. This type is optimized for several different uses; it can be treated as an array, list (vector), hash table (an implementation of a map), dictionary, collection, stack, queue, and probably more. As array values can be other arrays, trees and multidimensional arrays are also possible.

## `Objects`

To create a new object, use the new statement to instantiate a class:

```json
<?php
class foo
{
    function do_foo()
    {
        echo "Doing foo.";
    }
}

$bar = new foo;
$bar->do_foo();
?>
```

## `Enumerations (PHP 8 >= 8.1.0)`

Enumerations are a restricting layer on top of classes and class constants, intended to provide a way to define a closed set of possible values for a type.

```json
<?php
enum Suit
{
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;
}

function do_stuff(Suit $s)
{
    // ...
}

do_stuff(Suit::Spades);
?>
```

## `Mixed ( > PHP8)`

The mixed type accepts every value. It is equivalent to the union type `object|resource|array|string|float|int|bool|null`.

## `Void`

`void` is a return-only type declaration indicating the function does not return a value, but the function may still terminate. Therefore, it cannot be part of a union type declaration. Available as of PHP 7.1.0.

## `Never`

`never` is a return-only type indicating the function does not terminate. This means that it either calls exit(), throws an exception, or is an infinite loop. Therefore, it cannot be part of a union type declaration. Available as of PHP 8.1.0.

[TOP](#data-types)
