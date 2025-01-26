[Volver al Menú](./root.md)

# `State Management`

State management in PHP involves keeping track of user activity in the application, as HTTP protocol doesn’t store earlier interactions. Typically, these data involve user details such as login info, form input data, etc. A prevalent method of state management in PHP is through sessions and cookies. Sessions work by keeping the state data on the server side and a session identifier on the client side. Note, session’s info remains active until the user’s session expires. On the other hand, cookies store data on the client side, having an expiry date or until the user deletes them. Here’s how to set a cookie in PHP: setcookie("test_cookie", "test", time() + 3600, '/');. To access sessions, use the \_SESSION `superglobal` array: `$_SESSION["favcolor"] = "green";`.

# `Cookies`

Cookies are a crucial part of state management in PHP. They enable storage of data on the user’s browser, which can then be sent back to the server with each subsequent request. This permits persistent data between different pages or visits. To set a cookie in PHP, you can use the `setcookie()` function. For example, `setcookie("user", "John Doe", time() + (86400 * 30), "/");` will set a cookie named “user” with the value “John Doe”, that will expire after 30 days. The cookie will be available across the entire website due to the path parameter set as /. To retrieve the value of the cookie, you can use the global `$_COOKIE` array: `echo $_COOKIE["user"];`.

# `Sessions`

Sessions provide a way to preserve certain data across subsequent accesses. Unlike a cookie, the information is not stored on the user’s computer but on the server. This is particularly useful when you want to store information related to a specific user’s session on your platform, like user login status or user preferences. When a session is started in PHP, a unique session ID is generated for the user. This ID is then passed and tracked through a cookie in the user’s browser. To start a session, you would use the PHP function `session_start()`. To save a value in a session, you’d use the `$_SESSION` `superglobal` array. For example, `$_SESSION['username'] = 'John';` assigns ‘John’ to the session variable ‘username’.

[TOP](#state-management)
