[Volver al Menú](./root.md)

# `File Handling`

# `Include and Require files`

---

## `require`

The ‘require’ statement is a built-in feature of PHP used to include and evaluate a specific file while executing the code. This is a crucial part of file handling in PHP because it enables the sharing of functions, classes, or elements across multiple scripts, promoting code reusability and neatness. Keep in mind, if the required file is missing, PHP will produce a fatal error and stop the code execution. The basic syntax is `require 'filename';`.

## `require_once`

PHP uses the `‘require_once’` statement as an efficient way to include a PHP file into another one. There’s an interesting quirk to this function: PHP checks if the file was previously included, and if so, it doesn’t include the file again. This helps avoid problems with redundant function declarations, variable value reassignments, or coding loops. However, do remember that `‘require_once’` is distinct from `‘include_once’`. The key difference lies in error handling: if the file specified in `‘require_once’` cannot be found, PHP will emit a fatal error and halt script execution. Whereas, `‘include_once’`, will only generate a warning.

```json
<?php
require_once('somefile.php');
?>
```

This code fetches all the functions and codes from ‘somefile.php’ and includes them in the current file.

## `include`

The `‘include’` statement in PHP is a useful method for inserting code written in one file into another. It’s mainly used when the same code needs to be used in multiple files, avoiding redundancy and making code maintenance easier. If it cannot find the file, PHP will emit a warning but continue to execute the rest of the script. Here’s a simple example:

```json
<?php
    include 'filename.php';
?>
```

In this code snippet, `‘filename.php’` is the file containing the code that you want to insert. Just replace `‘filename.php’` with the actual file path you want to include.

## `include_once`

The `include_once` statement is a part of PHP’s file-handling toolkit, allowing developers to include a PHP file within another PHP file, but only for a one-time execution. This way, you can ensure that functions or objects defined in the included file are not duplicated leading to errors. It helps keep your code DRY (Don’t Repeat Yourself) and clean. Here is a small example:

```json
include_once 'database.php';

$db = new Database();
```

In this simple code snippet, we include the database.php file once, giving us access to the Database class.

# `File Operations`

---

## `Reading Files`

Reading files is a common task in PHP and it provides a range of functions for this purpose. You can use the `fopen()` function with the ‘r’ mode to open a file for reading. The `fgets()` function lets you read a file line by line, while `fread()` reads a specified number of bytes. For reading the entire file in one go, use `file_get_contents()`. Remember to always close the file after you’re done with `fclose()`.

Here’s a small example using `fgets()`:

```json
$file = fopen("example.txt", "r");
if ($file) {
    while (($line = fgets($file)) !== false) {
        echo $line;
    }
    fclose($file);
} else {
    echo 'Error opening file';
}
```

## `Writing Files`

Writing files plays a crucial part in PHP, allowing you to store data and modify it later. This process involves opening the file, writing the desired data, and then closing it. Writing can be done using different functions, but `fwrite()` is the most commonly used one. It requires two arguments the file pointer and the string of data to be written. Here’s a brief snippet of code for instance:

```json
$file = 'data.txt';
$current = file_get_contents($file);
$current .= "New Data\n";
file_put_contents($file, $current);
```

In this code, `file_get_contents()` is used to get the current data, then new data is appended, and `file_put_contents()` is used to write back to the file.

## `File Permissions`

File permissions in PHP control who can read, write, and execute a file. They’re crucial for the security and proper functioning of your PHP applications. When working with files, you can use functions like `chmod()`, `is_readable()`, and `is_writable()` to manage permissions. Typically, you would use `chmod()` to change the permissions of a file. The first parameter is the name of the file and the second parameter is the mode. For instance, `chmod($file, 0755)` would assign owner permissions to read, write, and execute, while everyone else would only have read and execute permissions. To know if a file is readable or writable, use `is_readable()` or `is_writable()` respectively.

## `CSV Processing`

CSV processing refers to handling CSV (Comma Separated Values) files in PHP, an operation significantly useful for managing tabular data. PHP provides a few key functions to handle CSV files effectively. For example, `fgetcsv()` allows you to read CSV file line by line, `fputcsv()` lets you write line by line into a CSV file, and `str_getcsv()` allows you to parse a CSV string into an array. A quick example of reading a CSV file:

```json
if (($handle = fopen("sample.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        print_r($data);
    }
    fclose($handle);
}
```

In this snippet, PHP reads through each line of the `sample.csv` file, converting each into an array with `fgetcsv()`.

## `JSON Processing`

JSON Processing in PHP refers to the handling, reading, and manipulation of JSON formatted data. JSON, or JavaScript Object Notation, is a versatile data format used worldwide due to its easy readability and robustness. PHP natively supports JSON and includes built-in functions like `json_encode()` and `json_decode()`. The `json_encode()` function returns a JSON representation of a value, particularly useful when you need to pass arrays or objects to a script. On the other hand, `json_decode()` is used to extract data from a JSON file or a JSON-encoded string, converting it into a PHP variable. Here’s a quick example:

```json
// Create an array
$data = array('a' => 1, 'b' => 2, 'c' => 3);

// Encode the array into a JSON string
$json = json_encode($data);
echo $json;

// Output: {"a":1,"b":2,"c":3}

// Decode the JSON string back into an array
$decoded = json_decode($json, true);
print_r($decoded);

// Output: Array ( [a] => 1 [b] => 2 [c] => 3 )
```

## `XML Processing`

XML processing in PHP allows manipulation and interpretation of XML documents. PHP’s XML Parser extension helps to parse XML data from strings and files, providing event-driven processing capabilities. This is especially useful during large XML parsing. To process XML in PHP, you first create an XML parser, set functionality through handler functions for the start and end of elements, character data, etc., and then parse the XML data. The xml_parser_create(), xml_set_element_handler(), xml_parse(), and xml_parser_free() functions come into play here. Here’s a brief snippet showing XML parsing in PHP:

```json
$parser = xml_parser_create();
xml_set_element_handler($parser, "startElement", "endElement");
xml_parse($parser, $xml_data);
xml_parser_free($parser);
```

[TOP](#file-handling)
