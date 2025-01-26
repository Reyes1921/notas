[Volver al Menú](../root.md)

# `Fundamentals`

- [Local Server](./local-server.md)
- [Data Types](./types.md)
- [Output and Debugging](./output.md)

# `Basic PHP Syntax`

`PHP` syntax is generally considered similar to C-style syntax, where code blocks are defined with curly braces, variables start with a dollar sign `($)`, and statements end with a semicolon `(;)`, making it relatively easy to learn for programmers familiar with C-like languages; `PHP` scripts are embedded within HTML using opening tags `""` to mark where `PHP` code should be executed within a web page.

# `Variables and Scope`

Variables are a central part of `PHP`, allowing you to store data that can be used later in your scripts. Their values can be of various types including strings, integers, arrays, and objects. `PHP` has both local and global scope when it comes to variables. Local scope refers to variables that are only accessible within the function they are defined, while global scope means a variable is accessible to any part of the script. However, to use a global variable inside a function, you need to declare it as global. Here’s a brief example:

```json
$x = 10; //global variable
function test() {
    global $x; // accessing the global variable
    echo $x;
}
test(); //prints 10
```

# `Casting Data Types`

`PHP`, as a loose typing language, allows us to change the type of a variable or to transform an instance of one data type into another. This operation is known as Casting. When to use casting, however, depends on the situation - it is recommendable when you want explicit control over the data type for an operation. The syntax involves putting the intended type in parentheses before the variable. For example, if you wanted to convert a string to an integer, you’d use: `$myVar = "123"; $intVar = (int) $myVar;`. Here, $intVar would be an integer representation of `$myVar`. Remember, the original variable type remains unchanged.

```json
<?php
$foo = 10;   // $foo is an integer
$bar = (bool) $foo;   // $bar is a boolean
?>
```

# `Constants`

Constants in PHP are fixed values that do not change during the execution of the script. They can be handy for values that need to be reused often like a website’s URL, a company’s name, or even a hardcoded database connection string. Unlike variables, once a constant is defined, it cannot be undefined or reassigned. Constants are case-sensitive by default but this can be overridden. They are defined using the `define()` function or the `const` keyword. For instance, you can create a constant to hold the value of Pi and call it in your script like this:

```json
define("PI", 3.14);
echo PI; // Outputs: 3.14
```

[TOP](#fundamentals)
