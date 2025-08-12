[Volver al Menú](../root.md)

# `Data Manipulation Language (DML)`

DML is a subcategory of SQL which stands for Data Manipulation Language. The purpose of DML is to insert, retrieve, update and delete data from the database. With this, we can perform operations on existing records.

- `INSERT INTO`
- `SELECT`
- `UPDATE`
- `DELETE FROM`

---

# `SELECT`

The `SELECT` statement in SQL is majorly used for fetching data from the database. It is one of the most essential elements of SQL.

## `SELECT DISTINCT`

The `SELECT DISTINCT` statement is used to return only distinct (different) values. The DISTINCT keyword eliminates duplicate records from the results.

```
SELECT DISTINCT column1, column2, ...
FROM table_name;
```

## `SELECT WHERE`

SELECT statement combined with WHERE gives us the ability to filter records based on a condition.

## `SELECT ORDER BY`

Using `SELECT` statement in conjunction with ORDER BY, we can sort the result-set in ascending or descending order.

---

# `FROM`

The FROM clause in SQL specifies the tables from which the retrieval should be made. It is an integral part of SELECT statements and variants of SELECT like SELECT INTO and SELECT WHERE. FROM can be used to join tables as well.

Typically, FROM is followed by space delimited list of tables in which the SELECT operation is to be executed. If you need to pull data from multiple tables, you would separate each table with a comma.

```
SELECT employees.name, departments.department
FROM employees, departments
WHERE employees.dept_id = departments.dept_id;
```

```
SELECT e.name, d.department
FROM employees AS e, departments AS d
WHERE e.dept_id = d.dept_id;
```

---

# `WHERE`

SQL provides a `WHERE` clause that is basically used to filter the records. If the condition specified in the `WHERE` clause satisfies, then only it returns the specific value from the table. You should use the `WHERE` clause to filter the records and fetching only the necessary records.

The `WHERE` clause is not only used in `SELECT` statement, but it is also used in UPDATE, DELETE statement, etc., which we will learn in subsequent chapters.

---

# `ORDER BY`

The `ORDER BY` clause in SQL is used to sort the result-set from a `SELECT` statement in ascending or descending order. It sorts the records in ascending order by default. If you want to sort the records in descending order, you have to use the `DESC` keyword.

```
SELECT * FROM Customers
ORDER BY NAME ASC;
```

```
SELECT * FROM Customers
ORDER BY AGE ASC, SALARY DESC;
```

---

# `GROUP BY`

“Group By” is a clause in SQL that is used to arrange identical data into groups. This clause comes under the category of Group Functions, alongside the likes of Count, Sum, Average, etc.

```
SELECT Item, SUM(Amount)
FROM Sales
GROUP BY Item;
```

```
Item    SUM(Amount)
------  ----------
A        550
B        400
```

## `Group By with Having Clause`

The Group By clause can also be used with the Having keyword. The Having keyword allows you to filter the results of the group function.

For example:

```
SELECT Item, SUM(Amount)
FROM Sales
GROUP BY Item
HAVING SUM(Amount) > 150;
```

---

# `HAVING`

`HAVING` is a clause in SQL that allows you to filter result sets in a GROUP BY clause. It is used to mention conditions on the groups being selected. In other words, `HAVING` is mainly used with the GROUP BY clause to filter the results that a GROUP BY returns.

It’s similar to a WHERE clause, but operates on the results of a grouping. The WHERE clause places conditions on the selected columns, whereas the `HAVING` clause places conditions on groups created by the GROUP BY clause.

```
SELECT column_name, function(column_name)
FROM table_name
WHERE condition
GROUP BY column_name
HAVING function(column_name) condition value;
```

```
SELECT Product, SUM(Quantity) as TotalQuantity
FROM Sales
GROUP BY Product
HAVING TotalQuantity > 100;
```

In this query,

- GROUP BY Product would group the sales figures by Product.
- SUM(Quantity) would calculate total quantity sold for each product.
- HAVING TotalQuantity > 100 would filter out the groups which have total quantity sold less than or equal to 100.

---

# `JOINs`

SQL Joins are used to retrieve data from two or more data tables, based on a related column between them. The key types of JOINs include:

- `INNER JOIN`: This type of join returns records with matching values in both tables.

- `LEFT (OUTER) JOIN`: Returns all records from the left table, and matched records from the right table.

- `RIGHT (OUTER) JOIN`: Returns all records from the right table, and matched records from the left table.

- `FULL (OUTER) JOIN`: Returns all records when either a match is found in either left (table1) or right (table2) table records.

- `SELF JOIN`: A self join is a join in which a table is joined with itself.

- `CARTESIAN JOIN`: If WHERE clause is omitted, the join operation produces a Cartesian product of the tables involved in the join. The size of a Cartesian product result set is the number of rows in the first table multiplied by the number of rows in the second table.

Each type of JOIN allows for the retrieval of data in different situations, making them flexible and versatile for different SQL queries.

---

# `INSERT`

The “INSERT” statement is used to add new rows of data to a table in a database. There are two main forms of the INSERT command: INSERT INTO which, if columns are not named, expects a full set of columns, and INSERT INTO table_name (column1, column2, ...) where only named columns will be filled with data.

```
INSERT INTO table1 (column1, column2, ... , columnN)
SELECT column1, column2, ... , columnN
FROM table2
WHERE condition;
```

---

# `UPDATE`

The `UPDATE` command in SQL is used to modify the existing records in a table. This command is useful when you need to update existing data within a database.

```
UPDATE Students
SET Age = 23
WHERE StudentID = 2;
```

---

# `DELETE`

The DELETE statement is used to delete existing records in a table. This is a straightforward process, but care must be taken because the DELETE statement is destructive and cannot be undone by default.

```
DELETE FROM students WHERE student_id = '1001';
```

[TOP](#data-manipulation-language-dml)
