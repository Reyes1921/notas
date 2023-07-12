[Volver al Menú](../root.md)

# `Basic SQL Syntax`

## `SELECT`

The SELECT statement is used in SQL to pick out specific data from a database. In other words, it is used to select from the database what you would like to display. The syntax for the SELECT statement is fairly straightforward:

```
SELECT * FROM Customers;
```

## `FROM` 

Used in conjunction with `SELECT` to specify the table from which to fetch data.

## `WHERE`

 Used to filter records. Incorporating a `WHERE` clause, you might specify conditions that must be met. For example,

 ```
 SELECT * FROM Customers WHERE Country='Germany';
 ```

 ## `INSERT`

 The `INSERT` statement in SQL is used to add new rows of data to a table in the database. There are three forms of the INSERT statement: `INSERT INTO` values, `INSERT INTO` set, and `INSERT INTO` select.

 ## `INSERT INTO values` 
 
 This command is used to insert new data into a database.

 ```
 INSERT INTO Customers (CustomerID, CustomerName, ContactName, Address, City, PostalCode, Country)
VALUES ('Cardinal','Tom B. Erichsen','Skagen 21','Stavanger','4006','Norway');
 ```

 This form of the `INSERT` statement specifies both the column names and the values to be inserted.

## `INSERT INTO set`

In this form, you’re able to insert data using the `SET` keyword. Here, you specify each column you want to insert data into, and then the data for that column.

```
INSERT INTO table_name 
SET column1 = value1, column2 = value2, ...;
```

## `INSERT INTO select`

The `INSERT INTO SELECT` statement is used to copy data from one table and insert it into another table. Or, to insert data into specific columns from another table.

```
INSERT INTO table_name1 (column1, column2, column3, ...)
SELECT column1, column2, column3, ...
FROM table_name2
WHERE condition;
```

In all cases, if you’re inserting data into a table where some columns have default values, you don’t need to specify those columns in your INSERT INTO statement.

Note: Be careful when inserting data into a database as SQL does not have a confirm command. So once you execute the insert statement, the records are inserted, and you can’t undo the operation.

## `UPDATE` 

The SQL `UPDATE` statement is used to modify the existing data in a database. This statement is very useful when you need to change the values assigned to specific fields in an existing row or set of rows.

```
UPDATE Customers SET ContactName='Alfred Schmidt', City='Frankfurt' WHERE CustomerID=1;
```

## `DELETE`

The `DELETE` statement in SQL helps you remove existing records from a database. However, keep in mind, it is a destructive operation and may permanently erase data from your database.

```
DELETE FROM Customers WHERE CustomerName='Alfreds Futterkiste';
```

It’s crucial to use DELETE cautiously because it has the potential to either erase certain important rows or entirely empty the table.

## `CREATE DATABASE`

 As implied by its name, this keyword creates a new database.

 ```
 CREATE DATABASE mydatabase;
 ```

`These keywords are used to modify databases and tables.`

## `ALTER DATABASE`

## `DROP DATABASE`

## `CREATE TABLE` 

The `CREATE TABLE` statement in SQL is a Data Definition Language (DDL) command used to create a new table in the database.

## `ALTER TABLE` 

The `ALTER TABLE` command in SQL is used to add, delete/drop, or modify columns in an existing table. It’s also useful for adding and dropping constraints such as primary key, foreign key, etc.

## `DROP TABLE` 


Remember that SQL is not case sensitive, meaning keywords can be written in lower case. The convention is to write them in ALL CAPS for readability. There are many more keywords in SQL, but these are some of the most common.

# `Data Types`

SQL data types define the type of data that can be stored in a database table’s column. Depending on the DBMS, the names of the data types can differ slightly.

## `INT`

`INT` is used for whole numbers. For example:

```
CREATE TABLE Employees (
    ID INT,
    Name VARCHAR(30)
);
```

## `DECIMAL`

`DECIMAL` is used for decimal and fractional numbers. For example:

```
CREATE TABLE Items (
    ID INT,
    Price DECIMAL(5,2)
);
```

## `CHAR`

`CHAR` is used for fixed-length strings. For example:

```
CREATE TABLE Employees (
    ID INT,
    Initial CHAR(1)
);
```

## `VARCHAR`

`VARCHAR` is used for variable-length strings. For example:

```
CREATE TABLE Employees (
    ID INT,
    Name VARCHAR(30)
);
```

## `DATE`

`DATE` is used for dates in the format (`YYYY-MM-DD`).

```
CREATE TABLE Employees (
    ID INT,
    BirthDate DATE
);
```

## `DATETIME`

`DATETIME` is used for date and time values in the format (YYYY-MM-DD HH:MI:SS).

```
CREATE TABLE Orders (
    ID INT,
    OrderDate DATETIME
);
```

## `BINARY`

`BINARY` is used for binary strings.

## `BOOLEAN`

`BOOLEAN` is used for boolean values (`TRUE` or `FALSE`).

Remember, the specific syntax for creating tables and defining column data types can vary slightly depending upon the SQL database you are using (MySQL, PostgreSQL, SQL Server, SQLite, Oracle, etc.), but the general concept and organization of data types is cross-platform.

# `Operators`

SQL operators are used to perform operations like comparisons and arithmetic calculations. They are very crucial in forming queries. SQL operators are divided into the following types:

## `Arithmetic Operators`

These are used to perform mathematical operations. Here is a list of these operators:

- `+` : Addition
- `-` : Subtraction
- `*` : Multiplication
- `/` : Division
- `%` : Modulus

Example:
```
SELECT product, price, (price * 0.18) as tax
FROM products;
```
## `Comparison Operators`

 These are used in the where clause to compare one expression with another. Some of these operators are:

- `=` : Equal
- `!=` or <> : Not equal
- `>` : Greater than
- `<` : Less than
- `>=`: Greater than or equal
- `<=`: Less than or equal

Example:

```
SELECT name, age
FROM students
WHERE age > 18;
```

## `Logical Operators`

 They are used to combine the result set of two different component conditions. These include

- `AND`: Returns true if both components are true.
- `OR`: Returns true if any one of the component is true.
- `NOT`: Returns the opposite boolean value of the condition.

Example:

```
SELECT * 
FROM employees
WHERE salary > 50000 AND age < 30;
```

## `Bitwise Operators` 

These perform bit-level operations on the inputs. Here is a list of these operators:

- `&` : Bitwise `AND`
- `|` : Bitwise `OR`
- `^` : Bitwise `XOR`

Bitwise operators are much less commonly used in SQL than the other types of operators.

[TOP](#basic-sql-syntax)