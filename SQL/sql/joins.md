[Volver al Menú](../root.md)

# `SQL JOIN Queries`

JOIN clause is used to combine rows from two or more tables, based on a related column between them.

# `INNER JOIN`

An `INNER JOIN` in SQL is a type of join that returns the records with matching values in both tables. This operation compares each row of the first table with each row of the second table to find all pairs of rows that satisfy the join predicate.

Few things to consider in case of `INNER JOIN`:

- It is a default join in SQL. If you mention JOIN in your query without specifying the type, SQL considers it as an `INNER JOIN`.
- It returns only the matching rows from both the tables.
- If there is no match, the returned is an empty result.

```
SELECT column_name(s)
FROM table1
INNER JOIN table2
ON table1.column_name = table2.column_name;
```

# `LEFT JOIN`

The SQL LEFT JOIN combines rows from two or more tables based on a related column between them and returns all rows from the left table (table1) and the matched rows from the right table (table2). If there is no match, the result is `NULL` on the right side.

`How SQL LEFT JOIN Works`

The LEFT JOIN keyword returns all records from the left table (table1), and the matched records from the right table (table2). The result is NULL from the right side, if there is no match.

<img src="img_leftjoin.gif" />


`SQL LEFT JOIN Example`

Let’s assume we have two tables: Orders and Customers.

```
SELECT Orders.OrderID, Customers.CustomerName
FROM Orders
LEFT JOIN Customers
ON Orders.CustomerID = Customers.CustomerID;
```

# `RIGHT JOIN`

The `RIGHT JOIN` keyword returns all records from the right table (table2), and the matched records from the left table (table1). If there is no match, the result is `NULL` on the left side.

```
SELECT column_name(s)
FROM table1
RIGHT JOIN table2
ON table1.column_name = table2.column_name;
```

```
SELECT 
  Customers.CustomerName, 
  Orders.OrderID
FROM 
  Orders
RIGHT JOIN 
  Customers 
ON 
  Orders.CustomerID = Customers.CustomerID;
```

# `FULL OUTER JOIN`

A `FULL OUTER JOIN` in SQL is a method to combine rows from two or more tables, based on a related column between them. It returns all rows from the left table (table1) and from the right table (table2).

The `FULL OUTER JOIN` keyword combines the results of both left and right outer joins and returns all (matched or unmatched) rows from the tables on both sides of the join clause.

If there are records in the “Customers” table that do not have matches in the “Orders” table, those will be included. Also, if there are records in the “Orders” table that do not have matches in the “Customers” table, those will be included.

```
SELECT column_name(s)
FROM table1
FULL OUTER JOIN table2
ON table1.column_name = table2.column_name;
```

# `Self Join`

A `SELF JOIN` is a standard SQL operation where a table is joined to itself. This might sound counter-intuitive, but it’s actually quite useful in scenarios where comparison operations need to be made within a table. Essentially, it is used to combine rows with other rows in the same table when there’s a match based on the condition provided.

It’s important to note that, since it’s a join operation on the same table, alias(es) for table(s) must be used to avoid confusion during the join operation.

`Syntax of a Self Join`

Here is the basic syntax for a SELF JOIN statement:

```
SELECT a.column_name, b.column_name
FROM table_name AS a, table_name AS b
WHERE a.common_field = b.common_field;
```

In this query:

- table_name: is the name of the table to join to itself.
- a and b: are different aliases for the same table.
- column_name: specify the columns that should be returned as a result of the SQL SELF JOIN statement.
- WHERE a.common_field = b.common_field: is the condition for the join.

```
SELECT a.Name AS Employee, b.Name AS Manager
FROM EMPLOYEES a, EMPLOYEES b
WHERE a.ManagerID = b.EmployeeID;
```

# `Cross Join`

The cross join in SQL is used to combine every row of the first table with every row of the second table. It’s also known as the Cartesian product of the two tables. The most important aspect of performing a cross join is that it does not require any condition to join.

The issue with cross join is it returns the Cartesian product of the two tables, which can result in large numbers of rows and heavy resource usage. It’s hence critical to use them wisely and only when necessary.

```
SELECT column_name(s)
FROM table1
CROSS JOIN table2;
```

`Example of CROSS JOIN`

Let’s consider two tables, `Employees` and `Departments`, where `Employees` has columns `EmpID`, `EmpName`, `DeptID` and `Departments` has columns `DeptID`, `DeptName`.

A cross join query would look like this:

```
SELECT Employees.EmpName, Departments.DeptName
FROM Employees 
CROSS JOIN Departments;
```

This statement will return a result set which is the combination of each row from `Employees` with each row from `Departments`.

[TOP](#data-constraints)