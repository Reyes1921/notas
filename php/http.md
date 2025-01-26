[Volver al Menú](./root.md)

# `HTTP Request Handling`

# `HTTP Methods`

PHP allows for handling HTTP methods, which are a way of defining the action to be performed on the resource identified by a given URL. In PHP, the `$_SERVER` `superglobal` array can be used to identify the HTTP method of a specific request, typically a `GET`, `POST`, `PUT`, `DELETE` or `HEAD`. For example, to identify if a request is a POST request, you can use:

```json
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // your code here }
```

More advanced handling can be done by utilizing built-in PHP libraries or third-party packages.

# `Super Global Variables`

---

## `$_GET`

`$_GET` is a pre-defined array in PHP, that’s used to collect form-data sent through HTTP GET method. It’s useful whenever you need to process or interact with data that has been passed in via a URL’s query string. For an example if you have a form with a GET method, you can get the values of the form elements through this global `$_GET` array. Here’s an example:

```json
<form method="get" action="test.php">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>
```

Using `$_GET` in test.php, you can fetch the ‘fname’ value from the URL:

```json
echo "Name is: " . $_GET['fname'];
```

## `$_POST`

`$_POST` is a superglobal variable in PHP that’s used to collect form data submitted via HTTP POST method. Your PHP script can access this data through `$_POST`. Let’s say you have a simple HTML form on your webpage. When the user submits this form, the entered data can be fetched using `$_POST`. Here’s a brief example:

```json
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
}
?>
```

In this code, `$_POST["name"]` fetches the value entered in the ‘name’ field of the form. Always be cautious when using `$_POST` as it may contain user input which is a common source of vulnerabilities. Always validate and sanitize data from `$_POST` before using it.

## `$_REQUEST`

`$_REQUEST` is a PHP superglobal variable that contains the contents of both `$_GET`, `$_POST`, and `$_COOKIE`. It is used to collect data sent via both the GET and POST methods, as well as cookies. `$_REQUEST` is useful if you do not care about the method used to send data, but its usage is generally discouraged as it could lead to security vulnerabilities. Here’s a simple example:

```json
$name = $_REQUEST['name'];
```

This statement will store the value of the ‘name’ field sent through either a GET or POST method. Always remember to sanitize user input to avoid security problems.

## `$_SERVER`

The `$_SERVER` is a superglobal in PHP, holding information about headers, paths, and script locations. `$_SERVER` is an associative array containing server variables created by the web server. This can include specific environmental configurations, the server signature, your PHP script’s paths and details, client data, and the active request/response sequence. Among its many uses, `$_SERVER['REMOTE_ADDR']`can help get the visitor’s IP while`$_SERVER['HTTP_USER_AGENT']` offers information about their browser. Don’t forget to sanitize the content before use to prevent security exploits.

Here’s an easy code sample that prints the client’s IP:

```json
echo 'Your IP is: ' . $_SERVER['REMOTE_ADDR'];
```

[TOP](#http-request-handling)
