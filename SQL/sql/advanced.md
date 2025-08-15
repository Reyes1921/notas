[Volver al Menú](../root.md)

# `Advanced SQL Functions`

Advanced SQL functions provide complex data manipulation and query capabilities enabling the user to perform tasks that go beyond the capabilities of basic SQL commands.

# `Numeric`

SQL numeric functions are used to perform operations on numeric data types such as integer, decimal, and float. They’re fundamental in manipulating data in SQL commands and are commonly used in SELECT, UPDATE, DELETE and INSERT statements.

- `ABS() Function: `
- `Avg() Function:`
- `COUNT() Function:`
- `SUM() Function:`
- `MIN() & MAX() Functions:`
- `ROUND() Function: `
- `CEILING() Function: `
- `FLOOR() Function:`
- `SQRT() Function:`
- `PI() Function:`

## `FLOOR`

The SQL `FLOOR` function is used to round down any specific decimal or numeric value to its nearest whole integer. The returned number will be less than or equal to the number given as an argument.

One important aspect to note is that the `FLOOR` function’s argument must be a number and it always returns an integer.

```
SELECT FLOOR(SalePrice) AS RoundedSalePrice
FROM Orders;
```

## `ABS`

The `ABS` function in SQL is used to return the absolute value of a number, i.e., the numeric value without its sign. The function takes a single argument which must be a number (integer, float, etc.) and returns the absolute, non-negative equivalent.

```
SELECT OrderID, Product, ABS(Quantity) as 'Absolute Quantity'
FROM Orders;
```

## `MOD`

The SQL `MOD()` function is a mathematical function that returns the remainder of the values from the division of two numbers. It calculates the modulo operation. This function is very useful when you want to find the remainder value after one number is divided by another.

```
SELECT MOD(15, 4) as result;
```

## `ROUND`

The `ROUND` function in SQL is used to round a numeric field to the nearest specified decimal or integer.

Most usually, `ROUND` accepts two arguments. The first one is the value that needs to be rounded, and the second is the number of decimal places to which the first argument will be rounded off. When dealing with decimals, SQL will round up when the number after the decimal point is 5 or higher, whereas it will round down if it’s less than 5.

```
SELECT ROUND(125.215, 1);
```

## `CEILING`

CEILING is an advanced SQL function that is used to round up values. The function takes a single argument, which is a numeric or decimal number, and returns the smallest integer that is greater than or equal to the supplied number.

```
SELECT ProductName, Price, CEILING (Price) AS RoundedUpPrice
FROM Products;
```

---

# `Conditional`

In SQL, Conditional expressions can be used in the SELECT statement, WHERE clause, and ORDER BY clause to evaluate multiple conditions. These are SQL’s version of the common if…then…else statement in other programming languages.

## `CASE`

`CASE` is a conditional statement in SQL that performs different actions based on different conditions. It allows you to perform IF-THEN-ELSE logic within SQL queries. It can be used in any statement or clause that allows a valid expression.

```
SELECT column1, column2,
(CASE
    WHEN condition1 THEN result1
    WHEN condition2 THEN result2
    ...
    ELSE result
END)
FROM table_name;
```

## `NULLIF`

`NULLIF` is a built-in conditional function in SQL Server. The `NULLIF` function compares two expressions and returns NULL if they are equal or the first expression if they are not.

```
SELECT
    avg_salary,
    NULLIF(avg_salary, 0) AS avg_salary_no_zero
FROM
    positions;
```

## `COALESCE`

The COALESCE function in SQL is used to manage `NULL` values in data. It scans from left to right through the arguments and returns the first argument that is not `NULL`.

```
SELECT product_name, COALESCE(price, 0) AS Price
FROM products;
```

## `IF`

IIF function returns value_true if the condition is TRUE, or value_false if the condition is FALSE.

```
SELECT IIF (1>0, 'One is greater than zero', 'One is not greater than zero');
```

---

# `String Functions`

In SQL, you can perform various operations on strings, including extracting a string, combining two or more strings, and converting a case of a string.

- `CONCAT `
- `SUBSTRING `
- `LENGTH `
- `UPPER `
- `LOWER `
- `TRIM `

## `CONCAT`

`CONCAT` is a SQL function that allows you to concatenate, or join, two or more strings together. This is extremely useful whenever you need to combine text from multiple columns into a single column.

```
SELECT CONCAT(first_name, ' ', last_name) AS full_name
FROM employees;
```

## `LENGTH`

In SQL, LENGTH is a built-in function that allows you to find the number of characters in a string or the length of a string.

```
SELECT first_name, LENGTH(first_name) as length_of_first_name
FROM employees;
```

## `SUBSTRING`

The `SQL SUBSTRING` function is used to extract a part of a string, where you can specify the start position and the length of the text. This function can be very beneficial when you only need a specific part of a string.

```
SELECT SUBSTRING('Hello World', 1, 5) as ExtractedString;
```

## `REPLACE`

You can use the `REPLACE()` function in SQL to substitute all occurrences of a specified string.

```
SELECT EmpId, EmpName,
REPLACE(EmpName, 'Doe', 'Roe') as ModifiedName
FROM Employees;
```

## `UPPER`

`UPPER()` is a built-in string function in SQL. As the name suggests, it is used to convert all letters in a specified string to uppercase. If the string already consists of all uppercase characters, the function will return the original string.

```
SELECT UPPER(name) as 'Upper Case Name' FROM students;
```

## `LOWER`

`LOWER` is a built-in function in SQL used to return all uppercase character(s) in a string to lowercase. It can be quite useful when performing case-insensitive comparisons or searches in your queries.

```
SELECT LOWER('SQL is BAE!') AS LowerCaseString;
```

---

# `Date and Time`

In SQL, the DateTime data type is used to work with dates and times. SQL Server comes with numerous functions for processing dates and times. Some of these include `GETDATE()`, `DATEDIFF()`, `DATEADD()`, `CONVERT()`, and so forth.

## `DATE`

In SQL, DATE is a data type that stores the date. It does not store time information. The format of the date is, ‘YYYY-MM-DD’. For instance, ‘2022-01-01’. SQL provides several functions to handle and manipulate dates.

```
INSERT INTO Orders (OrderId, ProductName, OrderDate)
VALUES (1, 'Product 1', '2022-01-01');
```

### `SQL Date Functions`

SQL also provides several built-in functions to work with the DATE data type:

`CURRENT_DATE`
Returns the current date.

```
SELECT CURRENT_DATE;
```

`DATEADD`

Add or subtract a specified time interval from a date.

```
SELECT DATEADD(day, 5, OrderDate) AS "Due Date"
FROM Orders;
```

`DATEDIFF`

Get the difference between two dates.

```
SELECT DATEDIFF(day, '2022-01-01', '2022-01-06') AS "Difference";
```

## `TIME`

In SQL, TIME data type is used to store time values in the database. It allows you to store hours, minutes, and seconds. The format of a TIME is ‘HH:MI:SS’.

```
INSERT INTO table_name (column_name) values ('17:34:20');
```

### `Functions`

- `CURTIME()`
- `ADDTIME()`
- `TIMEDIFF()`

## `DATEPART`

`DATEPART` is a useful function in SQL that allows you to extract a specific part of a date or time field. You can use it to get the year, quarter, month, day of the year, day, week, weekday, hour, minute, second, or millisecond from any date or time expression.

```
SELECT DATEPART(year, '2021-07-14') AS 'Year';
```

```
SELECT DATEPART(month, '2021-07-14') AS 'Month';
```

```
SELECT DATEPART(day, '2021-07-14') AS 'Day';
```

```
SELECT DATEPART(hour, '2021-07-14T13:30:15') AS 'Hour',
       DATEPART(minute, '2021-07-14T13:30:15') AS 'Minute',
       DATEPART(second, '2021-07-14T13:30:15') AS 'Second';
```

## `TIMESTAMP`

SQL `TIMESTAMP` is a data type that allows you to store both date and time. It is typically used to track updates and changes made to a record, providing a chronological time of happenings.

Depending on the SQL platform, the format and storage size can slightly vary. For instance, MySQL uses the ‘YYYY-MM-DD HH:MI:SS’ format and in PostgreSQL, it’s stored as a ‘YYYY-MM-DD HH:MI:SS’ format but it additionally can store microseconds.

```
CREATE TABLE table_name (
   column1 TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   column2 VARCHAR(100),
   ...
);
```

[TOP](#advanced-sql-functions)
