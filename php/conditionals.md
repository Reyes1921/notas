[Volver al Menú](./root.md)

# `Conditionals`

`Conditionals` in `PHP`, much like in other programming languages, allow for branching in code, meaning your program can choose to execute specific parts of code based on the state of variables or expressions. The most common conditional statements in `PHP` are `“if”`, `“else”`, and `“elseif”`.

# `if/else`

In `PHP`, the `if/else` conditional statements are fundamental components that control the flow of the program based on specific conditions. When the ‘if’ condition is true, a block of code will execute. If that condition is not met (or false), the program proceeds to the ‘else’ statement (if provided), executing its block of code. This allows you to handle different situations dynamically. A simple example of this concept in action would be:

```json
$number = 10;
if ($number > 5) {
    echo "The number is greater than 5";
} else {
    echo "The number is not greater than 5";
}
```

# `switch`

The switch statement is a special conditional statement in PHP that can simplify code and improve readability when you need to compare one value with multiple different possibilities. It is an alternative to using a chain of “if…else” conditions, and is particularly useful when you have many different cases to compare. The switch expression is evaluated only once, and its value is compared to each case. When a match is found, PHP executes the associated code block.

```json
$fruit = "apple";
switch ($fruit) {
  case "apple":
    echo "You chose apple.";
    break;
  case "banana":
    echo "You chose banana.";
    break;
  default:
    echo "Invalid choice.";
}
// Outputs: You chose apple.
```

# `match`

`Match` expressions are an integral feature of PHP, introduced in PHP 8.0 as an alternative to the switch statement. Compared to the switch statement, match expressions are safer since they don’t require break statements and are more concise. The match expression can be an excellent tool for pattern matching. Here’s an example:

```josn
$message = match ($statusCode) {
  200, 300 => 'OK',
  400 => 'error',
  default => 'unknown status code',
};
```

In this code, based on the value of $statusCode, the match expression assigns a specific text to the $message. If $statusCode is not 200, 300, or 400, the default case applies. After running the code, the $message variable contains the result of the match expression.

# `Null Coalescing Operator`

The Null Coalescing Operator (??) in PHP is a simple and useful tool for handling variables that might not be set. It allows developers to provide a default value when the variable happens not to have a value. It is similar to the ternary operator, but instead of checking whether a variable is true or false, it checks if it is set or null. This makes it a handy tool for handling optional function arguments or form inputs. Here’s an example: `$username = $_POST['username'] ?? 'Guest';`. In this line, if ‘username’ was set in the POST array, $username will be set to that value. If not, it will be set to ‘Guest’.

# `Null Safe Operator`

The Null Safe Operator is a handy feature in PHP which deals with an issue that often pops up when working with objects: trying to access properties or methods on an object that might be null. Instead of a fatal error, the PHP Null Safe Operator (indicated by ?->) allows null values to be returned safely, making your code more robust. Here’s a quick example, consider $session?->user?->name. If $session or user is null, PHP will stop further execution and simply return null. This makes PHP more resilient when processing unpredictable data.

[TOP](#conditionals)
