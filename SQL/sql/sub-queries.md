[Volver al Menú](../root.md)

# `Sub Queries`

In SQL, a subquery is a query embedded within another SQL query. You can alternately call it a nested or an inner query. The containing query is often referred to as the outer query. Subqueries are utilized to retrieve data that will be used in the main query as a condition to further restrict the data to be retrieved.

Subqueries can be used in various parts of a query, including:

- `SELECT` statement
- `FROM` clause
- `WHERE` clause
- `GROUP BY` clause
- `HAVING` clause

```
SELECT column_name [, column_name]
FROM   table1 [, table2 ]
WHERE  column_name OPERATOR
   (SELECT column_name [, column_name]
   FROM table1 [, table2 ]
   [WHERE])
```

## `Scalar`

In SQL, a scalar type is a type that holds a single value as opposed to composite types that hold multiple values. In simpler terms, scalar types represent a single unit of data.

## `Column`

In SQL, columns are used to categorize the data in a table. A column serves as a structure that stores a specific type of data (ints, str, bool, etc.) in a table. Each column in a table is designed with a type, which configures the data that it can hold. Using the right column types and size can help to maintain data integrity and optimize performance.

## `Row`

In SQL, a “row” refers to a record in a table. Each row in a table represents a set of related data, and every row in the table has the same structure.

For instance, in a table named “customers”, a row may represent one customer, with columns containing information like ID, name, address, email, etc.

## `Table`

In SQL, a table is a collection of related data held in a structured format within a database. It consists of rows (records) and columns (fields).

A table is defined by its name and the nature of data it will hold, i.e., each field has a name and a specific data type.

# `Types of Sub Queries`

Subqueries, sometimes referred to as inner queries or nested queries, are queries that are embedded within the clause of another SQL query. There are different types of SQL subqueries that are frequently used including Scalar, Row, Column, and Table subqueries.

## `Scalar Subqueries`

A scalar subquery is a query that returns exactly one column with a single value. This type of subquery can be used anywhere in your SQL where expressions are allowed.

```
    SELECT column_name [, column_name ]
    FROM   table1 [, table2 ]
    WHERE  column_name operator
           (SELECT column_name [, column_name ]
            FROM table_name 
            WHERE condition);
```

## `Row Subqueries`

Row subqueries are used to return one or more rows to the outer SQL select query. However, the subquery returns multiple columns and rows, so it cannot be directly used where scalar expressions are used.

```
  SELECT column_name [, column_name ]
    FROM   table1 [, table2 ]
    WHERE  (column_name [, column_name ])
          IN (SELECT column_name [, column_name ]
              FROM table_name 
              WHERE condition);
```

## `Column Subqueries`

Column Subqueries are used to return one or more columns to the outer SQL select query. They are used when the subquery is expected to return more than one column to the main query.

```
  SELECT column_name [, column_name ]
    FROM   table1 [, table2 ]
    WHERE  (SELECT column_name [, column_name ]
            FROM table_name 
            WHERE condition);
```

## `Table Subqueries`

Table subqueries are used in the FROM clause and return a table that can be used as a table-reference in an SQL statement. They come in handy when you want to perform operations such as joining multiple tables, union data from multiple sources, etc.

```
 SELECT column_name [, column_name ]
    FROM
        (SELECT column_name [, column_name ]
         FROM   table1 [, table2 ])
    WHERE  condition;
```

# `Nested Subqueries`

In SQL, a subquery is a query that is nested inside a main query. If a subquery is nested inside another subquery, it is called a nested subquery. They can be used in SELECT, INSERT, UPDATE, or DELETE statements or inside another subquery.

Nested subqueries can get complicated quickly, but they are essential for performing complex database tasks.

```
SELECT column_name [, column_name ]
FROM   table1 [, table2 ]
WHERE  column_name OPERATOR
   (SELECT column_name [, column_name ]
   FROM table1 [, table2 ]
   [WHERE])
```

`How They Work:`

In a nested subquery, the inner subquery will run first and its result will be used to run the outer query.

```
SELECT CustomerName,Country
FROM Customers
WHERE CustomerID IN
    (SELECT CustomerID 
     FROM Orders
     WHERE Amount>(SELECT AVG(Amount) 
                    FROM Orders))
```

In the above code:

- The innermost query calculates the average order amount.
- The middle subquery finds the CustomerIDs from the Orders table where the order Amount is greater than the average.
- The outer query then gets the CustomerName from the Customers table where the CustomerID is in the list of CustomerIDs fetched from the middle subquery.

# `Correlated Subqueries`

In SQL, a correlated subquery is a subquery that uses values from the outer query in its WHERE clause. The correlated subquery is evaluated once for each row processed by the outer query. It exists because it depends on the outer query and it cannot execute independently of the outer query because the subquery is correlated with the outer query as it uses its column in its WHERE clause.

```
SELECT column_name [, column_name...]
FROM   table1 [, table2...]
WHERE  column_name OPERATOR
  (SELECT column_name [, column_name...]
   FROM table_name
   WHERE condition [table1.column_name = table2.column_name...]);
```

[TOP](#sub-queries)