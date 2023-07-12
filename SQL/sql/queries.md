[Volver al Menú](../root.md)

# `Aggregate Queries`

SQL aggregate functions are inbuilt functions that are used to perform some calculation on the data and return a single value. This is why they form the basis for “aggregate queries”. These functions operate on a set of rows and return a single summarized result.

`Common Aggregate Functions`

1. `COUNT()`
2. `SUM()`
3. `AVG()`
4. `MIN()`
5. `MAX()`

# `SUM`

The `SUM()` function in SQL is used to calculate the sum of a column. This function allows you to add up a column of numbers in an SQL table.

```
SELECT SUM(Quantity) AS TotalQuantity FROM Order;
```
Output will be:

```
| TotalQuantity |
|----------------|
|           65     |
```

# `COUNT`

`COUNT` is a SQL function that returns the number of rows that match a specified criteria. Essentially, `COUNT` function is used when you need to know the count of a record in a certain table’s column.

There are two types of count function; COUNT(*) and COUNT(column).

- `COUNT(*)` counts all the rows in the target table whether columns contain null values or not.

```
SELECT COUNT(*) FROM table_name;
```

- `COUNT(column)` counts the rows in the column of a table excluding null.

```
SELECT COUNT(column_name) FROM table_name;
```

# `AVG`

The `AVG()` function in SQL is an aggregate function that returns the average value of a numeric column. It calculates the sum of values in a column and then divides it by the count of those values.

```
SELECT AVG(Quantity) AS AvgQuantity
FROM Orders;
```

# `MIN`

`MIN` is an SQL aggregate function used to return the smallest value in a selected column. It is useful in querying tables where users want to identify the smallest or least available value in datasets. MIN ignores any null values in the dataset.

```
SELECT CustomerID, MIN(OrderDate) AS EarliestOrder
FROM Orders
GROUP BY CustomerID;
```

# `MAX`

The `MAX()` function in SQL is used to return the maximum value of an expression in a SELECT statement.

It can be used for numeric, character, and datetime column data types. If there are null values, then they are not considered for comparison.

```
SELECT MAX(SALARY) AS "Highest Salary"
FROM Employee;
```

# `SELECT`

```
SELECT COUNT(column_name) FROM table_name WHERE condition;
SELECT AVG(column_name) FROM table_name WHERE condition;
SELECT SUM(column_name) FROM table_name WHERE condition;
SELECT MIN(column_name) FROM table_name WHERE condition;
SELECT MAX(column_name) FROM table_name WHERE condition;
```

# `GROUP BY`

`Group By` is an SQL clause that arranges identical data into groups. It is often used with aggregate functions (COUNT, MAX, MIN, SUM, AVG) to group the result-set by one or multiple columns.

# `HAVING`

The `HAVING` clause is used in combination with the `GROUP BY` clause to filter the results of `GROUP BY`. It is used to mention conditions on the group functions, like `SUM`, `COUNT`, `AVG`, `MAX` or `MIN`.

It’s important to note that where `WHERE` clause introduces conditions on individual rows, `HAVING` introduces conditions on groups created by the `GROUP BY` clause.

[TOP](#aggregate-queries)