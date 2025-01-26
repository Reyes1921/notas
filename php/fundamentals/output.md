[Volver al Menú](./root.md)

# `Output and Debugging`

## `echo`

`echo` is a language construct in PHP, and it is commonly used to output one or more strings to the browser. This command doesn’t behave like a function, hence it doesn’t require parentheses unless it’s necessary to avoid confusion. It’s also worth mentioning that `echo` also supports multiple parameters. Check out a simple example below where we are using echo to output a simple string:

```json
echo "Hello, world!";
```

## `print`

The `print` statement in PHP is an in-built function used for outputting one or more strings. Unlike ‘echo’, it is not a language construct and has a return value. However, it is slower because it uses expressions. The text or numeric data that ‘print’ outputs can be shown directly or stored in a variable. For instance, to print a string you may use `print("Hello, World!");`, and for using it with a variable, `echo $variable;` is suitable.

## `var_dump`

`var_dump` is a built-in PHP function that’s incredibly handy for debugging as it outputs the data type and value of a given variable. This includes array elements and object properties, if given such types. If you’re wrangling with your PHP code and finding your variables aren’t behaving as you expect, using `var_dump` can quickly show you what you’re working with. Check out a simple usage example below:

```json
$myVar = array( "Hello", "World!");
var_dump($myVar);
```

This will output the size of array and details of each element in the array.

## `print_r`

The `print_r` function in PHP is used to print human-readable information about a variable, ranging from simple values to more complex, multi-dimensional arrays and objects. It’s exceptionally helpful while debugging, providing more information about the variable’s contents than the echo or print functions. For example, in the code `$array = array('apple', 'banana', 'cherry'); print_r($array);`, it will display Array ( [0] => apple [1] => banana [2] => cherry ).

[TOP](#output-and-debugging)
