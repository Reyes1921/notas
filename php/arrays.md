[Volver al Menú](./root.md)

# `Arrays`

Arrays in PHP are fundamental data structures that store multiple elements in a particular key-value pair collection. PHP offers extensive support for arrays, making them convenient for storing sets of data or complex collections.

An array can be created using the `array()` language construct. It takes any number of comma-separated key => value pairs as arguments.

```json
<?php
$array = array(
    "foo" => "bar",
    "bar" => "foo",
);

// Using the short array syntax
$array = [
    "foo" => "bar",
    "bar" => "foo",
];
?>
```

# `Indexed Arrays`

Indexed arrays in PHP store values that are accessed through numerical indexes, which start at 0 by default. This might be particularly useful when you have a list of items in a specific order. For example, you might use an indexed array to represent a list of your favorite books, where each book is numbered starting from 0. Each individual item in the array, book in this case, can be accessed by their specific index. You can use the array() function or the short array syntax [] to declare an indexed array.

```json
$books = array("The Great Gatsby", "Moby Dick", "To Kill a Mockingbird");
echo $books[0]; //Outputs "The Great Gatsby"
```

# `Associative Arrays`

Associative arrays in PHP are a type of array that uses named keys instead of numeric ones. This provides a more human-readable way to store data where each value can be accessed by its corresponding string key. An example of an associative array could be storing names as keys and their corresponding ages as values. Here’s a brief example:

```json
$ages = array(
   "Peter" => 35,
   "John" => 42,
   "Mary" => 27
);
```

In this case, to find out John’s age, you would simply use echo `$ages['John']` where ‘John’ is the key. Associative arrays are also easy to loop through using the foreach construct.

# `Multi-dimensional Arrays`

Multi-dimensional arrays in PHP are a type of array that contains one or more arrays. Essentially, it’s an array of arrays. This allows you to store data in a structured manner, much like a table or a matrix. The fundamental idea is that each array value can, in turn, be another array. For instance, you can store information about various users, where each user (a primary array element) contains several details about them (in a secondary array like email, username etc.).

```json
$users = array(
    array("John", "john@example.com", "john123"),
    array("Jane", "jane@example.com", "jane123"),
    array("Doe", "doe@example.com", "doe123")
);
```

[TOP](#arrays)
