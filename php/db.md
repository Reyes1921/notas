[Volver al Menú](./root.md)

# `Working with Databases`

# `Database Connectively`

---

# `PDO`

PDO (PHP Data Objects) is an interface in PHP that provides a lightweight, consistent way for working with databases in PHP. PDO allows you to use any database without changing your PHP code, making your code database-independent. Furthermore, it offers robust error handling and can utilize prepared statements to prevent SQL injection attacks. Here is how you could connect and fetch data from a MySQL database using PDO:

```json
try {
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'username', 'password');
    $stmt = $pdo->query('SELECT * FROM myTable');
    while ($row = $stmt->fetch()) {
        echo $row['name'] . "\n";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
```

# `MySQLi`

MySQLi is a PHP extension that allows PHP programs to connect with MySQL databases. This extension provides the capability to perform queries, retrieve data, and perform complex operations on MySQL databases using PHP. MySQLi comes with an object-oriented and procedural interface and supports prepared statements, multiple statements, and transactions.

Here’s a basic example of using MySQLi to connect to a MySQL database:

```json
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
```

# `Advanced Database Techniques`

---

SOON

[TOP](#working-with-databases)
