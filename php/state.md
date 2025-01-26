[Volver al Menú](./root.md)

# `State Management`

State management in PHP involves keeping track of user activity in the application, as HTTP protocol doesn’t store earlier interactions. Typically, these data involve user details such as login info, form input data, etc. A prevalent method of state management in PHP is through sessions and cookies. Sessions work by keeping the state data on the server side and a session identifier on the client side. Note, session’s info remains active until the user’s session expires. On the other hand, cookies store data on the client side, having an expiry date or until the user deletes them. Here’s how to set a cookie in PHP: setcookie("test_cookie", "test", time() + 3600, '/');. To access sessions, use the \_SESSION `superglobal` array: `$_SESSION["favcolor"] = "green";`.

# `Cookies`

Cookies are a crucial part of state management in PHP. They enable storage of data on the user’s browser, which can then be sent back to the server with each subsequent request. This permits persistent data between different pages or visits. To set a cookie in PHP, you can use the `setcookie()` function. For example, `setcookie("user", "John Doe", time() + (86400 * 30), "/");` will set a cookie named “user” with the value “John Doe”, that will expire after 30 days. The cookie will be available across the entire website due to the path parameter set as /. To retrieve the value of the cookie, you can use the global `$_COOKIE` array: `echo $_COOKIE["user"];`.

# `Sessions`

Sessions provide a way to preserve certain data across subsequent accesses. Unlike a cookie, the information is not stored on the user’s computer but on the server. This is particularly useful when you want to store information related to a specific user’s session on your platform, like user login status or user preferences. When a session is started in PHP, a unique session ID is generated for the user. This ID is then passed and tracked through a cookie in the user’s browser. To start a session, you would use the PHP function `session_start()`. To save a value in a session, you’d use the `$_SESSION` `superglobal` array. For example, `$_SESSION['username'] = 'John';` assigns ‘John’ to the session variable ‘username’.

# `Basics of Security`

---

# `Input Validation`

Input validation is a vital aspect of PHP security. It involves checking whether the user-provided data is in the expected format or not before it’s processed further. This helps prevent potential security risks such as SQL injections, cross-site scripting (XSS) etc. Let’s take an example of a simple form input validation:

```json
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo("Email is valid");
} else {
  echo("Email is not valid");
}
```

This code uses PHP’s built-in filter_var() function to ensure the data is a valid email address. If not, the form will not be submitted until valid data is entered.

# `SQL Injection`

SQL Injection is a crucial security topic in PHP. It is a code injection technique where an attacker may slip shady SQL code within a query. This attack can lead to data manipulation or loss and even compromise your database. To prevent this, PHP encourages the use of prepared statements with either the MySQLi or PDO extension. An example of a vulnerable code snippet would be: `$unsafe_variable = $_POST['user_input']; mysqli_query($link, "INSERT INTO table (column) VALUES ('$unsafe_variable')");`. Stop falling prey to injections by utilizing prepared statement like so: `$stmt = $pdo->prepare('INSERT INTO table (column) VALUES (?)'); $stmt->execute([$safe_variable]);`.

# `XSS Prevention`

Cross Site Scripting, often known as XSS, is a glaring risk in web security, and PHP also must address it. It occurs when someone is able to insert dangerous code into your site, which can then be executed by users. To prevent XSS in PHP, developers should deploy htmlspecialchars() function to escape potentially harmful characters. This function converts special characters to their HTML entities, reducing risk. For instance, ’<’ becomes ’<’.

Sample PHP code to implement this:

```json
$secure_text = htmlspecialchars($raw_text, ENT_QUOTES, 'UTF-8');
```

In this code, `$raw_text` contains user input that might be risky. By using `htmlspecialchars()`, `$secure_text` will now hold a sanitized version of the user input.

# `CSRF Protection`

Cross-Site Request Forgery (CSRF) Protection in PHP is a method where a website can defend itself against unwanted actions performed on behalf of the users without their consent. It’s a critical aspect of security as it safeguards users against potential harmful activities. Here’s an example: if users are logged into a website and get tricked into clicking a deceitful link, CSRF attacks could be triggered. To protect your PHP applications from such attacks, you can generate a unique token for every session and include it as a hidden field for all form submissions. Afterwards, you need to verify this token on the server side before performing any action.

```json
<?php
// Generate CSRF token
if(empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

// Verify CSRF token
if(isset($_POST['csrf']) && $_POST['csrf'] === $_SESSION['csrf']) {
    // valid CSRF token, perform action
}
?>
```

# `Password Hashing`

Password Hashing in PHP is a crucial aspect of security, which involves converting a plaintext password into a unique hash that cannot be easily reversed. PHP’s built-in functions - password_hash() and password_verify() - are usually employed for this purpose. password_hash() creates a new password hash using a strong one-way hashing algorithm, while password_verify() checks if the given hash matches the password provided. This makes it extremely difficult for malicious actors to get the original password, even if they have the hash.

```json
// Hashing the password
$hash = password_hash('mypassword', PASSWORD_DEFAULT);

// Verifying the password
if (password_verify('mypassword', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
```

# `Auth Mechanisms`

When you are developing PHP application, security should always be a top priority and authentication mechanism forms it’s very core. It ensures proper establishing of user identities before they can access your system’s resources. PHP provides several methods to implement authentication like session-based, token-based, HTTP authentication, and more.

# `Sanitization Techniques`

Sanitization Techniques is a vital part of PHP security basics, which ensures that the user-provided data is safe to be used within your script. It can prevent harmful data from being inserted into the database or being used in other ways that could potentially be dangerous to your application. It includes functions which can strip off unwanted characters from the data. For instance, the filter_var() function in PHP can be applied to sanitize text.

```json
$dirty_data = "<p>We love PHP!</p><script>alert('Virus!')</script>";
$clean_data = filter_var($dirty_data, FILTER_SANITIZE_STRING);
echo $clean_data;
```

[TOP](#state-management)
