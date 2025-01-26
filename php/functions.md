[Volver al Menú](./root.md)

# `Functions`

Functions in PHP are self-contained blocks of code that carry out specific tasks and can be reused throughout your application. A function is defined with the word “function” followed by a name, and it should return a value using the “return” statement. To use a function, you simply need to call it by its name. You can also pass parameters to functions to influence how they work. Here’s a simple function:

```json
function greet($name) {
    return "Hello, " . $name;
}

echo greet("John"); // Outputs: Hello, John
```

In the code above, “greet” is a function that takes one parameter “name”. It concatenates “Hello, ” with the name and returns the result.

# `Parameters / Return Values`

Parameters in PHP functions specify the input that the function expects to receive when it is called. They can be of various types like strings, integers, arrays, or even objects. PHP also supports default values for parameters and passing by reference. In PHP, the ‘return’ statement is often used to end the execution of a function and send back a value. Return values can be any data type. Here’s a simple example:

```json
function addNumbers($num1, $num2) {
  $sum = $num1 + $num2;
  return $sum;
}

echo addNumbers(3, 4);  // Outputs: 7
```

# `Default / Optional Params`

```json
function greet($name = "guest") {
  echo "Hello, $name!";
}

greet(); // Outputs: Hello, guest!
greet("John"); // Outputs: Hello, John!
```

# `Named Arguments`

Named arguments in PHP, introduced with PHP 8.0, allow you to specify the values of required parameters by their names, instead of their position in the function call, thus making your code more readable, reducing mistakes, and allowing for unimportant arguments to be skipped. Here’s an array_fill() function using named arguments:

```json
<?php
$a = array_fill(start_index: 0, num: 100, value: 50);
```

In this code snippet, the parameters are passed by their names (‘start_index’, ‘num’, ‘value’), not by their order in the function definition.

# `Anonymous Functions`

Anonymous functions in PHP, also known as closures, are functions that do not have a specified name. They are most frequently used as a value for callback parameters, but can be used in many other ways. When creating an anonymous function, you can also inherit variables from the parent scope. Here’s a basic usage example:

```json
$greet = function($name)
{
    printf("Hello %s\r\n", $name);
};

$greet('World');
$greet('PHP');
```

In this example, we’re creating an anonymous function and assigning it to the variable $greet. We then call this anonymous function using $greet with ‘World’ and ‘PHP’ as arguments.

# `Callback Functions`

A callback function in PHP is a function that is passed as an argument to another function. The receiving function can then invoke this function as needed. Callback functions are often used to define flexible or reusable code because they allow you to customize the behavior of a function without changing its structure.

# `Arrow Functions`

Arrow functions provide a more concise syntax to create anonymous functions. The feature enthusiastically borrowed from modern Javascript significantly improves PHP’s functional programming credibility. The primary difference between regular PHP closures and PHP Arrow functions is the automatic capturing of variables from the parent scope.

```json
<?php

$y = 1;

$fn1 = fn($x) => $x + $y;
// equivalent to using $y by value:
$fn2 = function ($x) use ($y) {
    return $x + $y;
};

var_export($fn1(3));
?>
```

# `Recursion`

Recursion, as it applies to PHP, refers to a function that calls itself to solve a problem. A recursive function distinguishes itself by solving small parts of the problem until it resolves the main issue. Think of it as breaking down a task into smaller tasks that are easier to solve. However, careful design is needed to ensure the recursive function has a clear stopping point, or else it can result in an infinite loop. Here’s a quick example of a simple recursive function in PHP:

```json
function countDown($count) {
    echo $count;
    if($count > 0) {
        countDown($count - 1);
    }
}
countDown(5);
```

In this example, the function countDown calls itself until the count hits zero, displaying numbers from 5 to 0.

# `Variadic Functions`

Variadic functions in PHP are functions that can accept any number of arguments. This gives you greater flexibility, as it allows for an undetermined number of arguments. You can create a variadic function by adding ’…’ before the function argument. Any number of arguments you provide when calling the function are treated as an array, which can be processed using common array functions.

```json
`function sum(...$numbers) {
    return array_sum($numbers);
}
echo sum(1, 2, 3, 4);
```

This prints “10”. The function accepts any number of arguments and adds them together.

[TOP](#functions)
